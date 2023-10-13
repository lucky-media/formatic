<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Forms\Exceptions\FileContentTypeRequiredException;
use Illuminate\Support\MessageBag;
use Statamic\Support\Str;
use Statamic\Facades\Site;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Statamic\Support\Arr;

class FormValidationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $form)
    {
        $fields = $form->blueprint()->fields();
        $this->validateContentType($request, $form);
        $values = array_merge($request->all(), $assets = $this->normalizeAssetsValues($fields, $request));
        $params = collect($request->all())->filter(function ($value, $key) {
            return Str::startsWith($key, '_');
        })->all();

        $fields = $fields->addValues($values);

        $submission = $form->makeSubmission();

        try {
            $fields->validate($this->extraRules($fields));

            $values = array_merge($values, $submission->uploadFiles($assets));

            $submission->data(
                $fields->addValues($values)->process()->values()
            );
        } catch (ValidationException $e) {
            return $this->formFailure($params, $e->errors(), $form->handle());
        }

        return response([
            'success' => true
        ]);
    }

    private function formFailure($params, $errors, $form)
    {
        if (request()->ajax()) {
            return response([
                'errors' => (new MessageBag($errors))->all(),
                'error' => collect($errors)->map(function ($errors, $field) {
                    return $errors[0];
                })->all(),
            ], 400);
        }

        $redirect = Arr::get($params, '_error_redirect');

        $response = $redirect ? redirect($redirect) : back();

        return $response->withInput()->withErrors($errors, 'form.'.$form);
    }

    private function validateContentType($request, $form)
    {
        $type = Str::before($request->headers->get('CONTENT_TYPE'), ';');

        if ($type !== 'multipart/form-data' && $form->hasFiles()) {
            throw new FileContentTypeRequiredException;
        }
    }

    protected function normalizeAssetsValues($fields, $request)
    {
        // The assets fieldtype is expecting an array, even for `max_files: 1`, but we don't want to force that on the front end.
        return $fields->all()
            ->filter(function ($field) {
                return $field->fieldtype()->handle() === 'assets' && request()->hasFile($field->handle());
            })
            ->map(function ($field) use ($request) {
                return Arr::wrap($request->file($field->handle()));
            })
            ->all();
    }

    protected function extraRules($fields)
    {
        return $fields->all()
            ->filter(function ($field) {
                return $field->fieldtype()->handle() === 'assets';
            })
            ->mapWithKeys(function ($field) {
                return [$field->handle().'.*' => 'file'];
            })
            ->all();
    }
}

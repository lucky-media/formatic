export const Formatic = () => ({
    steps: [],
    currentStep: 1,
    redirect_url: null,
    success_message_duration: 4,
    submit_url: null,
    success: false,
    form: "",

    init() {
        this.$nextTick(() => {
            if (
                window.requiredSteps === undefined ||
                window.requiredSteps === null ||
                window.requiredSteps === ""
            )
                return;

            this.steps = JSON.parse(window.requiredSteps);
        });

        this.submit_url = window.location.href;

        this.form = this.$form(
            "post",
            this.$refs.form.getAttribute("action"),
            JSON.parse(this.$refs.form.getAttribute("x-data")).form
        );
    },

    submit: async function () {
        try {
            // Remove false values from form data
            Object.keys(this.form).forEach((key) => {
                if (this.form[key] === false) {
                    delete this.form[key];
                }
            });

            const response = await this.form.submit();

            if (
                response.status === 200 &&
                this.isMultiStep() &&
                !this.isLastStep()
            ) {
                this.form.errors = {};

                return;
            }

            if (response.status === 200) {
                this.form.reset();
                this.form.errors = {};
                this.success = true;

                if (this.redirect_url) {
                    this.success = false;
                    return (window.location.href = this.redirect_url);
                }

                setTimeout(() => {
                    this.success = false;

                    if (this.isMultiStep()) {
                        location.reload();
                    }
                }, this.success_message_duration * 1000);
            }
        } catch (error) {
            if (error.response && error.response.data.errors) {
                this.form.errors = error.response.data.errors;
            }
        }
    },

    prev() {
        this.currentStep--;
    },
    next: async function () {
        const isValid = this.validateFields();

        // Move to the next step only if the form is valid
        if (isValid) {
            if (!(this.form.errors && this.hasRequiredFields())) {
                this.currentStep++;
                this.form.errors = {};
            }

            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    },
    validateFields() {
        this.form.errors = {};

        const requiredFields = Object.values(this.steps[this.currentStep - 1]);

        requiredFields.forEach((field) => {
            // Grab inputs
            const input = document.querySelector(`[name="${field}"]`);

            // Format field's error message
            let formattedErrorMessage = `The ${field
                .replace(/_/g, " ")
                .replace(/\b\w/g, (c) => c.toUpperCase())} field is required.`;

            // Add error to errors object (if input is empty)
            if (input && input.offsetParent && !this.form[field]) {
                this.form.errors[field] = formattedErrorMessage;
            }
        });

        return !Object.keys(this.form.errors).length;
    },
    isMultiStep() {
        return this.steps.length > 0;
    },
    isLastStep() {
        return this.currentStep === this.steps.length;
    },
    resolveFormUrl() {
        if (!this.isMultiStep()) {
            return this.$refs.form.action;
        }

        return this.isLastStep() ? this.$refs.form.action : this.submit_url;
    },
    hasRequiredFields() {
        const fields = Object.values(this.steps[this.currentStep - 1]).filter(
            (field) => (this.form.errors.hasOwnProperty(field) ? true : false)
        );

        return fields.length > 0;
    },
});

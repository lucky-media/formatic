export const Formatic = ({ validate_url }) => ({
    error: false,
    errors: [],
    sending: false,
    success: false,
    steps: [],
    currentStep: 1,
    redirect_url: null,
    submit_url: null,
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

        this.submit_url = validate_url;
    },
    sendForm: async function () {
        this.sending = true;
        const formData = new FormData(this.$refs.form);

        // Post the form.
        return fetch(this.resolveFormUrl(), {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
            method: "POST",
            body: new FormData(this.$refs.form),
        })
            .then((res) => res.json())
            .then((json) => {
                if (
                    json["success"] &&
                    this.isMultiStep() &&
                    !this.isLastStep()
                ) {
                    this.errors = [];
                    this.error = false;
                    this.sending = false;

                    return;
                }

                if (json["success"]) {
                    this.errors = [];
                    this.success = true;
                    this.error = false;
                    this.sending = false;
                    this.$refs.form.reset();

                    setTimeout(() => {
                        this.success = false;

                        if (this.redirect_url) {
                            window.location.href = this.redirect_url;
                        }
                    }, 1000);
                }

                if (json["error"]) {
                    this.sending = false;
                    this.error = true;
                    this.success = false;
                    this.errors = json["error"];
                }
            })
            .catch((err) => {
                console.log("err", err);
                this.sending = false;
            });
    },
    prev() {
        this.currentStep--;
    },
    next: async function () {
        await this.sendForm();

        if (!(this.error && this.hasRequiredFields())) {
            this.currentStep++;
            this.errors = [];
        }

        window.scrollTo({ top: 0, behavior: "smooth" });
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
            (field) => (this.errors.hasOwnProperty(field) ? true : false)
        );

        return fields.length > 0;
    },
});

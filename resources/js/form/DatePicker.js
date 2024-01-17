import flatpickr from "flatpickr";

export const DatePicker = (config) => ({
    picker: null,
    init() {
        if (this.picker) return;

        this.picker = flatpickr(this.$el, {
            mode: "single",
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d",
            enableTime: false,
            altInput: true,
            ...config,
            onReady: (selectedDates, dateStr, instance) => {
                instance.altInput.id = config.id;
            },
        });

        this.$watch("form.errors", () => {
            this.handleChange();
        });
    },

    handleChange() {
        const instance = this.picker;
        const fieldName = instance.altInput.id;
        const errors = this.form.errors[fieldName];

        instance.altInput.classList.remove(
            "border-red-600",
            "focus-visible:border-red-600"
        );

        if (errors && errors.length > 0) {
            instance.altInput.classList.add(
                "border-red-600",
                "focus-visible:border-red-600"
            );
        }

        this.form.validate(fieldName);
    },
});

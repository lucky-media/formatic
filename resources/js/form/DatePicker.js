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
    },
});

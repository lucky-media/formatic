export const Theme = {
    mode: "light",
    init() {
        if (localStorage.theme === undefined || localStorage.theme === "auto") {
            localStorage.setItem("theme", "auto");
            this.mode = "auto";
            this.getUserSystemTheme();

            return;
        }

        // If the theme is set to "dark" or the system prefers dark theme
        if (localStorage.theme === "dark") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
            this.mode = "dark";

            return;
        }

        // If the theme is not set to "dark" or "auto"
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        this.mode = "light";
    },

    toggle(state) {
        this.mode = state;
        localStorage.setItem("theme", state);

        state === "dark"
            ? document.documentElement.classList.add("dark")
            : state === "light"
            ? document.documentElement.classList.remove("dark")
            : this.getUserSystemTheme();
    },

    getUserSystemTheme() {
        window.matchMedia("(prefers-color-scheme: dark)").matches
            ? document.documentElement.classList.add("dark")
            : document.documentElement.classList.remove("dark");
    },
};

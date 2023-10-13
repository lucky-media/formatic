export const FileViewer = () => ({
    files: [],
    units: ["bytes", "KiB", "MiB", "GiB", "TiB", "PiB", "EiB", "ZiB", "YiB"],
    filesUploaded(event) {
        if (!event.target.files.length) return;

        this.files = Array.from(event.target.files).map((file) => {
            return {
                name: file.name,
                size: this.formatBytes(file.size),
            };
        });
    },
    formatBytes(x) {
        let l = 0,
            n = parseInt(x, 10) || 0;

        while (n >= 1024 && ++l) {
            n = n / 1024;
        }

        return (
            parseFloat(n.toFixed(n < 10 && l > 0 ? 1 : 0)) + " " + this.units[l]
        );
    },
});

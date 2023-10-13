import uid from "uniqid";

export const ListInput = () => ({
    items: [],
    init() {
        this.items.push({ id: uid(), value: "" });
    },
    add() {
        this.items.push({ id: uid(), value: "" });
    },
    remove(id) {
        this.items = this.items.filter((item) => item.id !== id);
    },
});

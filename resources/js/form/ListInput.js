import { nanoid } from "nanoid";

export const ListInput = () => ({
    items: [],
    init() {
        this.items.push({ id: nanoid(), value: "" });
    },
    add() {
        this.items.push({ id: nanoid(), value: "" });
    },
    remove(id) {
        this.items = this.items.filter((item) => item.id !== id);
    },
});

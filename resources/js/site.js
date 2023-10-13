// This is all you.
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";

import { ListInput } from "./form/ListInput";
import { DatePicker } from "./form/DatePicker";
import { FileViewer } from "./form/FileViewer";
import { Formatic } from "./form/Formatic";
import { Theme } from "./ui/Theme";

window.Alpine = Alpine;

// Plugins
Alpine.plugin(focus);

// Form Components
Alpine.data("formatic", Formatic);
Alpine.data("list", ListInput);
Alpine.data("datePicker", DatePicker);
Alpine.data("fileViewer", FileViewer);

// UI Components
Alpine.store("theme", Theme);

Alpine.start();

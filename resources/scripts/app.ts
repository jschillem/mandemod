import { createInertiaApp } from "@inertiajs/vue3";
import { createApp, h } from "vue";
import PrimeVue from "primevue/config";
import Aura from "@primeuix/themes/aura";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("../views/pages/**/*.vue", {
            eager: true,
        });
        return (
            pages[`../views/pages/${name}.vue`] ||
            pages[`../views/pages/errors/404.vue`]
        );
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                unstyled: true,
            })
            .mount(el);
    },
});

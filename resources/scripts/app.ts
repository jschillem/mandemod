import { createInertiaApp } from "@inertiajs/vue3";
import { createApp, h, type DefineComponent } from "vue";
import PrimeVue from "primevue/config";
import LayoutMain from "@layouts/LayoutMain.vue";
import { trail } from "momentum-trail";
import routes from "@scripts/routes/routes.json";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("../views/pages/**/*.vue", {
            eager: true,
        }) as Record<string, { default: DefineComponent }>;
        let page = pages[`../views/pages/${name}.vue`];
        if (!page) {
            // unhandled error, throw an error to notify the developer
            if (import.meta.env.DEV) {
                throw new Error(
                    `The page "${name}" could not be found. Please check the file path and try again.`,
                );
            } else {
                // fallback to a default 404 page in production
                page = pages[`../views/pages/Error.vue`];
                if (!page) {
                    throw new Error("Default 404 page not found.");
                }
            }
        }
        page.default.layout = page?.default.layout || LayoutMain;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                unstyled: true,
            })
            .use(trail, { routes })
            .mount(el);
    },
    progress: {
        color: "oklch(50.5% 0.213 27.518)",
    },
});

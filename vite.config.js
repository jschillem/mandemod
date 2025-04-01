import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import path from "path";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/scripts/app.ts"],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],
    resolve: {
        alias: {
            "~font": path.resolve(__dirname, "resources/fonts"),
            "@layouts": path.resolve(__dirname, "resources/views/layouts"),
            "@components": path.resolve(
                __dirname,
                "resources/views/components",
            ),
            "@scripts": path.resolve("resources/scripts"),
            "@types": path.resolve(__dirname, "resources/scripts/types"),
            "@pages": path.resolve(__dirname, "resources/views/pages"),
        },
    },
});

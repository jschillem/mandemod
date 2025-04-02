import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";
import path from "path";
import vue from "@vitejs/plugin-vue";
import { watchAndRun } from "vite-plugin-watch-and-run";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/scripts/app.ts"],
            refresh: true,
        }),
        tailwindcss(),
        watchAndRun([
            {
                name: "ide-helper",
                watch: path.resolve("**/*.php"),
                run: "php artisan ide-helper:generate -qn && php artisan ide-helper:models -RMEqn",
            },
            {
                name: "typescript-transformer",
                watch: "app/(Data|Enums)/**/*.php",
                run: "php artisan typescript:transform -qn",
            },
        ]),
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

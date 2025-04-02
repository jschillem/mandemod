<script setup lang="ts">
/// <reference path="../../scripts/types/generated.ts" />
import LayoutMain from "@layouts/LayoutMain.vue";
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

let props = defineProps<App.Data.ErrorPageData>();

const message = computed(() => {
    var temp = "Sorry an error has occured.";
    if (props.status === 503) {
        temp = "Sorry the server is currently unavailable.";
    } else if (props.status === 404) {
        temp = "Sorry the page you are looking for cannot be found.";
    } else if (props.status === 403) {
        temp = "Sorry you are not authorized to access this page.";
    } else if (props.status === 500) {
        temp = "Sorry an internal server error has occured.";
    }

    return temp;
});
</script>

<template>
    <LayoutMain class="flex justify-center items-center">
        <div
            class="flex flex-col bg-stone-200 justify-center items-center w-fit px-8 py-2 rounded-xl mt-10 border-stone-300 border"
        >
            <h2
                class="text-6xl font-semibold tracking-tighter text-red-500 mt-6"
                v-text="props.status"
            />
            <p class="text-red-700" v-text="message" />
            <Link
                href=""
                class="text-red-400 text-sm mt-2 mb-4 underline hover:text-red-700"
                >Return to Home</Link
            >
        </div>
    </LayoutMain>
</template>

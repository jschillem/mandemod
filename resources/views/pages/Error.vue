<script setup lang="ts">
import { computed } from "vue";
import { route } from "momentum-trail";
import { Link } from "@inertiajs/vue3";

let { status = 404 } = defineProps<App.Data.ErrorPageData>();

const message = computed(() => {
    var temp = "Sorry, an error has occured.";

    switch (status) {
        case 403:
            temp = "Sorry, you are not authorized to access this page.";
            break;
        case 404:
            temp = "Sorry, the page you are looking for cannot be found.";
            break;
        case 419:
            temp = "Sorry, your session has expired.";
            break;
        case 500:
            temp = "Sorry, an internal server error has occured.";
            break;
        case 503:
            temp = "Sorry, the server is currently unavailable.";
            break;
    }

    return temp;
});
</script>

<template>
    <div
        class="flex flex-col bg-stone-200 justify-center items-center w-fit mx-auto px-8 py-2 rounded-sm border-stone-300 border"
    >
        <h2
            class="text-6xl font-semibold tracking-tighter text-red-700 mt-6"
            v-text="status"
        />
        <p class="text-stone-950" v-text="message" />
        <Link
            :href="route('home')"
            class="text-stone-700 text-sm mt-2 mb-4 underline hover:text-red-700"
            >Return to Home</Link
        >
    </div>
</template>

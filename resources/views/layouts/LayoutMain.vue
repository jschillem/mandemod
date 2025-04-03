<script setup lang="ts">
import { Avatar } from "primevue";
import { Link } from "@inertiajs/vue3";
import { route } from "momentum-trail";
</script>

<template>
    <header
        class="w-full sm:flex justify-between items-center hidden backdrop-blur-lg z-10 fixed py-1.5 px-3"
    >
        <Link :href="route('home')" class="group relative inline-block">
            <h1 class="font-semibold text-xl tracking-tighter text-stone-950">
                Mandemod
            </h1>
            <span
                class="font-semibold text-xl tracking-tighter absolute top-0 left-0 w-0 overflow-hidden whitespace-nowrap transition-all duration-500 ease-in-out group-hover:w-full"
            >
                <h1
                    class="font-semibold text-xl tracking-tighter text-red-700 underline"
                >
                    Mandemod
                </h1>
            </span>
        </Link>
        <div class="flex items-center justify-center gap-7">
            <menu class="grid grid-flow-col gap-7 text-sm">
                <li>Modules</li>
                <li>Manufacturers</li>
                <li>All Racks</li>
                <li>My Racks</li>
            </menu>
            <Avatar
                icon="pi pi-user"
                class="bg-stone-200 border border-stone-300 rounded-full aspect-square size-10 flex items-center justify-center"
            />
        </div>
    </header>
    <div class="h-18" />
    <main class="w-full mx-auto">
        <slot></slot>
    </main>
</template>

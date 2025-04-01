<script setup lang="ts"></script>

<template>
    <main class="font-geist">
        <slot></slot>
    </main>
</template>

<style>
.font-geist {
    font-family:
        "Geist",
        ui-sans-serif,
        system-ui,
        sans-serif,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Roboto,
        Oxygen,
        Ubuntu,
        Cantarell,
        "Open Sans",
        "Helvetica Neue";
}
</style>

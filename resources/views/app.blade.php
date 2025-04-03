<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/css/fonts.css', 'resources/scripts/app.ts'])
    @inertiaHead
</head>

<body class="font-sans antialiased w-full bg-stone-50 selection:bg-red-500 selection:text-stone-50 text-stone-950">
    @inertia
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth selection:bg-primary-400 selection:text-primary-950">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Bear UI' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: tailwind.colors.cyan,
                            secondary: tailwind.colors.slate,
                            success: tailwind.colors.green,
                            warning: tailwind.colors.amber,
                            danger: tailwind.colors.red,
                        }
                    }
                }
            }
        </script>

        <script src="/_test_ui/scripts.js"></script>
        @livewireStyles
        <ui:darkmode-watcher />
    </head>
    <body class="antialiased bg-transparent bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen relative isolate z-0">
            {{ $slot }}
        </div>
        @livewireScripts
    </body>
</html>

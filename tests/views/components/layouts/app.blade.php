<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth selection:bg-primary-400 selection:text-primary-950">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Bear UI' }}</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme inline {
              /* Primary */
              --color-primary-50: var(--color-indigo-50);
              --color-primary-100: var(--color-indigo-100);
              --color-primary-200: var(--color-indigo-200);
              --color-primary-300: var(--color-indigo-300);
              --color-primary-400: var(--color-indigo-400);
              --color-primary-500: var(--color-indigo-500);
              --color-primary-600: var(--color-indigo-600);
              --color-primary-700: var(--color-indigo-700);
              --color-primary-800: var(--color-indigo-800);
              --color-primary-900: var(--color-indigo-900);
              --color-primary-950: var(--color-indigo-950);

              /* Secondary */
              --color-secondary-50: var(--color-slate-50);
              --color-secondary-100: var(--color-slate-100);
              --color-secondary-200: var(--color-slate-200);
              --color-secondary-300: var(--color-slate-300);
              --color-secondary-400: var(--color-slate-400);
              --color-secondary-500: var(--color-slate-500);
              --color-secondary-600: var(--color-slate-600);
              --color-secondary-700: var(--color-slate-700);
              --color-secondary-800: var(--color-slate-800);
              --color-secondary-900: var(--color-slate-900);
              --color-secondary-950: var(--color-slate-950);

              /* Success */
              --color-success-50: var(--color-green-50);
              --color-success-100: var(--color-green-100);
              --color-success-200: var(--color-green-200);
              --color-success-300: var(--color-green-300);
              --color-success-400: var(--color-green-400);
              --color-success-500: var(--color-green-500);
              --color-success-600: var(--color-green-600);
              --color-success-700: var(--color-green-700);
              --color-success-800: var(--color-green-800);
              --color-success-900: var(--color-green-900);
              --color-success-950: var(--color-green-950);

              /* Warning */
              --color-warning-50: var(--color-amber-50);
              --color-warning-100: var(--color-amber-100);
              --color-warning-200: var(--color-amber-200);
              --color-warning-300: var(--color-amber-300);
              --color-warning-400: var(--color-amber-400);
              --color-warning-500: var(--color-amber-500);
              --color-warning-600: var(--color-amber-600);
              --color-warning-700: var(--color-amber-700);
              --color-warning-800: var(--color-amber-800);
              --color-warning-900: var(--color-amber-900);
              --color-warning-950: var(--color-amber-950);

              /* Danger */
              --color-danger-50: var(--color-red-50);
              --color-danger-100: var(--color-red-100);
              --color-danger-200: var(--color-red-200);
              --color-danger-300: var(--color-red-300);
              --color-danger-400: var(--color-red-400);
              --color-danger-500: var(--color-red-500);
              --color-danger-600: var(--color-red-600);
              --color-danger-700: var(--color-red-700);
              --color-danger-800: var(--color-red-800);
              --color-danger-900: var(--color-red-900);
              --color-danger-950: var(--color-red-950);
            }
        </style>
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

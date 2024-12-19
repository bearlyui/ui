<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Focus Classes
    |--------------------------------------------------------------------------
    |
    | These classes define default focus styles for all the UI components.
    | They provide consistent visual feedback across the application to
    | ensure accessibility standards are met for keyboard navigation.
    |
    */
    'focusClasses' => [
        'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 focus:ring-offset-white/80',
        'dark:focus:ring-primary-400 dark:focus:ring-offset-black/80',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Link Classes
    |--------------------------------------------------------------------------
    |
    | These classes define default link styles for the `<ui:link>` component.
    |
    */
    'linkClasses' => [
        'font-medium transition text-gray-800 dark:text-gray-200 rounded-sm',
        'hover:text-primary-800 dark:hover:text-primary-200',
        'underline decoration-2 decoration-primary-500/20 hover:decoration-primary-500/50',
    ],
];

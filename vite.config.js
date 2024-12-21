import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/theme-toggle.js',
                'resources/js/crud-user.js',
                'resources/js/filter-tabs.js',
                'resources/js/crud-offices.js',
                ],
            refresh: true,
        }),
    ],
});

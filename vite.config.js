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
            'resources/js/crud-class.js',
            'resources/js/crud-docs.js',
            'resources/js/spinner.js',
            'resources/js/search-office.js',
            'resources/js/search-subcategory.js',
            'resources/js/incoming.js',
            'resources/css/scrollbar.css',
            'resources/js/dashboard.js',
            'resources/js/notif-bell.js',
         ],
            refresh: true,
      }),
   ],
});

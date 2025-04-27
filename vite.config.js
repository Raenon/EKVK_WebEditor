import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', //Ide kell hozzá adni a plusz css-eket és js-t
                'resources/css/login.css',
                'resources/css/register.css',
                'resources/js/app.js',
                'resources/css/admin.css',
                'resources/css/company.css',
                'resources/js/editor.js',
                'resources/css/editor.css',
            ],
            refresh: true,
        }),
    ],
});

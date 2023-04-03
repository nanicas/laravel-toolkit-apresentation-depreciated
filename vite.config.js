import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/presentation_template/sass/app.scss',
                'resources/presentation_template/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

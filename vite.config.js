import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/presentation_template/sass/app.scss',
                'resources/presentation_template/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/presentation_template/vendor/chartjs/utils.js',
                    dest: 'vendor/chartjs'
                },
                {
                    src: 'resources/presentation_template/vendor/select2/i18n/pt-BR.js',
                    dest: 'vendor/select2/i18n'
                },
                {
                    src: 'resources/presentation_template/vendor/select2/custom.css',
                    dest: 'vendor/select2'
                },
                {
                    src: 'resources/presentation_template/vendor/bootstrap-theme/feather.min.js',
                    dest: 'vendor/bootstrap-theme'
                },
            ]
        })
    ],
});

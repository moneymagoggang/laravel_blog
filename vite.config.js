import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import pathModule from 'path';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        }
    },
    plugins: [
        laravel({
            input: [
                // 'resources/sass/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),

    ],
    resolve: {
        alias: {
            '~bootstrap': pathModule.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});

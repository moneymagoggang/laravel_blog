import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import pathModule from 'path';
let resourcePath = 'resources/assets/';

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
                resourcePath + 'js/app.js',
                resourcePath + 'js/app-admin.js',
                resourcePath + 'js/admin/dashboard.js',
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

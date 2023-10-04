import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import pathModule from 'path'

const path = 'resources/assets/';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                path + 'js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
                compilerOptions: {
                    isCustomElement: (tag) => tag.includes('-')
                },
            },
        }),
    ],
    build: {


    },
    resolve: {
        alias: {
            '~bootstrap': pathModule.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});

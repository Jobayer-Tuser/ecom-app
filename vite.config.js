import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/assets/css/vendor.min.css',
                'resources/assets/css/app.min.css',
                'resources/js/app.js',
                'resources/assets/js/vendor.min.js',
                'resources/assets/js/app.min.js',
                'resources/assets/js/demo/dashboard.demo.js',
                'resources/assets/plugins/apexcharts/dist/apexcharts.min.js',
            ],
            refresh: true,
        }),
    ],
});

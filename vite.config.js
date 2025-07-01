import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: { // добавил это, так как CSS и JS файлы подключаются по HTTP, а не HTTPS
        https: true,
    },
});

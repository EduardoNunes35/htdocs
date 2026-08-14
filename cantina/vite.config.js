import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        // Isso resolve o erro de permissão e garante a conexão
        host: '127.0.0.1', 
        //port: 5173,
        strictPort: true,
        hmr: {
            host: '127.0.0.1',
        },
    },
});
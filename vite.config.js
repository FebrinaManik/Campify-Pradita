import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // BARU: Import plugin Tailwind CSS

export default defineConfig({
    plugins: [
        tailwindcss(), // BARU: Daftarkan plugin Tailwind CSS
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
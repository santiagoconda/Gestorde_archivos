import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/css/styleLogin.css',
                    'resources/css/styleRecuperarcontraseña.css',
                    'resources/css/subirarchivos.css',
                    'resources/js/app.js',
                    'resources/js/auth.js',
                    ],
            refresh: true,
        }),
    ],
});

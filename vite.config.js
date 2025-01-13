import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~': path.resolve(__dirname, 'node_modules'),
        },
    },
    build: {
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    let extType = assetInfo.name.split('.')[1];
                    if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
                        return `assets/images/[name]-[hash][extname]`;
                    }
                    if (/woff|woff2|eot|ttf|otf/i.test(extType)) {
                        return `assets/fonts/[name][extname]`;
                    }
                    return `assets/[name]-[hash][extname]`;
                },
            },
        },
    },
    content: [
        "./resources/**/*.blade.php",
        // ... other paths
    ],
});

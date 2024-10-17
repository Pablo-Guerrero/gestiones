import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import UserRoles from './Components/UserRoles.vue';  // Importar tu componente de UserRoles

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

// Crear la aplicación de Inertia.js
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) });

        vueApp.component('user-roles', UserRoles); // Registrar el componente de UserRoles de forma global
        vueApp.use(plugin);
        vueApp.use(ZiggyVue, Ziggy);

        vueApp.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

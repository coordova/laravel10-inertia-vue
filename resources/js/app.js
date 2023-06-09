import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import {createInertiaApp, Link, Head} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import AppLayout from "@/Layouts/AppLayout.vue";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    /*resolve: async (name) => {
        const component = (await import(`./Pages/${name}.vue`)).default;
        // component.layout ??= Layout;
        return component;
    },*/
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            /*-------------------------*/
            .component("Link", Link)
            .component("Head", Head)
            .component("AppLayout", AppLayout)
            /*-------------------------*/
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

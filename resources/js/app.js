import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import VueEasyLightbox from 'vue-easy-lightbox';
import Vue3Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { CkeditorPlugin } from '@ckeditor/ckeditor5-vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob('./Pages/**/*.vue'),
    ),
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(VueEasyLightbox)
      .use(CkeditorPlugin)
      .use(Vue3Toastify, {
        autoClose: 3000,
      })
      .mount(el);
  },
  progress: {
    color: '#e4b363ff',
  },
});

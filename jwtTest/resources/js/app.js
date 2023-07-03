import './bootstrap';
import { createApp } from 'vue';
import {router} from "./router.js";
import App from "./components/Index.vue";


createApp(App)
    .use(router)
    .mount("#app")


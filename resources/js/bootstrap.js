import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

import $ from 'jquery';
window.$ = window.jQuery = $;
var jQuery = $;

import 'jquery-mask-plugin';

/**
 * For now, it is not necessary to use:
 * import * as jQueryUI from "jquery-ui";
 */

import * as Ladda from 'ladda';
window.Ladda = Ladda;

import Chart from 'chart.js/auto';
window.Chart = Chart;

import colorLib from '@kurkle/color';
window.colorLib = colorLib;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import select2 from 'select2';
select2(window, $);

import { jsPDF } from "jspdf";
window.jsPDF = jsPDF;

/**
 * Imported via vite due to not being able to make it work using require
 * directly from here:
 * import 'select2/dist/js/i18n/pt-BR.js';
 */

/**
 * As it is native to html, the code below is not necessary:
 * import 'bootstrap-datepicker';
 * import 'bootstrap-datepicker/js/locales/bootstrap-datepicker.de.js';
 */

import DataTable from 'datatables.net-bs5';
import languagePTDatatable from 'datatables.net-plugins/i18n/pt-BR.mjs';
window.languagePTDatatable = languagePTDatatable

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

import './bootstrap';
import jQuery from 'jquery';
window.$ = jQuery;
window.jQuery = jQuery;
//import teste from './teste';
//teste();

//import estados from './estados'
//estados();

// Initialization for ES Users - npm install tw-elements
import {
    Modal,
    Ripple,
    initTWE,
} from "tw-elements";
initTWE({ Modal, Ripple });

import 'laravel-datatables-vite';
import 'tw-elements';

import Alpine from 'alpinejs'

window.Alpine = Alpine
Alpine.start()
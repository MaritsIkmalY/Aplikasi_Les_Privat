import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";
import jQuery from 'jquery';
import AOS from "aos";

window.$ = window.jQuery = jQuery;
window.Alpine = Alpine;
window.Swal = Swal;

AOS.init();
Alpine.start();

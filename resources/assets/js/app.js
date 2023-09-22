import './bootstrap';
import 'bootstrap';
import './../sass/app.scss';

/**
 * Copy directories
 */
import.meta.glob([
    '../images/**',

]);

import $ from 'jquery';
import Quill from "quill";
import 'quill/dist/quill.core.css'; // Основные стили Quill
import 'quill/dist/quill.snow.css';
import 'select2';

// import Quill from "quill/quill.js";



window.$ = window.jQuery = $;


// let quill = new Quill("#editor", {
//     theme: 'snow'
// });
//
//
// quill.on('text-change', function() {
//     document.getElementById('content').value = quill.root.innerHTML;
// });

document.addEventListener('DOMContentLoaded', function () {
    let quill = new Quill('#editor', {
        theme: 'snow' // Выберите тему, соответствующую вашей импортированной теме
    });
});





document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("load", function () {
        console.log('EDIK')
        let preloader = document.getElementById("preloader");
        preloader.classList.add('d-none');
    });
});

console.log('123');

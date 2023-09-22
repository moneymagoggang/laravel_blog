/** Packages */
import './bootstrap';
import 'toastr'; // это для нотификаций на сайте
import 'jquery-ui'; // это база, много важных штук когда работаем с jquery
import 'jquery-validation'; // это пакет для динамичной валидации на фронте
import 'jquery-mask-plugin'; // это пакет, чтобы на инпуты кидать маску, например номер телеофна
import 'moment'; // это для работы с датами на js
/** Styles */
import '../sass/app-admin.scss'

/** Helpers js */
import './helpers/confirmation'

/**
 * Notification for admin panel
 * Allow type: success | info | warning | error
 * @param {string} text
 * @param {string} type
 */
window.notify = function (text, type = 'success') {
    toastr[type](text, getTitle(type), {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true,
    });
}

window.notify("hello world123123123")

window.featherLoad = function () {
    if (feather) {
        feather.replace({
            width: 14
            , height: 14
        });
    }
}

$(window).on('load', function () {
    window.featherLoad();
})

$(document).ajaxStop(function (e) {
    window.featherLoad();
});

/**
 * Get Title from notification
 * @param {string} type
 * @returns {string}
 */
function getTitle(type) {
    return type[0].toUpperCase() + type.slice(1) + '!';
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Change theme admin panel in backend
     */
    $('.js-change-theme').on('click', function () {
        let theme = 'dark';
        if ($(this).find('svg').hasClass('feather-moon')) {
            theme = 'light'
        }
        $.ajax({
            type: 'get',
            url: '/admin/change/theme/' + theme,
        })
    })
})


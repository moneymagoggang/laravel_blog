import Swal from 'sweetalert2' // это красивый пакет тоже для нотификаций

$(document).ready(function () {
    $('.js-confirmation-swal').on('click', function () {
        let el = $(this),
            form = $('.js-confirmation-form'),
            url = el.attr('data-url'),
            message = el.attr('data-message');

        form.attr('action', url);
        form.append(`<input type="hidden" name="_method" value="${el.data('method')}"/>`);

        Swal.fire({
            title: 'Are you sure?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF5370',
            cancelButtonColor: '#BCBABA',
            confirmButtonText: 'Apply'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    });
    $('.js-confirmation-swal-switch').on('click', function (e) {
        e.preventDefault();
        let el = $(this),
            form = $('.js-confirmation-form'),
            url = el.attr('data-url'),
            method = el.attr('data-method'),
            field = el.attr('data-field'),
            value = el.attr('data-value'),
            message = el.attr('data-message');

        form.attr('action', url);
        form.append(`<input type="hidden" name="_method" value="${method}"/>`);
        form.append(`<input type="hidden" name="${field}" value="${value}"/>`);

        Swal.fire({
            title: 'Are you sure?',
            text: message,
            icon: 'question',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#242493',
            cancelButtonColor: '#BCBABA',
            confirmButtonText: 'Apply'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    });
})

require('bootstrap');
import $ from 'jquery';

$(document).ready(function () {
    $('.js-order').click(function () {
        const url = $(this).data('href');

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {},
            async: true,

            success: function (data) {
                $('.js-order-show').find('.modal-content').html(data.template);
            }
        });
    });
});
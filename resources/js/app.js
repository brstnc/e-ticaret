
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('.increase, .decrease'). on('click', function () {
    var id = $(this).attr(data-id);
    var count = $(this).attr(data-count);
    $.ajax({
        type: 'PATH',
        url: 'basket/update/' +id,
        data: {count: count},
        success: function (result) {
            windows.location.href = '/basket';
        }
    });

});
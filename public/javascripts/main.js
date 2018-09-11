$(document).ready(function() {

    $('.js-sidebar-email').on('focus', function (e) {
        $(this).closest('form').find('.hidden').slideDown()
    })

});

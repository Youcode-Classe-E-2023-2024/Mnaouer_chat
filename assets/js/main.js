$('#multiple-select-field-tag').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
});

$('#multiple-select-field-assign').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
});

$(function () {
    if ($('#ms-menu-trigger')[0]) {
        $('body').on('click', '#ms-menu-trigger', function () {
            $('.ms-menu').toggleClass('toggled');
        });
    }
});
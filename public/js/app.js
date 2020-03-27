
$(document).ready(function() {
    $('.nav-item').each(function(i, e) {
        if($(e).find('a').attr('href') == window.location.href) {
            $(e).addClass('active')
        }
    });


    $('.error.alert').hide();
    function  checkPassword(e) {
        if($('input[name="password"]').hasClass('touched') && $('input[name="confirm_password"]').hasClass('touched'))
        {
            if($('input[name="password"]').val() !== $('input[name="confirm_password"]').val()) {
                e.parent('div').find('.error.alert').show('fast');
            }
        }
    }
    $('input').blur(function() {
        $(this).addClass('touched');
    });
    $('input[data-confirm]').blur(function() {
        checkPassword($(this));
    });
    $('input[data-confirm]').keyup(function() {
       $(this).parent('div').find('.error.alert').hide('fast')
    });


    $('select[data-value]').each(function(i, e) {
        $(e).find('option[value="'+ $(e).data('value') +'"]').prop('selected', true);
    });
});
/**
 * Created by Hugo on 17/12/2016.
 */

$(document).ready(function(){
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
    });

    $('.available-client').on('ifClicked', function(){
        $.ajax({
            url: 'http://localhost/GjAntWebAPI/backend/web/client-wallet/assign-client',
            data: {
                'client_id': $(this).attr('id'),
                'employer_id': $(this).attr('employer_id')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert(textStatus + ': ' + JSON.stringify(jqXHR));
        });
    });
});
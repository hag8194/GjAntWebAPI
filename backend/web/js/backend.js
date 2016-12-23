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
            method: "POST",
            url: 'http://localhost/GjAntWebAPI/backend/web/client-wallet/assign-client',
            data: {
                'client_id': $(this).attr('id'),
                'employer_id': $(this).attr('employer_id')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert(textStatus + ': ' + JSON.stringify(jqXHR));
        });
    });

    $('.delete-product-image').click(function(){
        var container = $(this).parent();
        $delete = confirm('Desea borrar la imagen?');
        if($delete){
            $.ajax({
                method: "POST",
                url: 'http://localhost/GjAntWebAPI/backend/web/product/delete-product-image',
                data: {
                    'id': $(this).attr('id')
                }
            }).done(function(data, status){
                if(data)
                    container.remove();

            }).fail(function(jqXHR, textStatus, errorThrown){
                alert(textStatus + ': ' + JSON.stringify(jqXHR));
            });
        }
    });

    $('.delete-product-images').click(function(){
        $delete = confirm('Seguro que desea borrar todas las imagenes?');
        if($delete){
            $.ajax({
                method: "POST",
                url: 'http://localhost/GjAntWebAPI/backend/web/product/delete-product-images',
                data: {
                    'id': $(this).attr('id')
                }
            }).done(function(data, status){
                if(data)
                    $('#product-images').html('<p>El producto no tiene imágenes</p>');

            }).fail(function(jqXHR, textStatus, errorThrown){
                alert(textStatus + ': ' + JSON.stringify(jqXHR));
            });
        }
    });
});
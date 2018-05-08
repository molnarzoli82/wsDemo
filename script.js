
$(document).ready(function () {

    $('form').on('submit', function (e) {

        e.preventDefault();

        $.post('ajaxSave.php', $('form').serialize(), function (html) {

        }).done(function (html) {
            alert('Az űrlap adatai rögzítve');
            
            $(':input','#urlap')
            .not(':button, :submit, :reset, :hidden')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');
            
        });
        return false;
        
    });
    
    document.getElementById("reset").addEventListener("click", function () {
        $("#save").html('Rögzít');
    }, true);

});



function list() {
    if (document.getElementById("szures") != null) {
        szures = '?szures=' + document.getElementById("szures").value;
    } else {
        szures = '';
    }

    $.ajax({
        type: 'POST',
        url: 'ajaxLoad.php' + szures,
        dataType: 'html',
        cache: false
    })
            .done(function (html) {
                $('#lista').html(html);

                document.getElementById("szures").addEventListener("change", function () {
                    list();
                }, true);

            });

}

function szerkeszt(id) {
    $.ajax({
        type: 'POST',
        url: 'ajaxEdit.php?id=' + id,
        dataType: 'json',
        cache: false
    })
            .done(function (html) {
                document.getElementById("name").value = html.name;
                document.getElementById("telefon").value = html.phone;
                document.getElementById("email").value = html.email;
                document.getElementById("szuletesiDatum").value = html.birthday;
                document.getElementById("modosit").value = html.id;
                $("#save").html('Módosít');
                $("#lista").html('');
                
                if (html.hobbiKerekpar == '1'){
                    $("#hobbiKerekpar").prop('checked', true);
                }
                if (html.hobbiTurazas == '1'){
                    $("#hobbiTurazas").prop('checked', true);
                }
                if (html.hobbiHegymaszas == '1'){
                    $("#hobbiHegymaszas").prop('checked', true);
                }
                if (html.hobbiProgramozas == '1'){
                    $("#hobbiProgramozas").prop('checked', true);
                }
                if (html.hobbiEgyeb == '1'){
                    $("#hobbiEgyeb").prop('checked', true);
                }

            });

}
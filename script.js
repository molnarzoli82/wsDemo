function save() {

    nev = document.getElementById("nev").value;
    email = document.getElementById("email").value;
    telefon = document.getElementById("telefon").value;
    szuletesidatum = document.getElementById("szuletesidatum").value;

    $.ajax({
        type: 'POST',
        url: '/ajaxSave.php?nev=' + nev,
        dataType: 'json',
        cache: false
    })
            .done(function (html) {
                if (html.hiba) {
                    alert(html.hiba);
                }
                //$('#opcio').html(html.html);
            });
}
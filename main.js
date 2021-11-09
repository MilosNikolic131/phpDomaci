$('#dodajForm').submit(function(){
    event.preventDefault();
    console.log("Dodavanje");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'dodaj.php',
        type:'post',
        data: serijalizacija
    });
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Uspesno dodat materijal");
            console.log("Materijal dodat");
            location.reload(true);
        }else console.log("Materijal nije dodat "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});

$('#btnObrisi').click(function(){
    event.preventDefault();
    console.log("Brisanje");
    
    //console.log(DeleteMatID);
    console.log(document.getElementById("DeleteMatID").value);

    req = $.ajax({
        url: 'obrisi.php',
        type:'post',
        data: {'DeleteMatID': document.getElementById("DeleteMatID").value}
    });
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            console.log("uso ovde");
            alert("Materijal uspešno obrisan");
            console.log("Obrisan materijal");
            location.reload(true);
        }else console.log("Materijal nije obrisan "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});
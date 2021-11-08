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
            alert("Kolokvijum uspešno zakazan");
            console.log("Dodar kolokvijum");
            location.reload(true);
        }else console.log("Kolokvijum nije dodat "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});
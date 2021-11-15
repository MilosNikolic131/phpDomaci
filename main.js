$('#dodajForm').submit(function(){
    console.log("vrsi se validranje");
    var $id = document.getElementById("MatID").value;
    var $naziv = document.getElementById("MatNaziv").value;
    console.log($id);
    if (!$id){
        console.log("ID materijala ne moze biti prazan");
        alert("ID materijala ne moze biti prazan");
        return;
    }
    if (!$naziv){
        alert("Naziv materijala ne moze biti prazan");
        return;
    }
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
    var $id = document.getElementById("DeleteMatID").value;
    if(!$id){
        alert("ID materijala za brisanje ne moze biti prazan");
        return;
    }
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

$('#btnPrikaz').click(function(){
    var x = document.getElementById("tabelaMaterijala");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
});

$('#UpdateForm').submit(function(){
    console.log("vrsi se validranje");
    var $id = document.getElementById("UpdateID").value;
    var $naziv = document.getElementById("UpdateName").value;
    console.log($id);
    if (!$id){
        console.log("ID materijala ne moze biti prazan");
        alert("ID materijala ne moze biti prazan");
        return;
    }
    if (!$naziv){
        alert("Naziv materijala ne moze biti prazan");
        return;
    }
    event.preventDefault();
    console.log("Izmena");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'izmeni.php',
        type:'post',
        data: serijalizacija
    });
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Uspesno izmenjen naziv materijala");
            console.log("Materijal izmenjen");
            location.reload(true);
        }else console.log("Materijal nije izmenjen "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});

$('#dodajDusekForm').submit(function(){
    console.log("vrsi se validranje");
    var $id = document.getElementById("DusekID").value;
    var $naziv = document.getElementById("NazivDuseka").value;
    var $sirina = document.getElementById("Sirina").value;
    var $duzina = document.getElementById("Duzina").value;
    var $matidfk = document.getElementById("MatIDFK").value;
    console.log($id);
    if (!$id){
        console.log("ID duseka ne moze biti prazan");
        alert("ID duseka ne moze biti prazan");
        return;
    }
    if (!$naziv){
        alert("Naziv duseka ne moze biti prazan");
        return;
    }
    if (!$sirina){
        alert("Sirina duseka ne moze biti prazna");
        return;
    }
    if (!$duzina){
        alert("Duzina duseka ne moze biti prazna");
        return;
    }
    if (!$matidfk){
        alert("Materijal duseka nije postavljen");
        return;
    }
    event.preventDefault();
    console.log("Dodavanje");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'dodajDusek.php',
        type:'post',
        data: serijalizacija
    });
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Uspesno dodat dusek");
            console.log("Dusek dodat");
            location.reload(true);
        }else console.log("Dusek nije dodat "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});

$('#btnObrisiDusek').click(function(){
    event.preventDefault();
    var $id = document.getElementById("DeleteDusekID").value;
    if(!$id){
        alert("ID duseka za brisanje ne moze biti prazan");
        return;
    }
    console.log("Brisanje");
    
    //console.log(DeleteMatID);
    console.log(document.getElementById("DeleteDusekID").value);

    req = $.ajax({
        url: 'obrisiDusek.php',
        type:'post',
        data: {'DeleteDusekID': document.getElementById("DeleteDusekID").value}
    });
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            console.log("uso ovde");
            alert("Dusek uspešno obrisan");
            console.log("Obrisan dusek");
            location.reload(true);
        }else console.log("Dusek nije obrisan "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});

$('#UpdateFormDusek').submit(function(){
    console.log("vrsi se validranje");
    var $id = document.getElementById("UpdateIDDusek").value;
    var $naziv = document.getElementById("UpdateNameDusek").value;
    var $sirina = document.getElementById("UpdateSirina").value;
    var $duzina = document.getElementById("UpdateDuzina").value;
    var $matidfk = document.getElementById("UpdateMatID").value;
    console.log($id);
    if (!$id){
        console.log("ID duseka ne moze biti prazan");
        alert("ID duseka ne moze biti prazan");
        return;
    }
    if (!$naziv){
        alert("Naziv duseka ne moze biti prazan");
        return;
    }
    if (!$sirina){
        alert("Srina duseka ne moze biti prazna");
        return;
    }
    if (!$duzina){
        alert("Duzina duseka ne moze biti prazna");
        return;
    }
    if (!$matidfk){
        alert("Materijal duseka nije postavljen");
        return;
    }
    event.preventDefault();
    console.log("Izmena");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'izmeniDusek.php',
        type:'post',
        data: serijalizacija
    });
    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Uspesno izmenjen dusek");
            console.log("dusek izmenjen");
            location.reload(true);
        }else console.log("dusek nije izmenjen "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});

$('#btnPrikazDuseka').click(function(){
    var x = document.getElementById("tabelaDuseka");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
});
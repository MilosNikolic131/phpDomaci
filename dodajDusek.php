<?php

require "dbBroker.php";
require "Dusek.php";


if(isset($_POST['DusekID']) && isset($_POST['NazivDuseka']) && isset($_POST['Sirina'])
&& isset($_POST['Duzina']) && isset($_POST['MatIDFK']) )
{
    echo "dodavanje duseka";
    $dusek = new Dusek($_POST['DusekID'],$_POST['NazivDuseka'],$_POST['Sirina'],$_POST['Duzina'],$_POST['MatIDFK'] );
    $podaci = Dusek::prikazi($conn);
    while ($red = $podaci->fetch_array()){
        if($red["DusekID"] == $_POST['DusekID']){
            echo "Vec postoji dusek sa tim ID-om";
            die();
        }
    }
    $status = Dusek::dodaj($dusek, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}


?>
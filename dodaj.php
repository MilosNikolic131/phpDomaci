<?php

require "dbBroker.php";
require "Materijal.php";


if(isset($_POST['MatID']) && isset($_POST['MatNaziv']) )
{
    $materijal = new Materijal($_POST['MatID'],$_POST['MatNaziv'] );
    $podaci = Materijal::prikazi($conn);
    while ($red = $podaci->fetch_array()){
        if($red["MaterijalID"] == $_POST['MatID']){
            echo "Vec postoji materijal sa tim ID-om";
            return false;
        }
    }
  
    $status = Materijal::dodaj($materijal, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}


?>
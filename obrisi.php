<?php

require "dbBroker.php";
require "Materijal.php";
require "Dusek.php";

if(isset($_POST['DeleteMatID'])){
    $podaci = Dusek::prikazi($conn);
    while ($red = $podaci->fetch_array()){
        if($red["MaterijalID"] == $_POST['DeleteMatID']){
            echo "Postoji dusek koji koristi ovaj materijal!";
            return false;
        }
    }
    $id = $_POST['DeleteMatID'];
    $status = Materijal::obrisi($id,$conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}




?>
<?php

require "dbBroker.php";
require "Materijal.php";
if(isset($_POST['DeleteMatID'])){
    $id = $_POST['DeleteMatID'];
    $status = Materijal::obrisi($id,$conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}




?>
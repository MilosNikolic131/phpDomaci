<?php

require "dbBroker.php";
require "Dusek.php";
if(isset($_POST['DeleteDusekID'])){
    $id = $_POST['DeleteDusekID'];
    $status = Dusek::obrisi($id,$conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}




?>
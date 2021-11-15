<?php

require "dbBroker.php";
require "Dusek.php";
if(isset($_POST['UpdateIDDusek']) && isset($_POST['UpdateNameDusek']) && isset($_POST['UpdateSirina']) 
&& isset($_POST['UpdateDuzina'])&& isset($_POST['UpdateMatID']) )
{
    $dusek = new Dusek($_POST['UpdateIDDusek'],$_POST['UpdateNameDusek'], $_POST['UpdateSirina'],$_POST['UpdateDuzina'],$_POST['UpdateMatID']);
    $status = Dusek::izmeni($dusek, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }

}


?>
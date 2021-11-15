<?php

require "dbBroker.php";
require "Materijal.php";
if(isset($_POST['UpdateID']) && isset($_POST['UpdateName']) )
{
    $materijal = new Materijal($_POST['UpdateID'],$_POST['UpdateName'] );
    $status = Materijal::izmeni($materijal, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }

}


?>
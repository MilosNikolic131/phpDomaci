<?php

require "dbBroker.php";
require "Materijal.php";


if(isset($_POST['MatID']) && isset($_POST['MatNaziv']) )
{
    $materijal = new Materijal($_POST['MatID'],$_POST['MatNaziv'] );
    $status = Materijal::dodaj($materijal, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}


?>
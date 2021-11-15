<?php

require "Materijal.php";
require "Dusek.php";
require "dbBroker.php";
$podaci = Materijal::prikazi($conn);

while ($red = $podaci->fetch_array()){

}

?>
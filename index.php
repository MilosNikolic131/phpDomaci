<?php
require "Materijal.php";
require "dbBroker.php";
$podaci = Materijal::prikazi($conn);
if (!$podaci) {
    echo "Nastala je greška pri preuzimanju podataka";
    die();
}
if ($podaci->num_rows == 0) {
    echo "";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naslovna</title>
</head>
<body>
    <form action="#" method="post" id = "dodajForm">
        <label for="MatID">ID Materijala:</label><br>
        <input type="text" id="MatID" name="MatID" value=""><br>
        <label for="MatNaziv">Naziv Materijala:</label><br>
        <input type="text" id="MatNaziv" name="MatNaziv" value=""><br><br>
        <input id = "btnDodaj" type="submit" value="Dodaj" name = "dodaj">
        
      </form> 

      <table border="1">
            <thead>
                <tr>
                <th>MaterijalID</th>
                <th>Naziv</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    while ($red = $podaci->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["MaterijalID"] ?></td>
                            <td><?php echo $red["NazivMaterijala"] ?></td>
                        </tr>
                <?php endwhile ?>
            </tbody>
            
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
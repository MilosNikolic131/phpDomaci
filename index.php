<?php
require "Materijal.php";
require "Dusek.php";
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
$podaciDusek = Dusek::prikazi($conn);
if (!$podaciDusek) {
  echo "Nastala je greška pri preuzimanju podataka";
  die();
}
if ($podaciDusek->num_rows == 0) {
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Magacin</title>
</head>
<body>

<div id = "materijalMain">
<h2 class = "header">Rad sa materijalima</h2>
  <div id="dodavanjeForma">
    <form action="#" method="post" id="dodajForm">
    <label for="">Forma za unos materijala</label> <br>
      <label for="MatID">ID Materijala:</label><br>
      <input type="text" id="MatID" name="MatID" value=""><br>
      <label for="MatNaziv">Naziv Materijala:</label><br>
      <input type="text" id="MatNaziv" name="MatNaziv" value=""><br>
      <input id="btnDodaj" type="submit" value="Dodaj" name="dodaj">

    </form>
    <br>
  </div>

  <div id="brisanjeforma">
    <form action="#" method="post" id="BrisanjeForm">
      <label for="">Forma za brisanje</label> <br>
      <label for="DeleteMatID">ID Materijala za brisanje:</label><br>
      <input type="text" id="DeleteMatID" name="DeleteMatID" value=""><br>
      <input id="btnObrisi" type="submit" value="Obrisi" name="obrisi">
      <br>
    </form>
  </div>
  <!-- 
      <form action="#" method="post" id = "PretragaForm">
        <label for="">Forma za pretragu</label> <br>
        <label for="SearchName">Naziv materijala za pretragu:</label><br>
        <input type="text" id="SearchName" name="SearchName" value=""><br>
        <input id = "btnPretrazi" type="submit" value="Pretrazi" name = "pretrazi">
      </form> 
       -->
  <div id="izmenaforma">
    <form action="#" method="post" id="UpdateForm">
      <label for="">Forma za izmenu</label> <br>
      <label for="UpdateID">Unesi id materijala kome zelis da izmenis ime:</label><br>
      <input type="text" id="UpdateID" name="UpdateID" value=""><br>
      <label for="UpdateName">Unesi novi naziv materijala:</label><br>
      <input type="text" id="UpdateName" name="UpdateName" value=""><br>
      <input id="btnUpdate" type="submit" value="Izmeni" name="izmeni">
    </form>
    <br>
  </div>
  <div>
    <input id="btnPrikaz" type="submit" value="Prikazi materijale" name="prikazi" style="display: block">
  </div>
  <div id="tabelaMaterijala" style="display: none">

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
  </div>
  </div>
  <div id = "dusekMain">
    <h2 class = "header">Rad sa dusecima</h2>
  <div id="dodavanjeDusekaForma">
    <form action="#" method="post" id="dodajDusekForm">
    <label for="">Forma za unos duseka</label> <br>
      <label for="DusekID">ID Duseka:</label><br>
      <input type="text" id="DusekID" name="DusekID" value=""><br>
      <label for="NazivDuseka">Naziv Duseka:</label><br>
      <input type="text" id="NazivDuseka" name="NazivDuseka" value=""><br>
      <label for="Sirina">Sirina:</label><br>
      <input type="text" id="Sirina" name="Sirina" value=""><br>
      <label for="Duzina">Duzina:</label><br>
      <input type="text" id="Duzina" name="Duzina" value=""><br>
      <label for="MatIDFK">Materijal ID:</label><br>
      <input type="text" id="MatIDFK" name="MatIDFK" value=""><br>
      <input id="btnDodajDusek" type="submit" value="Dodaj" name="dodaj">

    </form>
    <br>
  </div>
  <div id="brisanjeformaDusek">
    
    <form action="#" method="post" id="BrisanjeFormDusek">
      <label for="">Forma za brisanje</label> <br>
      <label for="DeleteDusekID">ID Duseka za brisanje:</label><br>
      <input type="text" id="DeleteDusekID" name="DeleteDusekID" value=""><br>
      <input id="btnObrisiDusek" type="submit" value="Obrisi" name="obrisi">
      <br>
    </form>
  </div>
  <div id="izmenaformaDusek">
    
    <form action="#" method="post" id="UpdateFormDusek">
      <label for="">Forma za izmenu</label> <br>
      <label for="UpdateIDDusek">Unesi id duseka koji zelis da izmenis:</label><br>
      <input type="text" id="UpdateIDDusek" name="UpdateIDDusek" value=""><br>
      <label for="UpdateNameDusek">Unesi novi naziv duseka:</label><br>
      <input type="text" id="UpdateNameDusek" name="UpdateNameDusek" value=""><br>
      <label for="UpdateSirina">Unesi novu sirinu:</label><br>
      <input type="text" id="UpdateSirina" name="UpdateSirina" value=""><br>
      <label for="UpdateDuzina">Unesi novu duzinu:</label><br>
      <input type="text" id="UpdateDuzina" name="UpdateDuzina" value=""><br>
      <label for="UpdateMatID">Unesi id novog materijala:</label><br>
      <input type="text" id="UpdateMatID" name="UpdateMatID" value=""><br>
      <input id="btnUpdateDusek" type="submit" value="Izmeni" name="izmeni">
    </form>
    <br>
  </div>
  <div>
    <input id="btnPrikazDuseka" type="submit" value="Prikazi duseke" name="prikazi" style="display: block">
  </div>
  <div id="tabelaDuseka" style = "display: none">

    <table border="1">
      <thead>
        <tr>
          <th>DusekID</th>
          <th>NazivDuseka</th>
          <th>Sirina</th>
          <th>Duzina</th>
          <th>MaterijalID</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($redDuseka = $podaciDusek->fetch_array()) :
        ?>
          <tr>
            <td><?php echo $redDuseka["DusekID"] ?></td>
            <td><?php echo $redDuseka["NazivDuseka"] ?></td>
            <td><?php echo $redDuseka["Sirina"] ?></td>
            <td><?php echo $redDuseka["Duzina"] ?></td>
            <td><?php echo $redDuseka["MaterijalID"] ?></td>
          </tr>
        <?php endwhile ?>
      </tbody>

    </table>
  </div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</body>

</html>
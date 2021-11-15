<?php


class Dusek{

    public $DusekID;
    public $NazivDuseka;
    public $Sirina;
    public $Duzina;
    public $MatIDFK;
    public function __construct($DusekID,$NazivDuseka,$Sirina,$Duzina,$MatIDFK){
        $this->DusekID = $DusekID;
        $this->NazivDuseka = $NazivDuseka;
        $this->Sirina = $Sirina;
        $this->Duzina = $Duzina;
        $this->MatIDFK = $MatIDFK;
    }
    public static function dodaj(Dusek $dusek, mysqli $conn)
    {
        echo "sql insert";
        $query = "INSERT INTO duseci(DusekID, NazivDuseka, Sirina, Duzina, MaterijalID) VALUES ('$dusek->DusekID','$dusek->NazivDuseka','$dusek->Sirina','$dusek->Duzina','$dusek->MatIDFK')";
        echo $query;
        return $conn->query($query);
    }
   
    public static function prikazi(mysqli $conn)
       {
           $query = "SELECT * FROM duseci";
           return $conn->query($query);
       }
   
       public static function obrisi($id,mysqli $conn)
       {
           $query = "DELETE FROM duseci WHERE DusekID=$id";
           return $conn->query($query);
       }


       public static function izmeni(Dusek $dusek, mysqli $conn)
   {
       $query = "UPDATE Duseci
       SET NazivDuseka = '$dusek->NazivDuseka',
       Sirina = '$dusek->Sirina',
       Duzina = '$dusek->Duzina',
       MaterijalID = '$dusek->MatIDFK'
       WHERE DusekID = $dusek->DusekID;";
       return $conn->query($query);
   }
}

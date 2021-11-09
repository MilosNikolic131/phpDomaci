<?php
class Materijal{

public $MaterijalID;
public $NazivMaterijala;

public function __construct($MaterijalID,$NazivMaterijala)
{
    $this->MaterijalID = $MaterijalID;
    $this->NazivMaterijala = $NazivMaterijala;
}

 public static function dodaj(Materijal $materijal, mysqli $conn)
 {
     $query = "INSERT INTO materijali(MaterijalID, NazivMaterijala) VALUES ('$materijal->MaterijalID','$materijal->NazivMaterijala')";
     return $conn->query($query);
 }

 public static function prikazi(mysqli $conn)
    {
        $query = "SELECT * FROM materijali";
        return $conn->query($query);
    }

    public static function obrisi($id,mysqli $conn)
    {
        $query = "DELETE FROM materijali WHERE MaterijalID=$id";
        return $conn->query($query);
    }


}


?>
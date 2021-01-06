<?php
 $baglan =mysqli_connect("localhost","root","","apartment");

 if(!$baglan) 
 {
     die("connection failed:" .mysqli_connect_error());
 }
 else{
     echo "baglantı gerceklesti";
 }


?>

<?php

$bul = "SELECT * FROM dues" ;
$kayit = $baglan->query($bul);

if ($kayit->num_rows>0) {

    while ($satir = $kayit->fetch_assoc()) {

        echo "Selam:".$satir["name"]. "<br>" ;
    }

}
?>
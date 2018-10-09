<?php
  $connection = mysqli_connect("localhost:3306", "boogyman", "linkin", "korisnici");
  if($connection ){
     echo "<h5 class='alert alert-success'>Uspesno konektovanje na bazu podataka</h5>";
  } else{
     die("Greska prilikom konektovanja na bazu ");
  }
 
?>



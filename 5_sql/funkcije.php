<?php
include "./konekcija.php";
function pronadji(){
  global $connection;
  $query = "SELECT * FROM korisnici";
  $rezultat = mysqli_query($connection, $query);
  if(!$rezultat){
      die("Neuspesno citanje" .mysqli_error());
  }


  while($red = mysqli_fetch_assoc($rezultat)){
     $rbr = $red['rbr'];
     echo "<option  value='$rbr'>$rbr</option>";
  }
  echo "<h1>Hallo </h1>";
}

function update(){
  global $connection;
  $ime = $_POST['email'];
  $lozinka = $_POST['lozinka'];
  $rbr = $_POST['rbr'];
  $query = "UPDATE korisnici SET ime='$ime', lozinka='$lozinka' where rbr='$rbr'"; //u slucaju podele koda u vise linija, obavezno ostaviti prazan prostor, jer ce u suprotnom rezultirati greskom

  $rezultat = mysqli_query($connection, $query);//uvek prvo ide $CONNECTION>>>
  //provera da li su vrednosti izmenjene
  if(!$rezultat){
    die("Greska prilikom update-ovanja vrednost" . mysqli_error($connection));//mysqli_error vraca sadrzaj SQL greske 
  } else {
     echo "<h4 class='alert alert-success'>Uspesno izmenjeni parametri</h4>";
  }
}





?>

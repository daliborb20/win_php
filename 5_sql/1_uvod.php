<?php
if(isset($_POST["posalji"])){
  //uzimanje loznike ====================================
  $email = $_POST['email'];
  $lozinka = $_POST['lozinka'];
  //petlja ===================================
  if($email == '' || $lozinka ==''){
     echo '<h4 class="alert alert-danger" style="text-align:center">Morate uneti vrednost za korisnicko ime i lozniku </h4>';
  }
  //uspostavljanje konekcije ==============================
  $connection = mysqli_connect("localhost:3306", "root", "linkin", "korisnici");
  if($connection ){
     echo "<h5 class='alert alert-success'>Uspesno konektovanje na bazu podataka</h5>";
  } else{
     die("Greska prilikom konektovanja na bazu ");
  }
  $query = "INSERT INTO korisnici(ime, lozinka)";
  $query.= "VALUES ('$email', '$lozinka')";
  $rezultat = mysqli_query($connection, $query);
  //provera upisa u bazu
  if(!$rezultat){
     die("Greska prilikom unosa u bazu".mysqli_error());
  } else{
    echo "<h5 class='alert alert-success'>Uspesno upisno u bazu</h5>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MYSQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
 <div class="container col-sm-6 ">
  <form action="" method="POST">

    <div class="form-group">
      <label for="email">Email adresa:</label>
      <input type="email" class="form-control " name="email">
    </div>

    <div class="form-group">
      <label for="lozinka">Lozinka za korisnicki nalog:</label>
      <input class="form-control " id="lozinka"type="password" name="lozinka">
    </div>

    <div class="form-group">
      <input class="form-control btn btn-danger" id="posalji" value="Posalji" type="submit" name="posalji">
    </div>
  </form>

 </div>
</body>
</html>

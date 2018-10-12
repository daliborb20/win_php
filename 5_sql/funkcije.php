<?php
include "./konekcija.php";
//=====================================================================CREATE USER
function createUser(){
  global $connection;
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
}

//=====================================================================find  USER
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

//========================================================================izmeni korisnika
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
//=======================================================================izbrisi korisnika
function izbrisi(){
  global $connection;
  $rbr = $_POST['rbr'];
  $query = "DELETE FROM korisnici WHERE rbr = '$rbr'";
  $rezultat = mysqli_query($connection, $query);
  if (!$rezultat){
     echo "<h4 class='alert alert-danger'>Greska prilikom brisanja korisnika</h4>";
  } else {
     echo "h4 class='alert alert-success'>Korisnik  uspesno izbrisan iz baze";
  }
}




?>

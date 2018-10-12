<?php include "konekcija.php"; ?>
<?php include "funkcije.php"; ?>
<?php
if(isset($_POST['posalji'])){
  update(); 
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
<h2 class="text-center">IZMENI</h2>
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
    <select id="" name="rbr">
<?php
pronadji();
?>
    </select>

    <div class="form-group">
      <input class="form-control btn btn-danger" id="Izmeni" value="Posalji" type="submit" name="posalji">
    </div>


    </div>
  </form>
 </div>
</body>
</html>

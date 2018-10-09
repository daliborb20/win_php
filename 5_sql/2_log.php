<?php
    //uspostavljanje konkecije
  $connection = mysqli_connect("localhost:3306", "root", "linkin", "korisnici");
  if($connection ){
     echo "<h5 class='alert alert-success'>Uspesno konektovanje na bazu podataka</h5>";
  } else{
     die("Greska prilikom konektovanja na bazu ");
  }
  $query = "SELECT * FROM korisnici";
  $rezultat = mysqli_query($connection, $query);
  if(!$rezultat){
     die("Neuspesno citanje" .mysqli_error());
  }
 //provera upisa u bazu
  /*     echo "*/
          //<table class='table'>
          //<thead>
          //<tr>
          //<th>Redni Broj </th>
          //<th>Email</th>
          //<th>Lozinka</th>
          //</tr>
          //</thead>
          
//";

       //echo "<tbody>";

  //if(!$rezultat){
     //die("Greska prilikom unosa u bazu".mysqli_error());
  //} else{
    //foreach($rezultat as $podatak){
       //echo "<tr>";
       //echo "<td>".$podatak['rbr']."</td>";
       //echo "<td>".$podatak['ime']."</td>";
       //echo "<td>".$podatak['lozinka']."</td>";
       //echo "</tr>";

      //}
  //}
       //echo "
          //</tbody>
          //</table>
//";


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
<?php
  while($red = mysqli_fetch_assoc($rezultat)){//mysqli_fetch_asoc =====> stampa u obliku asocijativne matrice ili mysqli_fetch_row >>> za stampanje 1,2,3
    
?>
<pre>
<?php
  print_r($red);

  ?>
</pre>
<?php
  }

  ?>
</body>
</html>

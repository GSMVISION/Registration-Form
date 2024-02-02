<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $prenom = $_POST["prenom"];
  $nom = $_POST["nom"];
  $justificatif = $_POST["justificatif"];
  $sexe = $_POST["sexe"];
  $cv = $_POST["cv"];

  $image_name = $_FILES['pic']['name'];


  $allowed_ext = array('jpg', 'png', 'svg', 'jpeg', 'webp');

  $explode_ext = explode(".", $image_name);

  $end_ext = end($explode_ext);

  if (in_array($end_ext, $allowed_ext)) {

    $img_path = 'C:\xampp\htdocs\form test\img\\' . $image_name;
    move_uploaded_file($image_temp, $img_path);
  }




  $prenom_f = $_POST['prenom_f'];
  $nom_f = $_POST['nom_f'];
  $date_of_birth = $_POST['date_of_birth'];

  mysqli_begin_transaction($conn);
  $query = "INSERT INTO formulaire ( `prenom`, `nom`, `justificatif`, `sexe`, `cv`, `pic`) VALUES( '$prenom', '$nom', '$justificatif', '$sexe', '$cv' , '$image_name' )";
  if (mysqli_query($conn, $query)) {
    $last_id = mysqli_insert_id($conn);

    $insert_query_children = "INSERT INTO children( prenom_f, nom_f, date_of_birth, person_id) VALUES ( '$prenom_f', '$nom_f' , '$date_of_birth' ,'$last_id' )";

    if (mysqli_query($conn, $insert_query_children)) {

      mysqli_commit($conn);

      echo '<script>alert("Data inserted successfully"); </script>';
    } else {
      mysqli_rollback($conn);
      echo "Error: " . $insert_query_children . "<br>" . mysqli_error($conn);
    }
  } else {
    mysqli_rollback($conn);
    echo "Error: " .  $insert_query . "<br>" . mysqli_error($conn);
  }

  header("location:ALG.php");
  exit();
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>ALG ALG</title>
</head>

<body>
  <div class="container">
    <form class="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <label for="">Name</label>
      <input type="text" name="nom" required value=""><br>



      <label for="">Family Name</label>
      <input type="text" name="prenom" required value=""><br>



      <label for="">Gender</label>
      <input type="radio" name="sexe" value="Male" required> Male
      <input type="radio" name="sexe" value="Female"> Female<br><br>

      <label for="">Authentication</label>
      <select class="" name="justificatif" required>
        <option value="Carte identité">Carte identité</option>
        <option value="Carte etudiant">Carte etudiant</option>
        <option value="Permis de Conduit">Permis de Conduit</option>
      </select>
      <br>

      <label for="">CV Ref
        <textarea name="cv">Your CV in a few lines</textarea>
      </label>

      <label for="image"> Your Picture</label>
      <input type="file" name="pic">

      <br>

      <div class="gsmt">
        <center>
          <h2>
            <font face="DM Sans, sans-serif" style="font-weight: 300px;"><b>Your Children</b></font>
          </h2>

          <table style="font-family: 'DM Sans', sans-serif;font-weight: bold;">
            <tr>
              <th>Name</th>
              <th>Family Name</th>
              <th>Born in</th>
            </tr>
            <tr>
              <td><input for="" type="text" name="prenom_f"></td>
              <td><input for="" type="text" name="nom_f"></td>
              <td><input for="" type="date" name="date_of_birth"></td>
            </tr>



          </table>

        </center>

      </div>
      <center><button type="submit" name="submit">Valider la saise</button></center>
      <br>
      <?php
      if (isset($_GET['success'])) {
        echo "Thanks for your understanding";
      }
      ?>


    </form>
  </div>
</body>

</html>
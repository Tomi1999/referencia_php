<!doctype html>
<html lang="en">
  <head>
    <?php
include('fuggvenyek.php');
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password']==$_POST['password2']) {
  $user=$_POST['username'];
  $pass=$_POST['password'];
  regisztracio($user, $pass);
  if (!bejelentkezes2($user)==true) {
    echo "Sikertelen regisztráció";
  } else {
    echo "Sikeres regisztráció";
  }
}

if (isset($_POST['vissza'])) {
  header("Location:kezdo_javitott.php");
  exit();
  return $user;
}
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Regisztráció</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <form action="regisztracio_javitott.php" method="POST"> 
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Regisztráció</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
         <input class="form-control me-2" type="text" name="username" placeholder="Felhasználónév" aria-label="Felhasználónév">
      </td>
    </tr>
    <tr>
      <td>
        <input class="form-control me-2" type="text" name="password" placeholder="Jelszó" aria-label="Jelszó">
      </td>
    </tr>
    <tr>
      <td>
        <input class="form-control me-2" type="text" name="password2" placeholder="Jelszó újra" aria-label="Jelszó újra">
      </td>
    </tr>
    <tr>
      <td>
      <button class="btn btn-outline-success" type="submit">Regisztráció</button>
      </td>
      
    </tr>
    </tr>
    <tr>
      <td>
      <button class="btn btn-outline-success" name="vissza" type="submit">Vissza a kezdőoldalra</button>
      </td>
      
    </tr>
  </tbody>
</table>
</form>
  </body>
</html>

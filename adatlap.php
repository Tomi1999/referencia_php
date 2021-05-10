Írj ki valamit!
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Adatlatlap</title>
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <form action="adatlap.php" method="POST">
		<div class="form-floating">
  <textarea class="form-control" name='comment' placeholder="Leave a comment here" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Comments</label>
  <input type='submit' value='Kiír' name='kiiratas' class="btn btn-outline-success">
  
</div><br>
</form>
 <form action="adatlap.php" method="POST">
   <input type='submit' name='kilep' value='Kilép' class="btn btn-outline-success"><br />
   <input type="submit" value="Kommentjeim törlése" name="törlés" class="btn btn-outline-success"><br />
   <input type="submit" value="Fiók törlése" name="felhtorl" class="btn btn-outline-success">
 </form>

  </body>
</html>
<?php
    session_start();
    echo $_SESSION['user'];
    include('fuggvenyek.php');
    if (isset($_POST['comment']) && isset($_POST['kiiratas']) && !empty($_POST['comment'])) {
    $user=$_SESSION['user'];
    $comment=$_POST['comment'];
    date_default_timezone_set('UTC');
    $dateto=date('Y-m-d H:m:s'); 
    komment($user, $comment, $dateto);
    }
    $link = @mysqli_connect('localhost', 'root', '', 'user');
    $query = "SELECT Username as user, Comment as comment, Datewr as datei FROM comment";
    $result = mysqli_query($link, $query);
  echo "<form action='adatlap.php' method='POST'>";
  echo "<table>";
  while($row = mysqli_fetch_array($result)) {
    echo  '<tr>'.'<td>'.$row['user'].'</td>'.'<td>'.'<h2>'.$row['comment'].'</h2>'.'</td>'.'<td>'.'<small>'.$row['datei'].'</small>'.'</td>'.'<td>'.'</tr>';
  }
  if (isset($_POST['törlés'])) {
    $username=$_SESSION['user'];
    torles ($username);
  }
  echo "</table>";
  echo "</form>";
  if (isset($_POST['kilep'])) {
    header('Location:kezdo_javitott.php');
    exit();
  }
if(isset($_POST['felhtorl'])){
  $torlendo=$_SESSION['user'];
  torles1($torlendo);
   header('Location:kezdo_javitott.php');
    exit();
}
?>
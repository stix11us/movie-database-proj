<?php 

require_once('database.php');

if(!empty($_GET['id'])) {
  $film_id = intval($_GET['id']);
  
  try {
    $results = $db->prepare('select * from film where film_id = ?');
    $results->bindParam(1, $film_id);
    $results->execute();
  } catch(Exception $e) {
      echo $e->getMessage();
      die();
  }
  $film = $results->fetch(PDO::FETCH_ASSOC);
  if($film == FALSE){
    echo 'Sorry, a film could not be found with provided ID.';
    die();
  }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1>Sakila Sample Database</h1>
  <h2>
  <?php 
  echo $film['title'];
  print_r($film);
  ?>
  </h2>

</body>

</html>
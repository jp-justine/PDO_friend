<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

 require_once 'connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();
   var_dump($_POST);

    $query = "INSERT INTO friend (firstname, lastname)
                 VALUES (:firstname, :lastname)";

    $statement = $pdo->prepare($query);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];         
    
    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    
    
   $sucess = $statement->execute();   

}

foreach($friends as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'] . PHP_EOL;
    echo "</br>";  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

  <form action="" method="POST">
      <h3>Add a Friend :</h3>
    <label for="firstname">firstname: </label>
    <input type="text" name="firstname" id="firstname" required>
    </br>
    </br>
    <label for="lastname">lastname: </label>
    <input type="text" name="lastname" id="lastname" required>
    </br>
    </br>
    <input type="submit" value="Submit">
 </form>
</body>
</html>

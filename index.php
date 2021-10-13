<?php
 require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();

 
if (isset($_POST['firstname'])) {
   
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']); 
    $query = 'SELECT * FROM friend WHERE  firstname=:firstname AND lastname=:lastname';
    $statement = $pdo->prepare($query);
    
    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    
    
    $statement->execute();
    
    
    $friends = $statement->fetchAll(PDO::FETCH_ASSOC);

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
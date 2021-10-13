<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

require_once 'connect.php';

$pdo = new \PDO(DSN, USER, PASS);

var_dump($_POST);
$query = "INSERT INTO story (title, content, author)
          VALUES (:title, :content, :author)";
$statement = $pdo->prepare($query);

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];

$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->bindValue(':author', $author, PDO::PARAM_STR);

$sucess = $statement->execute();

if (!$sucess ) {
    echo "error";
} else {
    echo "ok";
}       
}
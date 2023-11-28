<?php
include 'conexiune.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nume = $_POST['nume'];
    $rasa = $_POST['rasa'];
    $category = $_POST['animalCategory'];

    $sql = "insert into animale (name,rasa,category) 
            values 
                (:nume,:rasa,:category)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nume', $nume);
    $stmt->bindParam(':rasa', $rasa);
    $stmt->bindParam(':category', $category);
    $stmt->execute();

    header("Location: index.php");
}
?>

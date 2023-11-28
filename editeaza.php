<?php
include 'conexiune.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sql = "SELECT * FROM animale WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $user = $stmt->fetch();


    if (!$user) {
        header("Location: index.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nume = $_POST["nume"];
    $rasa = $_POST["rasa"];
    $category = $_POST["animalCategory"];

    $sql = "UPDATE animale SET name = :nume, rasa = :rasa,category = :category WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nume', $nume);
    $stmt->bindParam(':rasa', $rasa);
    $stmt->bindParam(':category', $category);
    $stmt->execute();

     header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Editează informatiile</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Editează informatiile animalului</h2>

        <form action="editeaza.php" method="POST" class="mb-3">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-row">
                <div class="mb-3">
                    <input type="text" class="form-control" name="nume" value="<?= $user['name']?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="rasa" value="<?= $user['rasa']?>">
                </div>
                <div class="mb-3">
                    <label for="animalCategory">Select an Animal Category:</label>
                    <select class="form-control" id="animalCategory" name="animalCategory">
                        <option value="<?=$user['category']?>" selected><?= ucfirst($user['category'])?></option>
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                        <option value="elephant">Elephant</option>
                        <option value="bird">Bird</option>
                        <option value="fish">Fish</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Actualizare</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

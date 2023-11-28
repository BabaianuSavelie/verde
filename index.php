<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Gradina ZOO</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Sistem de gestionare a animalelor</h2>

        <!-- Formular pentru adăugarea unui cartilor -->
        <form action="adauga.php" method="POST" class="mb-3">
            <div class="mb-3">
                <input type="text" class="form-control" name="nume" placeholder="Nume" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="rasa" placeholder="Rasa" required>
            </div>
            <div class="mb-3">
                <label for="animalCategory">Select an Animal Category:</label>
                <select class="form-control" id="animalCategory" name="animalCategory">
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="elephant">Elephant</option>
                    <option value="bird">Bird</option>
                    <option value="fish">Fish</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Adăugare</button>
            </div>
        </form>

        <!-- Tabel pentru afișarea animalelor -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nume</th>
                    <th>Rasa</th>
                    <th>Categorie</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'conexiune.php';
                    $sql = "SELECT * FROM animale ORDER BY name ASC";

                    $statement = $conn->query($sql);
                    $results = $statement->fetchAll();
                ?>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['rasa']?></td>
                        <td><?=ucfirst($row['category'])?></td>
                        <td>
                            <a href='editeaza.php?id=<?=$row['id']?>' class='btn btn-warning btn-sm mr-2'>Editează</a>
                            <a href='sterge.php?id=<?=$row['id']?>' class='btn btn-danger btn-sm'>Șterge</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
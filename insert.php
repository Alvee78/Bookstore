<?php
require_once 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO books (title, author, isbn, price, quantity, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $author, $isbn, $price, $quantity, $description]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Add New Book</h1>
        
        <form method="POST">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>

            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" required><br>

            <label for="isbn">ISBN:</label><br>
            <input type="text" id="isbn" name="isbn" required><br>

            <br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" required><br>

            <label for="quantity">Quantity:</label><br>
            <input type="number" id="quantity" name="quantity" required><br>

            <br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <br>

            <div class="row">
                <button type="submit" class="btn btn-danger m-2">Add Book</button>
                <a href="index.php" class="btn btn-success m-2">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
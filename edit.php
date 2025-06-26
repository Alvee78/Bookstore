<?php

require_once('db/config.php');

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $isbn = htmlspecialchars($_POST['isbn']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $description = htmlspecialchars($_POST['description']);

    $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, isbn = ?, price = ?, quantity = ?, description = ? WHERE id = ?");
    if ($stmt->execute([$title, $author, $isbn, $price, $quantity, $description, $id])) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error updating book.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Book</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="row">
                <label for="title" class="col-3 col-form-label">Title:</label>
                <div class="col-9">
                    <input type="text" id="title" name="title" required 
                        value="<?php echo htmlspecialchars($book['title']); ?>" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="author" class="col-3 col-form-label">Author:</label>
                <div class="col-9">
                    <input type="text" id="author" name="author" required
                        value="<?php echo htmlspecialchars($book['author']); ?>" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="isbn" class="col-3 col-form-label">ISBN:</label>
                <div class="col-9">
                    <input type="text" id="isbn" name="isbn" required 
                        value="<?php echo htmlspecialchars($book['isbn']); ?>" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="price" class="col-3 col-form-label">Price:</label>
                <div class="col-9">
                    <input type="number" name="price" required
                        value="<?php echo htmlspecialchars($book['price']); ?>" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="quantity" class="col-3 col-form-label">Quantity:</label>
                <div class="col-9">
                    <input type="number" name="quantity" required
                        value="<?php echo htmlspecialchars($book['quantity']); ?>" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="description" class="col-3 col-form-label">Description:</label>
                <div class="col-9">
                    <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($book['description']); ?></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-9 offset-3 mt-2" >
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
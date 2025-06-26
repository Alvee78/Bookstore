<?php
require_once 'db/config.php';

$stmt = $pdo->query("SELECT * FROM books");
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-10">
                <h1>Bookstore Management</h1>
            </div>
            <div class="col">
                <a href='insert.php' class="btn btn-success" style="margin-top: 10px;">Add New Book</a>
            </div>
        </div>
        <hr>
        <br>
        <div class="row" style="font-weight: bold; background-color:rgb(187, 190, 193); padding: 10px;">
            <div class="col">Title</div>
            <div class="col">Author</div>
            <div class="col">ISBN</div>
            <div class="col">Price</div>
            <div class="col">Quantity</div>
            <div class="col">Actions</div>
        </div>
        <?php 
            if(count($books) > 0){
                foreach($books as $row){
                    echo "
                    <div class='row' style='padding: 10px; border-bottom: 1px solid #ccc;'>
                        <div class='col'>".htmlspecialchars($row['title'])."</div>
                        <div class='col'>".htmlspecialchars($row['author'])."</div>
                        <div class='col'>".htmlspecialchars($row['isbn'])."</div>
                        <div class='col'>$".number_format($row['price'], 2)."</div>
                        <div class='col'>".$row['quantity']."</div>
                        <div class='col'>
                            <a href='edit.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
                            <a href='delete.php?delete=".$row['id']."' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this book?')\">Delete</a>
                        </div>
                    </div>
                    ";
                }
            }
        ?>
    </div>
</body>
</html>
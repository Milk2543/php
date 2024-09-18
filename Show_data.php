<?php
include 'db.php';
include 'nav.php';

// Fetch products from the database
$stmt = $pdo->query("SELECT * FROM shop");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Product List</h2>
        <a href="DB-Insert.php" class="btn btn-warning btn-sm">Add</a>
        <table id="productTable" class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Info</th>
                    <th>idshop</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['pdname']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><?php echo htmlspecialchars($product['amonut']); ?></td>
                        <td><?php echo htmlspecialchars($product['info']); ?></td>
                        <td><?php echo htmlspecialchars($product['idshop']); ?></td>
                        <td>
                            <a href="edit_product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable();
        });
    </script>
     <br> <br>
</body>
</html>
<?php
include 'foot.php';
?>
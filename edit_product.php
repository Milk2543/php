<?php
include 'db.php';
include 'nav.php';

$id = $_GET['id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['pdname'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $info = $_POST['info'];

    $stmt = $pdo->prepare("UPDATE shop SET pdname = ?, price = ?, amount = ?, info = ? WHERE id = ?");
    $stmt->execute([$name, $price, $amount, $info, $id]);

    header('Location: show_data.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM shop WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <form action="edit_product.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
            <div class="mb-3">
                <label for="pdname" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="pdname" name="pdname" value="<?php echo htmlspecialchars($product['pdname']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($product['amount']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="info" class="form-label">Info</label>
                <textarea class="form-control" id="info" name="info" rows="3"><?php echo htmlspecialchars($product['info']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
<?php
include 'foot.php';
?>
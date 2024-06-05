<?php
// Start the session to store products data
session_start();

// Initialize products array if it doesn't exist
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productPrice = number_format((float)$_POST['productPrice'], 2, '.', '');

    // Add the new product to the session
    $_SESSION['products'][] = ['name' => $productName, 'price' => $productPrice];
}

// Handle sorting
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';
$direction = isset($_GET['direction']) ? $_GET['direction'] : 'asc';

if ($sort && $direction) {
    usort($_SESSION['products'], function ($a, $b) use ($sort, $direction) {
        if ($direction == 'asc') {
            return $a[$sort] > $b[$sort] ? 1 : -1;
        } else {
            return $a[$sort] < $b[$sort] ? 1 : -1;
        }
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            cursor: pointer;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Product Management</h1>
    <form action="index.php" method="post">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>
        <br>
        <label for="productPrice">Product Price:</label>
        <input type="number" id="productPrice" name="productPrice" required step="0.01">
        <br>
        <button type="submit">Add Product</button>
    </form>
    <table>
        <thead>
            <tr>
                <th><a href="?sort=name&direction=<?php echo $direction === 'asc' ? 'desc' : 'asc'; ?>">Product Name</a></th>
                <th><a href="?sort=price&direction=<?php echo $direction === 'asc' ? 'desc' : 'asc'; ?>">Product Price</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['products'] as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

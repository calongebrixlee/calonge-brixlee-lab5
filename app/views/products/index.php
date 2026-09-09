<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        a, button { display: inline-block; padding: 8px 12px; margin: 3px; }
        table { border-collapse: collapse; width: 100%; margin-top: 18px; }
        th, td { border: 1px solid #ccc; padding: 9px; text-align: left; }
        th { background: #263746; color: white; }
    </style>
</head>
<body>
    <h1>Products</h1>
    <a href="<?= html_escape(site_url('products/create')) ?>">Add Product</a>
    <a href="<?= html_escape(site_url('logout')) ?>">Logout</a>
    <table>
        <thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Quantity</th><th>Created</th><th>Actions</th></tr></thead>
        <tbody>
        <?php if (!empty($products)): foreach ($products as $product): ?>
            <tr>
                <td><?= html_escape($product['id']) ?></td>
                <td><?= html_escape($product['product_name']) ?></td>
                <td><?= html_escape($product['description']) ?></td>
                <td><?= html_escape(number_format((float) $product['price'], 2)) ?></td>
                <td><?= html_escape($product['quantity']) ?></td>
                <td><?= html_escape($product['created_at']) ?></td>
                <td>
                    <a href="<?= html_escape(site_url('products/edit/' . $product['id'])) ?>">Edit</a>
                    <a href="<?= html_escape(site_url('products/delete/' . $product['id'])) ?>" onclick="return confirm('Delete this product?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="7">No products found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
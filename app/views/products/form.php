<?php
$product = $product ?? null;
$heading = $heading ?? 'Product';
$action = $action ?? site_url('products');
$error = $error ?? null;

$value = function ($key, $default = '') use ($product) {
    if (is_array($product)) return $product[$key] ?? $default;
    if (is_object($product)) return $product->{$key} ?? $default;
    return $default;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($heading) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 30px auto; padding: 0 20px; }
        label { display: block; margin-top: 14px; font-weight: bold; }
        input, textarea { box-sizing: border-box; width: 100%; padding: 9px; margin-top: 5px; }
        textarea { min-height: 100px; }
        button, a { display: inline-block; margin-top: 18px; padding: 9px 14px; }
        .error { color: #a00; }
    </style>
</head>
<body>
    <h1><?= html_escape($heading) ?></h1>
    <?php if (!empty($error)): ?><p class="error"><?= html_escape($error) ?></p><?php endif; ?>
    <form method="post" action="<?= html_escape($action) ?>">
        <label for="product_name">Product name</label>
        <input id="product_name" name="product_name" maxlength="100" required value="<?= html_escape($value('product_name')) ?>">
        <label for="description">Description</label>
        <textarea id="description" name="description"><?= html_escape($value('description')) ?></textarea>
        <label for="price">Price</label>
        <input id="price" name="price" type="number" min="0" step="0.01" required value="<?= html_escape($value('price', '0.00')) ?>">
        <label for="quantity">Quantity</label>
        <input id="quantity" name="quantity" type="number" min="0" step="1" required value="<?= html_escape($value('quantity', '0')) ?>">
        <button type="submit">Save</button>
        <a href="<?= html_escape(site_url('products')) ?>">Cancel</a>
    </form>
</body>
</html>
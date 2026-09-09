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
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title><?= html_escape($heading) ?></title><style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 420px; margin: 60px auto; padding: 0 20px; }
        label { display: block; margin-top: 14px; font-weight: bold; }
        input { box-sizing: border-box; width: 100%; padding: 10px; margin-top: 5px; }
        button { margin-top: 18px; padding: 10px 18px; cursor: pointer; }
        .error { color: #a00; }
    </style>
</head>
<body>
    <h1>Product Management Login</h1>
    <?php if (!empty($error)): ?><p class="error"><?= html_escape($error) ?></p><?php endif; ?>
    <form method="post" action="<?= html_escape(site_url('login')) ?>">
        <label for="username">Username</label>
        <input id="username" name="username" required>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
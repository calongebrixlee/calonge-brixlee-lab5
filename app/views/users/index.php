<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management Module</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #2c3e50; color: #fff; }
        tr:nth-child(even) { background-color: #f7f7f7; }
    </style>
</head>
<body>
    <h1>Registered Users</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <?php $id = is_array($user) ? ($user['id'] ?? '') : ($user->id ?? ''); ?>
                    <?php $firstname = is_array($user) ? ($user['firstname'] ?? '') : ($user->firstname ?? ''); ?>
                    <?php $lastname = is_array($user) ? ($user['lastname'] ?? '') : ($user->lastname ?? ''); ?>
                    <?php $email = is_array($user) ? ($user['email'] ?? '') : ($user->email ?? ''); ?>
                    <?php $username = is_array($user) ? ($user['username'] ?? '') : ($user->username ?? ''); ?>
                    <tr>
                        <td><?= html_escape($id) ?></td>
                        <td><?= html_escape($firstname) ?></td>
                        <td><?= html_escape($lastname) ?></td>
                        <td><?= html_escape($email) ?></td>
                        <td><?= html_escape($username) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

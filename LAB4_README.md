# Laboratory Exercise No. 4 — User Management Module

This is the official **LavaLust dev-v4** framework with the Laboratory
Exercise No. 4 files already added. Everything is in place — you only
need to create the database and start the server.

## What was added to the base framework

| File | Purpose |
|---|---|
| `sql/setup.sql` | Part A, B, C — creates `mydb`, the `users` table, and 5 sample rows |
| `app/config/database.php` | Part D — updated to point at `mydb` (edit credentials if needed) |
| `app/models/UsersModel.php` | Part E — model bound to the `users` table, uses `all()` |
| `app/controllers/UsersController.php` | Part F, G — loads `UsersModel`, calls `all()`, passes data to the view |
| `app/views/users/index.php` | Part H — dynamic HTML table looping over `$users` |
| `app/config/routes.php` | Part I — added `$router->get('/users', 'UsersController::index');` |

Everything else in this zip is the untouched LavaLust dev-v4 framework.

## Setup steps

1. **Create the database.** Run the SQL script against your local MySQL server:
   ```
   mysql -u root -p < sql/setup.sql
   ```
   (or paste its contents into phpMyAdmin / MySQL Workbench).

2. **Set your DB credentials.** Open `app/config/database.php` and confirm
   the `hostname`, `username`, and `password` match your local MySQL setup
   (defaults to `localhost` / `root` / no password).

3. **Run the app.** From the project root:
   ```
   php -S localhost:8000 -t public
   ```

4. **View the result.** Visit `http://localhost:8000/users` — you should see
   a table listing the 5 seeded users, pulled live from `mydb.users`.

## MVC flow

```
Browser  ->  /users route  ->  UsersController::index()
                                    |
                                    v
                          $this->UsersModel->get_all_users()
                                    |
                                    v
                              UsersModel->all()  (queries "users" table)
                                    |
                                    v
                     $data['users'] passed to users/index view
                                    |
                                    v
                     View loops through $users and renders <table>
```

## Notes for your submission screenshots

- Take the **database screenshot** after running `sql/setup.sql` (show `mydb`,
  the `users` table structure, and the 5 rows).
- For the **config screenshot**, redact the password field before submitting.
- The **model, controller, view, and route screenshots** can be taken directly
  from the files listed above.
- The **application output** screenshot should be the browser at `/users`
  showing the rendered table.

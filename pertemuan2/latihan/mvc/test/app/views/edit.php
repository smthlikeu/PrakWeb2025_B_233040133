<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <!-- Form edit user -->
        <form action="index.php?action=update" method="POST">
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']); ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']); ?>" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
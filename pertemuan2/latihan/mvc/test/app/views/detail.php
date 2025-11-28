<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Menampilkan nama pengguna dengan sanitasi HTML -->
        <h1>Detail User: <?= htmlspecialchars($user['name']); ?></h1>

        <!-- Menampilkan detail pengguna -->
        <div class="user-detail">
            <p><strong>ID:</strong> <?= $user['id']; ?></p>
            <p><strong>Nama:</strong> <?= htmlspecialchars($user['name']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone'] ?? '-'); ?></p>
        </div>

        <!-- Link untuk kembali ke halaman daftar pengguna -->
        <a href="index.php" class="btn">Kembali ke Daftar</a>
        <a href="index.php?action=edit&id=<?= $user['id']; ?>" class="btn btn-warning">Edit User</a>
    </div>
</body>
</html>
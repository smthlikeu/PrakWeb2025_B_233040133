<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Pengguna</h1>

        <!-- Pesan Sukses/Error -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <?php
                $messages = [
                    'created' => 'User berhasil ditambahkan!',
                    'updated' => 'User berhasil diupdate!',
                    'deleted' => 'User berhasil dihapus!'
                ];
                echo $messages[$_GET['success']] ?? 'Operasi berhasil!';
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                Terjadi kesalahan saat memproses data.
            </div>
        <?php endif; ?>

        <!-- Tombol Tambah User -->
        <a href="index.php?action=create" class="btn btn-primary">Tambah User Baru</a>

        <!-- Tabel untuk menampilkan daftar semua pengguna -->
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop untuk menampilkan setiap pengguna -->
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['phone'] ?? '-'); ?></td>
                    <td>
                        <a href="index.php?id=<?= $user['id']; ?>" class="btn-small btn-info">Detail</a>
                        <a href="index.php?action=edit&id=<?= $user['id']; ?>" class="btn-small btn-warning">Edit</a>
                        <a href="index.php?action=delete&id=<?= $user['id']; ?>" class="btn-small btn-danger" 
                           onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
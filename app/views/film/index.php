<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Film</title>
</head>
<body>
    <h2>Daftar Film</h2>
    <a href="index.php?page=film&action=create">Tambah Data</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tahun Rilis</th>
            <th>Sutradara</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($films as $f): ?>
        <tr>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars($f['tahun_rilis']) ?></td>
            <td><?= htmlspecialchars($f['sutradara']) ?></td>
            <td><?= htmlspecialchars($f['durasi']) ?></td>
            <td>
                <a href="index.php?page=film&action=edit&judul=<?= urlencode($f['judul']) ?>">Edit</a>

                <form method="post" 
                      action="index.php?page=film&action=delete" 
                      style="display:inline"
                      onsubmit="return confirm('Hapus data film ini?')">
                    <input type="hidden" name="judul" value="<?= htmlspecialchars($f['judul']) ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
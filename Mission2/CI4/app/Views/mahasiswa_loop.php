<!DOCTYPE html>
<html>
<head><title>Tabel Mahasiswa (Database)</title></head>
<body>
<h2>Tabel Mahasiswa dari Database</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>No</th><th>NIM</th><th>Nama</th><th>Umur</th>
    </tr>
    <?php $no=1; foreach ($mahasiswa as $m): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= esc($m['nim']); ?></td>
        <td><?= esc($m['nama']); ?></td>
        <td><?= esc($m['umur']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

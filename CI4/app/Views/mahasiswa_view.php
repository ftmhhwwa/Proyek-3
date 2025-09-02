<h2>Data Mahasiswa</h2>
<table border="1">
    <tr><th>No</th><th>Nama</th></tr>
    <?php foreach($mahasiswa as $i => $mhs): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= $mhs ?></td>
        </tr>
    <?php endforeach; ?>
</table>

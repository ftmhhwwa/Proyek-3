<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Manajemen Mahasiswa</h3>
    <a href="/admin/students/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['nim'] ?></td>
                <td><?= $student['full_name'] ?></td>
                <td><?= $student['entry_year'] ?></td>
                <td>
                    <a href="/admin/students/view/<?= $student['student_id'] ?>" class="btn btn-info">View</a>
                    <a href="/admin/students/edit/<?= $student['student_id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/admin/students/delete/<?= $student['student_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
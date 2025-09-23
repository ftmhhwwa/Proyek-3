<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Manajemen Mahasiswa</h3>

     <?php if (session()->getFlashdata('success')): ?>
        <div id="notification" class="notification-box success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

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
                    <a href="/admin/students/view/<?= $student['student_id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="/admin/students/edit/<?= $student['student_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/students/delete/<?= $student['student_id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
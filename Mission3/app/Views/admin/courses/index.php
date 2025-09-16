<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Manajemen Mata Kuliah</h3>
    <a href="/admin/courses/create" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course['course_id'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['credits'] ?></td>
                <td>
                    <a href="/admin/courses/view/<?= $course['course_id'] ?>" class="btn btn-info">View</a>
                    <a href="/admin/courses/edit/<?= $course['course_id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/admin/courses/delete/<?= $course['course_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
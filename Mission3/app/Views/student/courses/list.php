<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Daftar Mata Kuliah</h3>
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
                    <a href="/student/courses/enroll/<?= $course['course_id'] ?>" class="btn btn-primary">Ambil</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
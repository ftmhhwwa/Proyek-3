<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Detail Mata Kuliah</h3>
    <br>
    <ul>
        <li><b>ID Mata Kuliah:</b> <?= $course['course_id'] ?></li>
        <li><b>Nama Mata Kuliah:</b> <?= $course['course_name'] ?></li>
        <li><b>SKS:</b> <?= $course['credits'] ?></li>
    </ul>
    <br>
    <a href="/admin/courses" class="btn btn-secondary">Kembali ke Daftar</a>
<?= $this->endSection() ?>
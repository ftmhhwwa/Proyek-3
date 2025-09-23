<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Detail Mahasiswa</h3>
    <br>
    <ul>
        <li><b>ID Mahasiswa:</b> <?= $student['student_id'] ?></li>
        <li><b>Nama Lengkap:</b> <?= $student['full_name'] ?></li>
        <li><b>Tahun Masuk:</b> <?= $student['entry_year'] ?></li>
    </ul>
    <br>
    <a href="/student/courses/enrolled" class="btn btn-secondary">Kembali
<?= $this->endSection() ?>
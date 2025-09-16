<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Edit Mahasiswa</h3>
    <form action="/admin/students/update/<?= $student['student_id'] ?>" method="post">
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" class="form-control" value="<?= $student['nim'] ?>" required readonly>
        </div>
        
        <div class="form-group">
            <label for="full_name">Nama Lengkap:</label>
            <input type="text" id="full_name" name="full_name" class="form-control" value="<?= $student['full_name'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="entry_year">Tahun Masuk:</label>
            <input type="number" id="entry_year" name="entry_year" class="form-control" value="<?= $student['entry_year'] ?>" required>
        </div>
        
        <button type="submit" class="btn btn-success">Perbarui Mahasiswa</button>
        <a href="/admin/students" class="btn btn-secondary">Kembali</a>
    </form>
<?= $this->endSection() ?>
<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Tambah Mata Kuliah Baru</h3>
    <form action="/admin/courses/store" method="post">
        <div class="form-group">
            <label for="course_name">Nama Mata Kuliah:</label>
            <input type="text" id="course_name" name="course_name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="credits">SKS:</label>
            <input type="number" id="credits" name="credits" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan Mata Kuliah</button>
        <a href="/admin/courses" class="btn btn-secondary">Kembali</a>
    </form>
<?= $this->endSection() ?>
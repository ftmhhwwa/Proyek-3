<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Tambah Mahasiswa Baru</h3>
    <form id="create-student-form" action="/admin/students/store" method="post">
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" class="form-control">
            <div class="error-message" id="error-nim"></div>
        </div>
        
        <div class="form-group">
            <label for="full_name">Nama Lengkap:</label>
            <input type="text" id="full_name" name="full_name" class="form-control">
            <div class="error-message" id="error-full_name"></div>
        </div>
        
        <div class="form-group">
            <label for="entry_year">Tahun Masuk:</label>
            <input type="number" id="entry_year" name="entry_year" class="form-control">
            <div class="error-message" id="error-entry_year"></div>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan Mahasiswa</button>
        <a href="/admin/students" class="btn btn-secondary">Kembali</a>
    </form>
<?= $this->endSection() ?>
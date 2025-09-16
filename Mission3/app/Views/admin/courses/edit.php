<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Edit Mata Kuliah</h3>
    <form action="/admin/courses/update/<?= $course['course_id'] ?>" method="post">
        <div class="form-group">
            <label for="course_name">Nama Mata Kuliah:</label>
            <input type="text" id="course_name" name="course_name" class="form-control" value="<?= $course['course_name'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="credits">SKS:</label>
            <input type="number" id="credits" name="credits" class="form-control" value="<?= $course['credits'] ?>" required>
        </div>
        
        <button type="submit" class="btn btn-success">Perbarui Mata Kuliah</button>
        <a href="/admin/courses" class="btn btn-secondary">Kembali</a>
    </form>
<?= $this->endSection() ?>
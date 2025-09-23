<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3 class="my-4">Daftar Mata Kuliah</h3>    
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course['course_id'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['credits'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <h4 class="my-4">Ambil Mata Kuliah</h4>
    
    <form id="enrollment-form" action="/student/courses/enroll" method="post">
        <div id="course-list-container">
            </div>
        
                

        <div class="mt-4">
            <h5>Total SKS yang Dipilih: <span id="total-credits">0</span></h5>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Ambil Mata Kuliah</button>
    </form>
<?= $this->endSection() ?>
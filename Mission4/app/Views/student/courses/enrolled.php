<?= $this->extend('templates/template_02') ?>

<?= $this->section('content') ?>
    <h3>Mata Kuliah yang Diambil</h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Tanggal Ambil</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($enrolledCourses)): ?>
                <?php foreach ($enrolledCourses as $course): ?>
                <tr>
                    <td><?= $course['course_name'] ?></td>
                    <td><?= $course['credits'] ?></td>
                    <td><?= $course['enroll_date'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total SKS:</strong> <?= array_sum(array_column($enrolledCourses, 'credits')) ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3">Anda belum mengambil mata kuliah apa pun.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <a href="/student/courses" class="btn btn-secondary">Kembali ke Daftar Mata Kuliah</a>
<?= $this->endSection() ?>
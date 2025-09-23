<?php
// Ambil objek URI untuk memeriksa URL
$uri = service('uri');
$firstSegment = $uri->getSegment(1);
$secondSegment = $uri->getSegment(2);
$isLoggedIn = session()->get('isLoggedIn');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Akademik Sederhana</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h2>SISTEM AKADEMIK SEDERHANA</h2>
    </div>

    <div class="menu">
        <?php if ($isLoggedIn) : ?>
            <a href="/dashboard" class="<?= empty($firstSegment) || $firstSegment === 'dashboard' ? 'active' : '' ?>">Dashboard</a>
            
            <?php if (session()->get('role') === 'Admin') : ?>
                <a href="/admin/students" class="<?= $firstSegment === 'admin' && $secondSegment === 'students' ? 'active' : '' ?>">Manajemen Mahasiswa</a>
                <a href="/admin/courses" class="<?= $firstSegment === 'admin' && $secondSegment === 'courses' ? 'active' : '' ?>">Manajemen Mata Kuliah</a>
            <?php endif; ?>
            
            <?php if (session()->get('role') === 'Mahasiswa') : ?>
                <a href="/student/courses" class="<?= $firstSegment === 'student' && $secondSegment === 'courses' ? 'active' : '' ?>">Daftar Mata Kuliah</a>
                <a href="/student/enrolled-courses" class="<?= $firstSegment === 'student' && $secondSegment === 'enrolled-courses' ? 'active' : '' ?>">Mata Kuliah Diambil</a>
            <?php endif; ?>
            
            <a href="/logout">Logout</a>
        <?php else : ?>
            <a href="/login" class="<?= $firstSegment === 'login' || empty($firstSegment) ? 'active' : '' ?>">Halaman Login</a>
        <?php endif; ?>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="footer">
        <b>D3 - Teknik Informatika, Politeknik Negeri Bandung.</b>
    </div>
</div>

<script src="/js/script.js"></script>
</body>
</html>

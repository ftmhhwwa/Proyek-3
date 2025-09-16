<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
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
        <a href="/dashboard">Dashboard</a>

        <?php if (session()->get('role') === 'Admin') : ?>
            <a href="/admin/students">Manajemen Mahasiswa</a>
            <a href="/admin/courses">Manajemen Mata Kuliah</a>
        <?php endif; ?>

        <?php if (session()->get('role') === 'Mahasiswa') : ?>
            <a href="/student/courses">Daftar Mata Kuliah</a>
            <a href="/student/enrolled-courses">Mata Kuliah Diambil</a>
        <?php endif; ?>
        
        <a href="/logout">Logout</a>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="footer">
        <b>D3 - Teknik Informatika, Politeknik Negeri Bandung.</b>
    </div>
</div>
</body>
</html>
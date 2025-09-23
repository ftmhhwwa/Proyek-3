<nav>
    <ul>
        <li><a href="/dashboard">Dashboard</a></li>

        <?php if (session()->get('role') === 'Admin') : ?>
            <li><a href="/admin/students">Manajemen Mahasiswa</a></li>
            <li><a href="/admin/courses">Manajemen Mata Kuliah</a></li>
        <?php endif; ?>

        <?php if (session()->get('role') === 'Mahasiswa') : ?>
            <li><a href="/student/courses">Daftar Mata Kuliah</a></li>
        <?php endif; ?>

        <li><a href="/logout">Logout</a></li>
    </ul>
</nav>
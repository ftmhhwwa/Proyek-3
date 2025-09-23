// Deklarasi variabel global
let students = [];
let courses = [];
let enrolledCourses = [];

// --- Fungsionalitas Navigasi Aktif ---
const navLinks = document.querySelectorAll('.menu a');
navLinks.forEach(link => {
    link.addEventListener('click', function() {
        navLinks.forEach(item => item.classList.remove('active'));
        this.classList.add('active');
    });
});

// --- Fungsionalitas API (untuk mengambil data dari server) ---

// Mengambil semua data yang dibutuhkan secara asinkron
function fetchDataOnLoad() {
    // Jalankan hanya jika berada di halaman yang memiliki elemen spesifik
    const courseListContainer = document.getElementById('course-list-container');
    if (courseListContainer) {
        Promise.all([
            fetch('/api/courses').then(response => response.json()),
            fetch('/api/enrolled-courses').then(response => response.json())
        ])
        .then(([availableCourses, takenCourses]) => {
            courses = availableCourses;
            enrolledCourses = takenCourses;
            console.log('Courses tersedia:', courses.length);
            console.log('Courses yang sudah diambil:', enrolledCourses.length);
            renderCourseCheckboxes();
        })
        .catch(error => console.error('Error fetching courses and enrolled courses:', error));
    }

    fetch('/api/courses')
        .then(response => response.json())
        .then(data => {
            courses = data;
            console.log('Data courses dari database:', courses);
        })
        .catch(error => console.error('Error fetching courses:', error));

    
    // Fetch data students
    fetch('/api/students')
        .then(response => response.json())
        .then(data => {
            students = data;
            console.log('Data students dari database:', students);
        })
        .catch(error => console.error('Error fetching students:', error));
}


// --- Fungsionalitas Daftar Mata Kuliah dengan Checklist ---
// Elemen-elemen DOM
const totalCreditsElement = document.getElementById('total-credits');
const courseListContainer = document.getElementById('course-list-container');


// Fungsi untuk me-render daftar mata kuliah dengan checkbox
function renderCourseCheckboxes() {
    if (!courseListContainer) return;

    if (enrolledCourses.length === courses.length) {
        courseListContainer.innerHTML = '<h4>Semua mata kuliah sudah Anda ambil.</h4>';
        return;
    }

    courseListContainer.innerHTML = '';
    const enrolledCourseIds = enrolledCourses.map(c => c.course_id);
    
    courses.forEach(course => {
        if (!enrolledCourseIds.includes(course.course_id)) {
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'selected_courses[]';
            checkbox.value = course.course_id;
            checkbox.dataset.credits = course.credits;

            const label = document.createElement('label');
            label.textContent = `${course.course_name} (${course.credits} SKS)`;
            label.prepend(checkbox);

            const div = document.createElement('div');
            div.appendChild(label);
            courseListContainer.appendChild(div);
        }
    });
}

// Fungsi untuk menghitung total SKS
function calculateTotalCredits() {
    if (!totalCreditsElement) return;

    let totalCredits = 0;
    const checkboxes = document.querySelectorAll('#course-list-container input[type="checkbox"]:checked');
    checkboxes.forEach(checkbox => {
        totalCredits += parseInt(checkbox.dataset.credits);
    });
    totalCreditsElement.textContent = totalCredits;
}

// Tambahkan event listener untuk menghitung SKS saat checkbox diubah
if (courseListContainer) {
    courseListContainer.addEventListener('change', calculateTotalCredits);
}

// --- Fungsionalitas Konfirmasi Delete ---
const deleteButtons = document.querySelectorAll('.action-delete');
deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const deleteUrl = this.href;
        const isConfirmed = confirm('Yakin ingin menghapus data ini?');
        if (isConfirmed) {
            window.location.href = deleteUrl;
        }
    });
});

// --- Fungsionalitas Validasi Form ---
const createStudentForm = document.getElementById('create-student-form');
if (createStudentForm) {
    createStudentForm.addEventListener('submit', function(event) {
        let isValid = true;
        const inputs = this.querySelectorAll('.form-control');
        inputs.forEach(input => {
            const errorElement = document.getElementById(`error-${input.id}`);
            if (input.value.trim() === '') {
                isValid = false;
                input.classList.add('is-invalid');
                if (errorElement) {
                    errorElement.textContent = 'Field ini tidak boleh kosong.';
                }
            } else {
                input.classList.remove('is-invalid');
                if (errorElement) {
                    errorElement.textContent = '';
                }
            }
        });
        if (!isValid) {
            event.preventDefault();
        }
    });
}

const createCourseForm = document.getElementById('create-course-form');
if (createCourseForm) {
    createCourseForm.addEventListener('submit', function(event) {
        let isValid = true;
        const inputs = this.querySelectorAll('.form-control');
        inputs.forEach(input => {
            const errorElement = document.getElementById(`error-${input.id}`);
            if (input.value.trim() === '') {
                isValid = false;
                input.classList.add('is-invalid');
                if (errorElement) {
                    errorElement.textContent = 'Field ini tidak boleh kosong.';
                }
            } else {
                input.classList.remove('is-invalid');
                if (errorElement) {
                    errorElement.textContent = '';
                }
            }
        });
        if (!isValid) {
            event.preventDefault();
        }
    });
}


// --- Fungsionalitas Notifikasi Otomatis ---
const notification = document.getElementById('notification');
if (notification) {
    setTimeout(() => {
        notification.classList.add('hidden');
    }, 3000);
}

// --- Contoh Async (Timeout) ---
console.log('1. Kode ini berjalan secara sinkron.');
setTimeout(function() {
    console.log('2. Kode ini berjalan secara asinkron dan akan dieksekusi setelah 3 detik.');
}, 3000); 
console.log('3. Kode ini berjalan secara sinkron, tanpa menunggu kode asinkron di atas.');


// Panggil fungsi utama saat script dimuat
fetchDataOnLoad();
console.log('Script berhasil dimuat!');
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\EnrollmentModel; // Asumsi ada model baru untuk tabel 'takes'
use App\Models\StudentModel;

class Student extends BaseController
{
    protected $courseModel;
    protected $enrollmentModel;
    protected $studentModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->enrollmentModel = new EnrollmentModel();
        $this->studentModel = new StudentModel();
    }

    // Mahasiswa bisa melihat daftar mata kuliah
    public function viewCourses()
    {
        $data['courses'] = $this->courseModel->findAll();
        return view('student/courses/list', $data);
    }

    // Mahasiswa bisa mengambil mata kuliah (enroll)
    public function enrollCourse($courseId)
    {
        $userId = session()->get('user_id'); // Ambil ID pengguna dari session
        
        $student = $this->studentModel->where('user_id', $userId)->first();
        if (!$student) {
            // Jika tidak ada data mahasiswa, arahkan kembali
            session()->setFlashdata('error', 'Data mahasiswa tidak ditemukan.');
            return redirect()->to('/dashboard');
        }
        $studentId = $student['student_id'];

        $existingEnrollment = $this->enrollmentModel
                                   ->where('std_takes', $studentId)
                                   ->where('crs_taken', $courseId)
                                   ->first();

        if ($existingEnrollment) {
            // Jika sudah terdaftar, beri pesan error dan arahkan kembali
            session()->setFlashdata('error', 'Anda sudah mengambil mata kuliah ini.');
            return redirect()->to('/student/courses');
        }

        $this->enrollmentModel->save([
            'std_takes'  => $studentId,
            'crs_taken'  => $courseId,
            'enroll_date' => date('Y-m-d')
        ]);
        
        session()->setFlashdata('success', 'Berhasil mengambil mata kuliah!');
        return redirect()->to('/student/enrolled-courses');
    }

    // Mahasiswa bisa melihat mata kuliah yang diambil
    public function viewEnrolledCourses()
    {
        $userId = session()->get('user_id'); // Ambil ID pengguna dari session
        
        $data['enrolledCourses'] = $this->enrollmentModel->getEnrolledCourses($userId);
        return view('student/courses/enrolled', $data);
    }
}
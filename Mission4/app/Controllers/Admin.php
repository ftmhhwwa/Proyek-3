<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\StudentModel;
use App\Models\EnrollmentModel; 

class Admin extends BaseController
{
    protected $courseModel;
    protected $studentModel;
    protected $enrollmentModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->studentModel = new StudentModel();
        $this->enrollmentModel = new EnrollmentModel();
    }

    // --- Manajemen Courses (Hanya untuk Admin) ---
    public function manageCourses()
    {
        $data['courses'] = $this->courseModel->findAll();
        return view('admin/courses/index', $data);
    }


    // Menampilkan form tambah
    public function createCourse()
    {
        return view('admin/courses/create');
    }

    // Menyimpan data baru
    public function storeCourse()
    {
        $this->courseModel->save([
            'course_name' => $this->request->getVar('course_name'),
            'credits'     => $this->request->getVar('credits')
        ]);

        session()->setFlashdata('success', 'Data mata kuliah berhasil disimpan.');
        
        return redirect()->to('/admin/courses');
    }

    // Menampilkan detail course
    public function viewCourse($id)
    {
        $data['course'] = $this->courseModel->find($id);
        return view('admin/courses/view', $data);
    }
    // Menampilkan form edit
    public function editCourse($id)
    {
        $data['course'] = $this->courseModel->find($id);

        session()->setFlashdata('success', 'Data mata kuliah berhasil disimpan.');

        return view('admin/courses/edit', $data);
    }

    // Mengupdate data
    public function updateCourse($id)
    {
        $this->courseModel->update($id, [
            'course_name' => $this->request->getVar('course_name'),
            'credits'     => $this->request->getVar('credits')
        ]);

        session()->setFlashdata('success', 'Data mata kuliah berhasil disimpan.');

        return redirect()->to('/admin/courses');
    }

    // Menghapus data
    public function deleteCourse($id)
    {
        $this->enrollmentModel->where('crs_taken', $id)->delete();
        $this->courseModel->delete($id);

        session()->setFlashdata('success', 'Data mata kuliah berhasil dihapus.');

        return redirect()->to('/admin/courses');
    }

    // --- Manajemen Students (Hanya untuk Admin) ---
    public function manageStudents()
    {
        $data['students'] = $this->studentModel->findAll();
        return view('admin/students/index', $data);
    }

    public function createStudent()
    {
        return view('admin/students/create');
    }

    public function storeStudent()
    {
        $userId = $this->request->getVar('user_id');

        $this->studentModel->save([
            'nim'       => $this->request->getVar('nim'),
            'full_name' => $this->request->getVar('full_name'),
            'entry_year'=> $this->request->getVar('entry_year'),
            'user_id'   => $userId
        ]);

    // Simpan pesan berhasil ke dalam sesi
    session()->setFlashdata('success', 'Data mahasiswa berhasil disimpan.');

    // Arahkan kembali ke halaman daftar mahasiswa
    return redirect()->to('/admin/students');
    }

    public function viewStudent($id)
    {
        $data['student'] = $this->studentModel->find($id);
        return view('admin/students/view', $data);
    }

    public function editStudent($id)
    {
        $data['student'] = $this->studentModel->find($id);
        session()->setFlashdata('success', 'Data mahasiswa berhasil disimpan.');
        return view('admin/students/edit', $data);
    }
    public function updateStudent($id)
    {
        $this->studentModel->update($id, [
            'nim'       => $this->request->getVar('nim'),
            'full_name' => $this->request->getVar('full_name'),
            'entry_year'=> $this->request->getVar('entry_year')
        ]);
        session()->setFlashdata('success', 'Data mahasiswa berhasil disimpan.');
        return redirect()->to('/admin/students');
    }

    public function deleteStudent($id)
    {
        $this->enrollmentModel->where('std_takes', $id)->delete();

        $this->studentModel->delete($id);
        session()->setFlashdata('success', 'Data mahasiswa berhasil dihapus.');
        return redirect()->to('/admin/students');
    }
}
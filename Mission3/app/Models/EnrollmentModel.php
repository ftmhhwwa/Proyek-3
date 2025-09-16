<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table      = 'takes';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['std_takes', 'crs_taken', 'enroll_date'];

public function getEnrolledCourses($userId)
    {
        return $this->select('courses.course_name, courses.credits, takes.enroll_date')
                    ->join('students', 'students.student_id = takes.std_takes')
                    ->join('courses', 'courses.course_id = takes.crs_taken')
                    ->where('students.user_id', $userId)
                    ->findAll();
    }
}
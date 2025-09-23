<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class Courses extends BaseController
{
    public function getCoursesData()
    {
        $model = new CourseModel();
        $courses = $model->findAll();

        // Mengubah array PHP menjadi format JSON
        return $this->response->setJSON($courses);
    }
}
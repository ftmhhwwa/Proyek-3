<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rute publik yang tidak membutuhkan login
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::auth');
$routes->get('api/courses', 'Courses::getCoursesData');
$routes->get('api/students', 'Student::getStudentsData');
$routes->get('api/enrolled-courses', 'Student::getEnrolledCoursesData');

// Rute yang hanya bisa diakses setelah login
$routes->group('/', ['filter' => 'auth'], function($routes){
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('logout', 'Login::logout'); 

    // Rute khusus untuk Admin
    $routes->group('admin', ['filter' => 'role:Admin'], function($routes){
        $routes->get('courses', 'Admin::manageCourses');
        $routes->get('courses/create', 'Admin::createCourse');
        $routes->post('courses/store', 'Admin::storeCourse');
        $routes->get('courses/view/(:num)', 'Admin::viewCourse/$1');
        $routes->get('courses/edit/(:num)', 'Admin::editCourse/$1');
        $routes->post('courses/update/(:num)', 'Admin::updateCourse/$1');
        $routes->get('courses/delete/(:num)', 'Admin::deleteCourse/$1');

        $routes->get('students', 'Admin::manageStudents');
        $routes->get('students/create', 'Admin::createStudent');
        $routes->post('students/store', 'Admin::storeStudent');
        $routes->get('students/view/(:num)', 'Admin::viewStudent/$1');
        $routes->get('students/edit/(:num)', 'Admin::editStudent/$1');
        $routes->post('students/update/(:num)', 'Admin::updateStudent/$1');
        $routes->get('students/delete/(:num)', 'Admin::deleteStudent/$1');
    });

    // Rute khusus untuk Mahasiswa
    $routes->group('student', ['filter' => 'role:Mahasiswa'], function($routes){
        $routes->get('courses', 'Student::viewCourses');
        $routes->post('courses/enroll', 'Student::enrollCourse');
        $routes->get('enrolled-courses', 'Student::viewEnrolledCourses');
    });
    
});
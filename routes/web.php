<?php

use App\Models\Major;
use App\Models\Post;
use App\Models\School;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    dump('Bagaimana caranya mendapatkan data berikut: Sekolah X pernah terdaftar PKL pada Tahun/Angkatan berapa saja');

    $data = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->select('schools.name as school_name', 'batches.year as batch_year')
        ->where('schools.name', 'SMKN 10 Tarakan')
        ->get();
    
    dump($data);
    

    dump('Bagaimana caranya mendapatkan data berikut: Pada Tahun/Angkatan 2024, Sekolah mana saja yang mendaftar PKL?');

    $data = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->select('schools.name as school_name', 'batches.year as batch_year')
        ->where('batches.year', '2024')
        ->get();

    dump($data);


    dump('Bagaimana caranya mendapatkan data berikut: Jurusan apa saja yang terdaftar PKL dari Sekolah X pada Tahun/Angkatan 2024?');

    $data = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->join('batch_school_majors', 'batch_school_id', '=', 'batch_school_majors.batch_school_id')
        ->join('majors', 'batch_school_majors.major_id', '=', 'majors.id')
        ->select('majors.code as major_code')
        ->where('schools.name', 'SMK 2 Sawahlunto')
        ->where('batches.year', '1973')
        ->get();

    dump($data);

    dump('Bagaimana caranya mendapatkan data berikut: Sekolah mana saja yang terdaftar PKL pada Tahun/Angkatan 2024 dan memiliki Jurusan PPLG?');

    $data = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->join('batch_school_majors', 'batch_school_id', '=', 'batch_school_majors.batch_school_id')
        ->join('majors', 'batch_school_majors.major_id', '=', 'majors.id')
        ->select('schools.name as school_name')
        ->where('batches.year', '1973')
        ->where('majors.code', 'WST')
        ->get();

    dump($data);


        // return view('welcome',['title' =>'home page']);
});

Route::get('/calendar', function () {
    return view('calendar',['title' =>'calendar']);
});
Route::get('/posts', function () {
    return view('posts',['title' =>'team', 'posts'=> School::all()]);
});
Route::get('/posts/{post:name}', function(School $post) {

    // $post = Post::find($id);
    return view('post', ['title' => 'Single Post','post' => $post]);
});

Route::get('/projects', function () {
    return view('projects',['title' =>'projects', 'projects'=> Major::all()]);
});

Route::get('/reports', function () {
    return view('reports',['title' =>'reports']);
});
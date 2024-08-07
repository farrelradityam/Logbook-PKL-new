<?php

use App\Models\Major;
use App\Models\Post;
use App\Models\School;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    dump('Bagaimana caranya mendapatkan data berikut: Sekolah X pernah terdaftar PKL pada Tahun/Angkatan berapa saja');
    dump('Bagaimana caranya mendapatkan data berikut: Pada Tahun/Angkatan 2024, Sekolah mana saja yang mendaftar PKL?');
    dump('Bagaimana caranya mendapatkan data berikut: Jurusan apa saja yang terdaftar PKL dari Sekolah X pada Tahun/Angkatan 2024?');
    dump('Bagaimana caranya mendapatkan data berikut: Sekolah mana saja yang terdaftar PKL pada Tahun/Angkatan 2024 dan memiliki Jurusan PPLG?');
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
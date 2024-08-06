<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home',['title' =>'home page']);
});
Route::get('/calendar', function () {
    return view('calendar',['title' =>'calendar']);
});
Route::get('/posts', function () {
    return view('posts',['title' =>'team', 'posts'=> Post::all()]);
});
Route::get('/posts/{post:name}', function(Post $post) {

    // $post = Post::find($id);
    return view('post', ['title' => 'Single Post','post' => $post]);
});

Route::get('/projects', function () {
    return view('projects',['title' =>'projects']);
});
Route::get('/reports', function () {
    return view('reports',['title' =>'reports']);
});
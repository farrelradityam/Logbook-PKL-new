<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',['title' =>'home page']);
});
Route::get('/posts', function () {
    return view('posts',['title' =>'team', 'posts'=>[
        [
            'id' => 1,
            'title' => 'judul artikel 1',
            'author' => 'Farrel Raditya m',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod sequi. 
            Aspernatur natus quaerat suscipit sed nam pariatur saepe optio minima modi repellat possimus, 
            porro laudantium illo a exercitationem velit?',
        ],
        [
            'id' => 1,
            'title' => 'judul artikel 2',
            'author' => 'Farrel Raditya m',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet consectetur non blanditiis, 
            reprehenderit accusamus fuga quo repellendus! Id repellat autem, dolore dignissimos quo animi architecto? Quasi, accusantium veniam. 
            Inventore, iste.',
        ],
    ]]);
});
Route::get('/posts/{slug}', function($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'judul artikel 1',
            'author' => 'Farrel Raditya m',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod sequi. 
            Aspernatur natus quaerat suscipit sed nam pariatur saepe optio minima modi repellat possimus, 
            porro laudantium illo a exercitationem velit?',
        ],
        [
            'id' => 1,
            'slug' => 'judul-artikel-2',
            'title' => 'judul artikel 2',
            'author' => 'Farrel Raditya m',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet consectetur non blanditiis, 
            reprehenderit accusamus fuga quo repellendus! Id repellat autem, dolore dignissimos quo animi architecto? Quasi, accusantium veniam. 
            Inventore, iste.',
        ],
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post','post' => $post]);
});

Route::get('/calendar', function () {
    return view('calendar',['title' =>'calendar']);
});
Route::get('/projects', function () {
    return view('projects',['title' =>'projects']);
});
Route::get('/reports', function () {
    return view('reports',['title' =>'reports']);
});
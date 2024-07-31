<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',['title' =>'home page', 'posts'=> [
        [
            'title' => 'judul artikel 1',
            'author' => 'Farrel Raditya m',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod sequi. 
            Aspernatur natus quaerat suscipit sed nam pariatur saepe optio minima modi repellat possimus, 
            porro laudantium illo a exercitationem velit?',
        ],
        [
            'title' => 'judul artikel 2',
            'author' => 'Farrel Raditya m',
            'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet consectetur non blanditiis, 
            reprehenderit accusamus fuga quo repellendus! Id repellat autem, dolore dignissimos quo animi architecto? Quasi, accusantium veniam. 
            Inventore, iste.',
        ],
    ]]);
});
Route::get('/team', function () {
    return view('team',['title' =>'team']);
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
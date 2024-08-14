<?php

use App\Models\Batch;
use App\Models\Major;
use App\Models\Post;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    dump('Bagaimana caranya mendapatkan data berikut: Sekolah X pernah terdaftar PKL pada Tahun/Angkatan berapa saja');

    $data1 = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->select('schools.name as school_name', 'batches.year as batch_year')
        ->where('schools.name', 'SMKN 7 Pariaman')
        ->get();
    
    dump($data1);

    dump('Bagaimana caranya mendapatkan data berikut: Pada Tahun/Angkatan 2024, Sekolah mana saja yang mendaftar PKL?');

    $data2 = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->select('schools.name as school_name', 'batches.year as batch_year')
        ->where('batches.year', '2024')
        ->get();

    dump($data2);

    dump('Bagaimana caranya mendapatkan data berikut: Jurusan apa saja yang terdaftar PKL dari Sekolah X pada Tahun/Angkatan 2024?');

    $data3 = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->join('batch_school_majors', 'batch_school_id', '=', 'batch_school_majors.batch_school_id')
        ->join('majors', 'batch_school_majors.major_id', '=', 'majors.id')
        ->select('majors.code as major_code')
        ->where('schools.name', 'SMKN 7 Pariaman')
        ->where('batches.year', '2024')
        ->get();

    dump($data3);

    dump('Bagaimana caranya mendapatkan data berikut: Sekolah mana saja yang terdaftar PKL pada Tahun/Angkatan 2024 dan memiliki Jurusan PPLG?');

    $data4 = DB::table('schools')
        ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
        ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
        ->join('batch_school_majors', 'batch_school_id', '=', 'batch_school_majors.batch_school_id')
        ->join('majors', 'batch_school_majors.major_id', '=', 'majors.id')
        ->select('schools.name as school_name')
        ->where('batches.year', '1983')
        ->where('majors.code', 'SSP')
        ->get();

    dump($data4);

        // return view('welcome',['title' =>'home page']);
});

Route::get('/a', function () {

    dump('data 1 user pertama');
    $soal1 = User::find(1)->toArray();

    dump($soal1);

    dump('data seluruh user');
    $soal2 = User::all()->toArray();

    dump($soal2);

    dump('seluruh data user dengan id > 5 (nomor id 6, 7, 8, dst)');
    dump('4. data 10 user pertama dengan id > 5');
    dump('5. data 10 user pertama dengan id > 5, diurutkan berdasarkan abjad nama/emailnya (A ke Z)');
    dump('6. data 10 user pertama dengan id > 5, diurutkan berdasarkan tgl created_at (baru ke lama)');
    dump('7. data user pertama dengan id > 5');
    dump('8. data user dengan id "5"');
    dump('9. data user dengan id "5", namun hanya di select nama dan email nya');
    dump('10. data user dengan kolom nama/email berawalan dengan huruf "A"');
    dump('11. data user dengan kolom nama/email berawalan dengan huruf "A" DAN memiliki id > 5');
    dump('12. data user dengan kolom nama/email berawalan dengan huruf "A" ATAU mengandung kata "admin"');
});







// Route::get('/calendar', function () {
//     return view('calendar',['title' =>'calendar']);
// });
// Route::get('/posts', function () {
//     return view('posts',['title' =>'team', 'posts'=> School::all()]);
// });
// Route::get('/posts/{post:name}', function(School $post) {

//     // $post = Post::find($id);
//     return view('post', ['title' => 'Single Post','post' => $post]);
// });

// Route::get('/projects', function () {
//     return view('projects',['title' =>'projects', 'projects'=> Major::all()]);
// });

// Route::get('/reports', function () {
//     return view('reports',['title' =>'reports']);
// });
<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Models\Activity;
use App\Models\Batch;
use App\Models\BatchSchool;
use App\Models\BatchSchoolMajor;
use App\Models\Major;
use App\Models\Mentor;
use App\Models\Post;
use App\Models\ScheduleOfActivity;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {

//     // dump('Bagaimana caranya mendapatkan data berikut: Sekolah X pernah terdaftar PKL pada Tahun/Angkatan berapa saja');

//     // $data1 = DB::table('schools')
//     //     ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
//     //     ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
//     //     ->select('schools.name as school_name', 'batches.year as batch_year')
//     //     ->where('schools.name', 'SMKN 7 Pariaman')
//     //     ->get();
    
//     // dump($data1);

//     // dump('Bagaimana caranya mendapatkan data berikut: Pada Tahun/Angkatan 2024, Sekolah mana saja yang mendaftar PKL?');

//     // $data2 = DB::table('schools')
//     //     ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
//     //     ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
//     //     ->select('schools.name as school_name', 'batches.year as batch_year')
//     //     ->where('batches.year', '2024')
//     //     ->get();

//     // dump($data2);

//     // dump('Bagaimana caranya mendapatkan data berikut: Jurusan apa saja yang terdaftar PKL dari Sekolah X pada Tahun/Angkatan 2024?');

//     // $data3 = DB::table('schools')
//     //     ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
//     //     ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
//     //     ->join('batch_school_majors', 'batch_school_id', '=', 'batch_school_majors.batch_school_id')
//     //     ->join('majors', 'batch_school_majors.major_id', '=', 'majors.id')
//     //     ->select('majors.code as major_code')
//     //     ->where('schools.name', 'SMKN 7 Pariaman')
//     //     ->where('batches.year', '2024')
//     //     ->get();

//     // dump($data3);

//     // dump('Bagaimana caranya mendapatkan data berikut: Sekolah mana saja yang terdaftar PKL pada Tahun/Angkatan 2024 dan memiliki Jurusan PPLG?');

//     // $data4 = DB::table('schools')
//     //     ->join('batch_schools', 'schools.id', '=', 'batch_schools.school_id')
//     //     ->join('batches', 'batch_schools.batch_id', '=', 'batches.id')
//     //     ->join('batch_school_majors', 'batch_school_id', '=', 'batch_school_majors.batch_school_id')
//     //     ->join('majors', 'batch_school_majors.major_id', '=', 'majors.id')
//     //     ->select('schools.name as school_name')
//     //     ->where('batches.year', '1983')
//     //     ->where('majors.code', 'SSP')
//     //     ->get();

//     // dump($data4);

//         return view('home',['title' =>'home page']);
// });


Route::get('/a', function () {

        dump('1. data 1 user pertama');
        $soal1 = User::find(1)->toArray();

        dump($soal1);

        dump('2. data seluruh user');
        $soal2 = User::all()->toArray();

        dump($soal2);

        dump('3. seluruh data user dengan id > 5 (nomor id 6, 7, 8, dst)');
        $soal3 = User::where('id', '>', 5)->get()->toArray();

        dump($soal3);

        dump('4. data 10 user pertama dengan id > 5');
        $soal4 = User::where('id', '>', 5)->limit(10)->get()->toArray();

        dump($soal4); 

        dump('5. data 10 user pertama dengan id > 5, diurutkan berdasarkan abjad nama/emailnya (A ke Z)');
        $soal5 = User::where('id', '>', 5)->limit(10)->orderBy('name', 'asc')->get()->toArray();

        dump($soal5);

        dump('6. data 10 user pertama dengan id > 5, diurutkan berdasarkan tgl created_at (baru ke lama)');
        $soal6 = User::where('id', '>', 5)->orderBy('created_at', 'desc')->limit(10)->get()->toArray();

        dump($soal6);

        dump('7. data user pertama dengan id > 5');
        $soal7 = User::where('id', '>', 5)->first()->toArray();   

        dump($soal7);
    
        dump('8. data user dengan id "5"');
        $soal8 = User::find(5)->toArray();

        dump($soal8);

        dump('9. data user dengan id "5", namun hanya di select nama dan email nya');
        $soal9 = User::where('id', 5)->select('name', 'email')->get()->toArray();

        dump($soal9);

        dump('10. data user dengan kolom nama/email berawalan dengan huruf "A"');
        $soal10 = User::where('name', 'LIKE', 'A%')->get()->toArray();

        dump($soal10);

        dump('11. data user dengan kolom nama/email berawalan dengan huruf "A" DAN memiliki id > 5');
        $soal11 = User::where('id', '>', 5)->where('name', 'LIKE', 'A%')->get()->toArray();

        dump($soal11);

        dump('12. data user dengan kolom nama/email berawalan dengan huruf "A" ATAU mengandung kata "admin"');
        $soal12 = User::where('name', 'LIKE', 'A%')->orWhere('name', 'LIKE', '%admin%')->get()->toArray();

        dump($soal12);
});

Route::get('/b', function () {

 
    dump('1. data 1 siswa pertama');
    $soal11 = Student::first()->toArray();

    dump($soal11);

    dump('2. data seluruh siswa');
    $soal22 = Student::all()->toArray();

    dump($soal22);

    dump('3. seluruh data siswa dengan id > 5 (nomor id 6, 7, 8, dst)');
    $soal33 = Student::where('id', '>', 5)->get()->toArray();

    dump($soal33);

    dump('4. data 10 siswa pertama dengan id > 5');
    $soal44 = Student::where('id', '>', 5)->limit(10)->get()->toArray();

    dump($soal44); 

    dump('5. data 10 siswa pertama dengan id > 5, diurutkan berdasarkan abjad nama/emailnya (A ke Z)');
    $soal55 = Student::where('id', '>', 5)->limit(10)->orderBy('name', 'asc')->get()->toArray();

    dump($soal55);

    dump('6. data 10 siswa pertama dengan id > 5, diurutkan berdasarkan tgl created_at (baru ke lama)');
    $soal66 = Student::where('id', '>', 5)->orderBy('created_at', 'desc')->limit(10)->get()->toArray();
    dump($soal66);

    dump('7. data siswa pertama dengan id > 5');
    $soal77 = Student::where('id', '>', 5)->first()->toArray();   

    dump($soal77);

    dump('8. data siswa dengan id "5"');
    $soal88 = Student::find(5)->toArray();

    dump($soal88);

    dump('9. data siswa dengan id "5", namun hanya di select nama dan email nya');
    $soal99 = Student::where('id', 5)->select('name', 'phone_number')->get()->toArray();

    dump($soal99);

    dump('10. data siswa dengan kolom nama/email berawalan dengan huruf "A"');
    $soal10 = Student::where('name', 'LIKE', 'A%')->get()->toArray();

    dump($soal10);

    dump('11. data siswa dengan kolom nama/email berawalan dengan huruf "A" DAN memiliki id > 5');
    $soal111 = Student::where('id', '>', 5)->where('name', 'LIKE', 'A%')->get()->toArray();

    dump($soal111);

    dump('12. data siswa dengan kolom nama/email berawalan dengan huruf "A" ATAU mengandung kata "putri"');
    $soal122 = Student::where('name', 'LIKE', 'A%')->orWhere('name', 'LIKE', '%putri%')->get()->toArray();

    dump($soal122);
});

Route::get('/c', function () {

    dump('1.Bagaimana cara menampilkan daftar siswa yang ada di sekolah "SMKN 8 Probolinggo" dan diurutkan berdasarkan abjad (A - Z)');
    dump(Student::whereRelation('batchSchoolMajor.batchSchool.school', 'name', 'SMKN 8 Probolinggo')->orderBy('name', 'asc')->get()->toArray());

    dump('2.Bagaimana cara menampilkan semua jurusan yang memiliki setidaknya satu siswa terkait');
    dump(Major::has('batchSchoolMajor')->get()->toArray());

    dump('3.Bagaimana cara mendapatkan kegiatan yang diverifikasi oleh pembimbing dengan id 7');
    dump(Activity::where('validated_by_mentor_id', 7)->get()->toArray());

    dump('4.Bagaimana cara mendapatkan daftar User yang tidak memiliki pembimbing dan diurutkan berdasarkan abjad (A - Z)');
    dump(User::doesntHave('mentor')->orderBy('name', 'asc')->get()->toArray());

    dump('5.Bagaimana cara mendapatkan angkatan_sekolah yang memiliki jurusan dengan id 19');
    dump(BatchSchool::whereRelation('batchSchoolMajor.major', 'id', 19)->get()->toArray());

    dump('6.Bagaimana cara mendapatkan daftar User yang terhubung dengan Mentor yang bernama "Dimas Saptono" ');
    dump(Mentor::whereRelation('user', 'name', 'Dimas Saptono')->get()->toArray());

    dump('7.Bagaimana cara menampilkan User yang memiliki siswa dengan nomor telepon "0299 1456 4903" ');
    dump(User::whereRelation('student', 'phone_number', '0299 1456 4903')->get()->toArray());

    dump('8.Bagaimana cara mendapatkan kegiatan yang dijadwalkan pada tanggal 1984-06-07');
    dump(Activity::whereHas('scheduleOfActivity', function($query) {
        $query->where('date', '1984-06-07');
    })->get()->toArray());

    dump('9.Bagaimana cara menampilkan daftar kegiatan yang terjadi di sekolah SMK 4 Ternate melalui siswa');
    dump(Activity::whereRelation('student.batchSchoolMajor.batchSchool.school', 'name', 'SMK 4 Ternate')->get()->toArray());

    dump('10.Bagaimana cara menampilkan siswa yang terdaftar pada angkatan dengan id 16 dan diurutkan berdasarkan abjad (A - Z)');
    dump(Student::whereRelation('batchSchoolMajor.batchSchool', 'batch_id', 16)->orderBy('name', 'asc')->get()->toArray());
});


Route::get('/', function () {
    return view('home',['title' => 'Home']);
});

Route::get('/calendar', function () {
    return view('calendar',['title' =>'Crud']);
});

Route::get('/team', function () {
    return view('team',['title' =>'Team']);
});

Route::get('/projects', function () {
    return view('projects',['title' =>'Projects']);
});

Route::get('/about', function () {
    return view('about',['title' =>'About']);
});

Route::get('/datatable', function () {
    return view('major.datatable',['title' => 'Datatable']);
});


Route::resource('batch', BatchController::class);
Route::resource('school', SchoolController::class);

Route::get('/clientside', [SchoolController::class, 'datatable'])->name('school.datatable');





// Route::get('/posts', function () {
//     return view('posts',['title' =>'team', 'posts'=> School::all()]);
// });
// Route::get('/posts/{post:name}', function(School $post) {

//     // $post = Post::find($id);
//     return view('post', ['title' => 'Single Post','post' => $post]);
// });
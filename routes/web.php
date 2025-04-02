<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [BlogController::class, "index"])->name('blog.list');

Route::get('/add-blog', [BlogController::class, 'create'])->name("blog.create");
Route::post('/add-blog', [BlogController::class, 'store'])->name("blog.store");

// dinamicni parametar id, koji moze da se menja
ROute::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name("blog.edit");
Route::post('/edit-blog/{id}', [BlogController::class, 'update'])->name("blog.update");

Route::get("/delete-blog/{id}", [BlogController::class, 'delete'])->name("blog.delete");
Route::post("/delete-blog/{id}", [BlogController::class, 'destroy'])->name("blog.destroy");

Route::get("/single-blog/{id}", [BlogController::class, "single"])->name("blog.single");
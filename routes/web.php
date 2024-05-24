<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;


Route::resource('livro', LivroController::class);

Route::put('/livros/{id}', [LivroController::class, 'update'])->name('livro.update');


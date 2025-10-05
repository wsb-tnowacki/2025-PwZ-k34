<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('start');
Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');
Route::get('/o-nas', function () {
    $zadania =[
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3'
    ];
    $tasks =[
        'Task 1',
        'Task 2',
        'Task 3'
    ];
    /* return view('onas', ['zadania'=> $zadania]); */
    /* return view('onas')->with('zadanka',$zadania); */
    return view('onas', compact('zadania', 'tasks'));
})->name('onas');
Route::get('/test', function () {
    return "Test";
});
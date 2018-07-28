<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    $tweets = \App\Tweet::all()->sortByDesc('created_at');

    return view('static', [
        'tweets' => $tweets,
    ]);
});

Route::get('/optimistic', function() {
    $tweets = \App\Tweet::all()->sortByDesc('created_at')->toJson();

    return view('optimistic', [
        'tweets' => $tweets,
    ]);
});

Route::post('tweet', function (\Illuminate\Http\Request $request) {
    // simulate slow network
    sleep(2);

    \App\Tweet::create($request->all());

    return redirect('/');
});

Route::get('tweet/{username}', function($username) {
    return \App\Tweet::all()->where('username', $username);
});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('songs/search', 'SongController@search');
Route::get('/songs', 'SongController@listSongs');

Route::get('/songs/create', function() {
    $artists = Artist::all();
    $genres = Genre::all();
    return View::make('songs/create', [
        'artists' => $artists,
        'genres' => $genres
    ]);
});

Route::post('songs', function() {
    /*$song = new Song();
    $song->title = Input::get('title');
    $song->artist_id = Input::get('artist');
    $song->genre_id = Input::get('genre');
    $song->*/

   return Redirect::to('songs/create')->with('success', 'Yay!');
});

Route::get('songs', function() {
   $songs = Song::take(5)->get();

    foreach ($songs as $song) {
        var_dump($song->artist->toArray());
    }
});


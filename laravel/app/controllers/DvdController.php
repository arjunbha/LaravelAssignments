<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/17/14
 * Time: 8:46 PM
 */

class DvdController extends BaseController {

    public function search() {
        $genres = Dvd::getGenres();
        $ratings = Dvd::getRatings();

        return View::make('dvds/search', [
            'genres' => $genres ,
            'ratings' => $ratings
        ]);
    }

    public function listDvds() {
        $dvd_title = Input::get('dvd_title'); // $_GET
        $genre = Input::get('genre');
        $rating = Input::get('rating');

        $dvds = Dvd::search($dvd_title,$genre,$rating);

        //dd($songs);
        return View::make('dvds/dvds-list', [
            'dvds' => $dvds
        ]);
    }


}
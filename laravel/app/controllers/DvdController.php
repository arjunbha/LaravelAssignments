<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/17/14
 * Time: 8:46 PM
 */

class DvdController extends BaseController {

    public function search() {
        $genres = Genre::all();
        $ratings = Rating::all();

        return View::make('dvds/search', [
            'genres' => $genres ,
            'ratings' => $ratings
        ]);
    }

    public function listDvds() {
        /*$dvd_title = Input::get('dvd_title'); // $_GET
        $genre = Input::get('genre');
        $rating = Input::get('rating');

        $dvds = Dvd::search($dvd_title,$genre,$rating);*/

        $dvd_title = Input::get('dvd_title'); // $_GET
        $genre = Input::get('genre');
        $rating = Input::get('rating');


        $query = Dvd::join('genres','genres.id','=','dvds.genre_id')
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');


        if($dvd_title != NULL) {
            $query->where('title','LIKE', "%$dvd_title%");
        }

        if($genre != "all" && $genre != NULL) {
            $query->where('genre_name','=',"$genre");
        }

        if($rating != "all" && $genre != NULL) {
            $query->where('rating_name','=',"$rating");
        }

        $query->take(30);
        $dvds = $query->get();


            //->where('genre_name','=',"$genre")
            //->where('rating_name','=',"$rating")
            //->take(30)
            //->get();

        //dd($songs);
        return View::make('dvds/dvds-list', [
            'dvds' => $dvds
        ]);
    }

    public function createForm() {
        $label = Label::all();
        $sound = Sound::all();
        $genres = Genre::all();
        $ratings = Rating::all();
        $formats = Format::all();

        return View::make('dvds/create', [
            'labels' => $label,
            'sounds' => $sound,
            'genres' => $genres ,
            'ratings' => $ratings,
            'formats' => $formats
        ]);
    }

    public function create() {


        $validation = Dvd::validate(Input::all());

        if ($validation->passes()) {
            $dvd = new DVD();
            $dvd->title = Input::get('title');
            $dvd->format_id = Input::get('format');
            $dvd->label_id = Input::get('label');
            $dvd->sound_id = Input::get('sound');
            $dvd->genre_id = Input::get('genre');
            $dvd->rating_id = Input::get('rating');
            $dvd->save();
            return Redirect::to('dvds/create')
                ->with('success', 'Yay!');
        }
        else {
            return Redirect::to('dvds/create')
                ->withInput()
                ->withErrors($validation);
                //->with('errors', $validation->messages());
        }
    }

    public function findGenre($id) {
        $genre = Genre::find($id);
        $dvds = $genre->dvds;




        return View::make('dvds/genre-list', [
            'genre' => $genre,
            'dvds' => $dvds
        ]);
         //dd($artist->songs->toArray());
    }


}
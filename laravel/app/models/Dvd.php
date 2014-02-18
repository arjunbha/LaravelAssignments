<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/17/14
 * Time: 6:17 PM
 */

class Dvd {
    public static function search($dvd_title,$genre, $rating) {
        /**
         * SELECT * FROM songs
         * INNER JOIN artists
         * ON songs.artist_id = artists.id
         * INNER JOIN genres
         * ON songs.genre_id = genres.id
         */

        $query = DB::table('dvds')
            ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name', DB::raw("DATE_FORMAT(release_date, '%b %d %Y %h:%i %p') AS release_date"))
            ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
            ->join('genres', 'genres.id', '=', 'dvds.genre_id')
            ->join('labels', 'labels.id', '=', 'dvds.label_id')
            ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
            ->join('formats', 'formats.id', '=', 'dvds.format_id');

        if ($dvd_title) {
            $query->where('title', 'LIKE', "%$dvd_title%");
        }

        if($genre == "all") {

        }
        elseif ($genre) {
            $query->where('genre_name', '=' , "$genre");
        }

        if($rating == "all") {

        }
        elseif ($rating) {
            $query->where('rating_name', '=', "$rating");
        }

        $dvds = $query->get();

        return $dvds;
    }

    public static function getGenres() {
    $query = DB::table('genres')
        ->select('genre_name')
        ->distinct()
        ->get();

    return $query;
    }

    public static function getRatings() {
        $query = DB::table('ratings')
            ->select('rating_name')
            ->distinct()->get();

        return $query;
    }
}
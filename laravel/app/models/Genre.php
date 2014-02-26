<?php
/**
 * Created by PhpStorm.
 * User: arjunbhargava
 * Date: 2/24/14
 * Time: 8:38 PM
 */

class Genre extends Eloquent {

    public function dvds()
    {
        return $this->hasMany('Dvd');
    }

}
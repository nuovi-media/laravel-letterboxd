<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmStatisticsCounts
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property int $watches
 * @property int $likes
 * @property int $ratings
 * @property int $fans
 * @property int $lists
 * @property int $reviews
 */
class FilmStatisticsCounts extends LetterboxdBaseElement
{
    protected int $watches;
    protected int $likes;
    protected int $ratings;
    protected int $fans;
    protected int $lists;
    protected int $reviews;
}
<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class FilmRatingActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property FilmSummary $film
 * @property float $rating
 */
class FilmRatingActivity extends AbstractActivity
{
    protected FilmSummary $film;
    protected float $rating;

    /**
     * @param FilmSummary|array $film
     */
    protected function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }
}
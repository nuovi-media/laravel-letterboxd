<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class FilmWatchActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property FilmSummary $film
 */
class FilmWatchActivity extends AbstractActivity
{
    protected FilmSummary $film;

    /**
     * @param FilmSummary|array $film
     */
    protected function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }
}
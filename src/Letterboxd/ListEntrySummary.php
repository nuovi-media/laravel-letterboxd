<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class ListEntrySummary
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property int $rank;
 * @property FilmSummary $film;
 */
class ListEntrySummary extends LetterboxdBaseElement
{
    protected int $rank;
    protected FilmSummary $film;

    /**
     * @param FilmSummary|array $film
     */
    public function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }
}
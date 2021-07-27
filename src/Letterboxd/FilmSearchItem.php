<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class FilmSearchItem
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property float $rank
 * @property FilmSummary $film
 */
class FilmSearchItem extends AbstractSearchItem
{
    protected FilmSummary $film;

    /**
     * @param FilmSummary|array $film
     */
    public function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }
}
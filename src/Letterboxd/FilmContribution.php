<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class FilmContribution
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property FilmSummary $film
 * @property string $characterName
 */
class FilmContribution extends LetterboxdBaseElement
{
    protected string $type;
    protected FilmSummary $film;
    protected string $characterName;

    /**
     * @param FilmSummary|array $film
     */
    public function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }
}
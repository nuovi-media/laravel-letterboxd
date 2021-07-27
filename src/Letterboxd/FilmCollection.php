<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmCollection
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $name;
 * @property Collection|array<FilmSummary> $films;
 * @property Collection|array<Link> $links;
 */
class FilmCollection extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected Collection $films;
    protected Collection $links;

    /**
     * @param Collection|array<array|FilmSummary> $films
     */
    protected function setFilms(Collection|array $films)
    {
        $this->films = collect($films)->map(fn ($film) => is_array($film) ? new FilmSummary($film) : $film);
    }

    /**
     * @param Collection|array<array|Link> $links
     */
    protected function setLinks(Collection|array $links)
    {
        $this->links = collect($links)->map(fn ($link) => is_array($link) ? new Link($link) : $link);
    }
}
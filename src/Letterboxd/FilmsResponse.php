<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class FilmsResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property  string $next
 * @property  Collection|array<FilmSummary> $items
 */
class FilmsResponse extends LetterboxdBaseElement
{
    protected string $next;
    protected Collection $items;

    /**
     * @param Collection|array<array|FilmSummary> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new FilmSummary($item) : $item);
    }
}
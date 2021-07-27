<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmsAutocompleteResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<FilmSummary> $items
 */
class FilmsAutocompleteResponse extends LetterboxdBaseElement
{
    protected Collection $items;

    /**
     * @param Collection|array<array|FilmSummary> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new FilmSummary($item) : $item);
    }
}
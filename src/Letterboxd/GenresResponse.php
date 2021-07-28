<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class GenresResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<Genre> $items
 */
class GenresResponse extends LetterboxdBaseElement
{
    protected Collection $items;

    /**
     * @param Collection|array<array|Genre> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new Genre($item) : $item);
    }
}
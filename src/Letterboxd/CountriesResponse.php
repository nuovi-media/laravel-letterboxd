<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class CountriesResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<Country> $items
 */
class CountriesResponse extends LetterboxdBaseElement
{
    protected Collection $items;

    /**
     * @param Collection|array<array|Country> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new Country($item) : $item);
    }
}
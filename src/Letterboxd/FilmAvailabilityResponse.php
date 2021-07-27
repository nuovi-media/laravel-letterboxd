<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmAvailabilityResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<FilmAvailability> $items
 */
class FilmAvailabilityResponse extends LetterboxdBaseElement
{
    protected Collection $items;

    /**
     * @param Collection|array<array|FilmAvailability> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new FilmAvailability($item) : $item);
    }
}
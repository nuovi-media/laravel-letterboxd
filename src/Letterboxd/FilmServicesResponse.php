<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class FilmServicesResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection<Service> $items
 */
class FilmServicesResponse extends LetterboxdBaseElement
{
    protected Collection $items;

    /**
     * @param Collection|array<array|Service> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new Service($item) : $item);
    }
}
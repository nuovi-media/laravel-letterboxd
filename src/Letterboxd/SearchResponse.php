<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class SearchResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property  string $next
 * @property  Collection|array<AbstractSearchItem> $items
 */
class SearchResponse extends LetterboxdBaseElement
{
    protected string $next;
    protected Collection $items;

    /**
     * @param Collection|array<array|AbstractSearchItem> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new AbstractSearchItem($item) : $item);
    }
}
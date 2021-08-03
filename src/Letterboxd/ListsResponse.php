<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class ListsResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property  string $next
 * @property  Collection|array<ListSummary> $items
 */
class ListsResponse extends LetterboxdBaseElement
{
    protected string $next;
    protected Collection $items;

    /**
     * @param Collection|array<array|ListSummary> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new ListSummary($item) : $item);
    }
}
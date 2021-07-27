<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class AListTopic
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $name
 * @property Collection|array<ListSummary> $items
 */
class AListTopic extends LetterboxdBaseElement
{
    protected string $name;
    protected Collection $items;

    /**
     * @param Collection|array<array|ListSummary> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new ListSummary($item) : $item);
    }
}
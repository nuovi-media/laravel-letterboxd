<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class ActivityResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $next
 * @property Collection|array<AbstractActivity> $items
 */
class ActivityResponse extends LetterboxdBaseElement
{
    protected string $next;
    protected Collection $items;

    /**
     * @param Collection|array<AbstractActivity> $activities
     */
    protected function setItems(Collection|array $activities)
    {
        $this->items = collect($activities)->map(fn ($activity) => is_array($activity) ? new ${$activity['type']}($activity) : $activity);
    }
}
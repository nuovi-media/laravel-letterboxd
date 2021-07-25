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
     * @param Collection|array<array|FilmSummary> $diaryEntries
     */
    protected function setItems(Collection|array $diaryEntries)
    {
        $this->items = collect($diaryEntries)->each(fn ($diaryEntry) => is_array($diaryEntry) ? new FilmSummary($diaryEntry) : $diaryEntry);
    }
}
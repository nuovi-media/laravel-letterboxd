<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class LanguagesResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<Language> $items
 */
class LanguagesResponse extends LetterboxdBaseElement
{
    protected Collection $items;

    /**
     * @param Collection|array<array|Language> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new Language($item) : $item);
    }
}
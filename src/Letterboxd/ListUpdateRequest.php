<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class ListUpdateRequest
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property bool $published
 * @property string $name
 * @property string $commentPolicy
 * @property bool $ranked
 * @property string $description
 * @property Collection|array<string> $tags
 * @property Collection|array<string> $filmsToRemove
 * @property Collection|array<ListUpdateEntry> $entries
 */
class ListUpdateRequest extends LetterboxdBaseElement
{
    protected bool $published;
    protected string $name;
    protected string $commentPolicy;
    protected bool $ranked;
    protected string $description;
    protected Collection $tags;
    protected Collection $filmsToRemove;
    protected Collection $entries;
    protected Collection $share;

    /**
     * @param Collection|array<string> $tags
     */
    protected function setTags(Collection|array $tags)
    {
        $this->tags = collect($tags);
    }

    /**
     * @param Collection|array<string> $filmsToRemove
     */
    protected function setFilmsToRemove(Collection|array $filmsToRemove)
    {
        $this->filmsToRemove = collect($filmsToRemove);
    }

    /**
     * @param Collection|array<array|ListUpdateEntry> $entries
     */
    protected function setEntries(Collection|array $entries)
    {
        $this->entries = collect($entries)->map(fn ($entry) => is_array($entry) ? new ListUpdateEntry($entry) : $entry);
    }

    /**
     * @param Collection|array<string> $share
     */
    protected function setShare(Collection|array $share)
    {
        $this->share = collect($share);
    }
}
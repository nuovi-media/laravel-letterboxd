<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class ListsResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property  string $next
 * @property  Collection|array<ListEntry> $items
 * @property  FilmsMetadata $metadata
 * @property  Collection|array<FilmsMemberRelationship> $relationships
 */
class ListEntriesResponse extends LetterboxdBaseElement
{
    protected string $next;
    protected Collection $items;
    protected FilmsMetadata $metadata;
    protected Collection $relationships;

    /**
     * @param Collection|array<array|ListEntry> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn ($item) => is_array($item) ? new ListEntry($item) : $item);
    }

    /**
     * @param FilmsMetadata $metadata
     */
    protected function setMetadata(array $metadata)
    {
        $this->metadata = new FilmsMetadata($metadata);
    }

    /**
     * @param Collection|array<array|FilmsMemberRelationship> $relationships
     */
    protected function setRelationships(Collection|array $relationships)
    {
        $this->relationships = collect($relationships)->map(fn ($relationship) => is_array($relationship) ? new FilmsMemberRelationship($relationship) : $relationship);
    }
}
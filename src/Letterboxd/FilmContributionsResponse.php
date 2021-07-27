<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmContributionsResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $next
 * @property Collection|array<FilmContribution> $items
 * @property Collection|array<FilmContributorMetadata> $metadata
 * @property Collection|array<FilmContributorMemberRelationship> $relationships
 */
class FilmContributionsResponse extends LetterboxdBaseElement
{
    protected string $next;
    protected Collection $items;
    protected Collection $metadata;
    protected Collection $relationships;

    /**
     * @param Collection|array<array|FilmContribution> $items
     */
    protected function setItems(Collection|array $items)
    {
        $this->items = collect($items)->map(fn($item) => is_array($item) ? new FilmContribution($item) : $item);
    }

    /**
     * @param Collection|array<array|FilmContributorMetadata> $metadata
     */
    protected function setMetadata(Collection|array $metadata)
    {
        $this->metadata = collect($metadata)->map(fn($datum) => is_array($datum) ? new FilmContributorMetadata($datum) : $datum);
    }

    /**
     * @param Collection|array<array|FilmContributorMemberRelationship> $relationships
     */
    protected function setRelationships(Collection|array $relationships)
    {
        $this->relationships = collect($relationships)->map(fn($relationship) => is_array($relationship) ? new FilmContributorMemberRelationship($relationship) : $relationship);
    }
}
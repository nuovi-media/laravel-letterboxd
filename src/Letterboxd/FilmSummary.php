<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmSummary
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $name;
 * @property string $originalName;
 * @property Collection|array<string> $alternativeNames;
 * @property int $releaseYear;
 * @property Collection|array<ContributorSummary> $directors;
 * @property Image $poster;
 * @property Image $adultPoster;
 * @property bool $adult;
 * @property string $filmCollectionId;
 * @property Collection|array<Link> $links;
 * @property MemberFilmRelationship $relationship;
 */
class FilmSummary extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected string $originalName;
    protected Collection $alternativeNames;
    protected int $releaseYear;
    protected Collection $director;
    protected Image $poster;
    protected Image $adultPoster;
    protected bool $adult;
    protected string $filmCollectionId;
    protected Collection $links;
    protected MemberFilmRelationship $relationship;

    /**
     * @param Collection|array<string> $alternativeName
     */
    protected function setAlternativeNames(Collection|array $alternativeName)
    {
        $this->alternativeNames = collect($alternativeName);
    }

    /**
     * @param Collection|array<array|ContributorSummary> $directors
     */
    protected function setDirectors(Collection|array $directors)
    {
        $this->directors = collect($directors)->map(fn ($director) => is_array($director) ? new ContributorSummary($director) : $director);
    }

    /**
     * @param Image|array $poster
     */
    protected function setPoster(Image|array $poster)
    {
        $this->poster = is_array($poster) ? new Image($poster) : $poster;
    }

    /**
     * @param Image|array $adultPoster
     */
    protected function setAdultPoster(Image|array $adultPoster)
    {
        $this->adultPoster = is_array($adultPoster) ? new Image($adultPoster) : $adultPoster;
    }

    /**
     * @param Collection|array<array|Link> $links
     */
    protected function setLinks(Collection|array $links)
    {
        $this->links = collect($links)->map(fn ($link) => is_array($link) ? new Link($link) : $link);
    }

    /**
     * @param MemberFilmRelationship|array $relationship
     */
    protected function setRelationship(MemberFilmRelationship|array $relationship)
    {
        $this->relationship = is_array($relationship) ? new MemberFilmRelationship($relationship) : $relationship;
    }
}
<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class Contributor
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id
 * @property string $name
 * @property ContributorStatistics $statistics
 * @property Collection|array<Link> $links
 */
class Contributor extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected ContributorStatistics $statistics;
    protected Collection $links;

    /**
     * @param ContributorStatistics|array $statistics
     */
    protected function setStatistics(ContributorStatistics|array $statistics)
    {
        $this->statistics = is_array($statistics) ? new FilmSummary($statistics) : $statistics;
    }

    /**
     * @param Collection|array<array|Link> $links
     */
    protected function setLinks(Collection|array $links)
    {
        $this->links = collect($links)->map(fn ($link) => is_array($link) ? new Link($link) : $link);
    }
}
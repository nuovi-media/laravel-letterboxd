<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class FilmContributions
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Collection|array<ContributorSummary> $contributors
 */
class FilmContributions extends LetterboxdBaseElement
{
    protected string $type;
    protected Collection $contributors;

    /**
     * @param Collection|array<array|ContributorSummary> $contributors
     */
    protected function setContributors(Collection|array $contributors)
    {
        $this->contributors = collect($contributors)->map(fn ($contributor) => is_array($contributor) ? new ContributorSummary($contributor) : $contributor);
    }
}
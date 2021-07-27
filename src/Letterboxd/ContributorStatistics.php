<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class ContributorStatistics
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<ContributionStatistics>
 */
class ContributorStatistics extends LetterboxdBaseElement
{
    protected Collection $contributions;

    /**
     * @param Collection|array<array|ContributionStatistics> $contributions
     */
    protected function setContributions(Collection|array $contributions)
    {
        $this->contributions = collect($contributions)->map(fn ($contribution) => is_array($contribution) ? new ContributionStatistics($contribution) : $contribution);
    }
}
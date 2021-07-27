<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmStatistics
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property FilmIdentifier $film
 * @property FilmStatisticsCounts $counts
 * @property float $rating;
 * @property Collection|array<RatingsHistogramBar> $ratingsHistogram
 */
class FilmStatistics extends LetterboxdBaseElement
{
    protected FilmIdentifier $film;
    protected FilmStatisticsCounts $counts;
    protected float $rating;
    protected Collection $ratingsHistogram;

    /**
     * @param FilmStatisticsCounts|array $counts
     */
    public function setCounts(FilmStatisticsCounts|array $counts)
    {
        $this->counts = is_array($counts) ? new FilmStatisticsCounts($counts) : $counts;
    }

    /**
     * @param Collection|array<AbstractActivity> $ratingsHistogram
     */
    protected function setRatingsHistogram(Collection|array $ratingsHistogram)
    {
        $this->ratingsHistogram = collect($ratingsHistogram)->map(fn ($histogram) => is_array($histogram) ? new RatingsHistogramBar($histogram) : $histogram);
    }
}
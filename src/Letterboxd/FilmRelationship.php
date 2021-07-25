<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class FilmRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property bool $watched;
 * @property Carbon $whenWatched;
 * @property bool $liked;
 * @property Carbon $whenLiked;
 * @property bool $favorited;
 * @property bool $inWatchList;
 * @property Carbon $whenAddedToWatchlist;
 * @property Carbon $whenCompletedInWatchlist;
 * @property float $rating;
 * @property Collection|array<string> $reviews;
 * @property Collection|array<string> $diaryEntries;
 *
 */
class FilmRelationship extends LetterboxdBaseElement
{
    protected bool $watched;
    protected Carbon $whenWatched;
    protected bool $liked;
    protected Carbon $whenLiked;
    protected bool $favorited;
    protected bool $inWatchList;
    protected Carbon $whenAddedToWatchlist;
    protected Carbon $whenCompletedInWatchlist;
    protected float $rating;
    protected Collection $reviews;
    protected Collection $diaryEntries;

    /**
     * @param Carbon|string $date
     */
    protected function setWhenWatched(Carbon|string $date)
    {
        $this->whenWatched = is_string($date) ? Carbon::parse($date) : $date;
    }

    /**
     * @param Carbon|string $date
     */
    protected function setWhenLiked(Carbon|string $date)
    {
        $this->whenLiked = is_string($date) ? Carbon::parse($date) : $date;
    }

    /**
     * @param Carbon|string $date
     */
    protected function setWhenAddedToWatchlist(Carbon|string $date)
    {
        $this->whenAddedToWatchlist = is_string($date) ? Carbon::parse($date) : $date;
    }

    /**
     * @param Carbon|string $date
     */
    protected function setWhenCompletedInWatchlist(Carbon|string $date)
    {
        $this->whenCompletedInWatchlist = is_string($date) ? Carbon::parse($date) : $date;
    }

    /**
     * @param Collection|array<string> $reviews
     */
    protected function setReviews(Collection|array $reviews)
    {
        $this->reviews = collect($reviews);
    }

    /**
     * @param Collection|array<string> $diaryEntries
     */
    protected function setDiaryEntries(Collection|array $diaryEntries)
    {
        $this->diaryEntries = collect($diaryEntries);
    }
}
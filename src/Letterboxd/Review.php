<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

/**
 * Class Review
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $lbml;
 * @property bool $containSpoilers;
 * @property bool $moderated;
 * @property Carbon $whenReviewed;
 * @property string $text;
 */
class Review extends LetterboxdBaseElement
{
    protected string $lbml;
    protected bool $containSpoilers;
    protected bool $moderated;
    protected Carbon $whenReviewed;
    protected string $text;

    /**
     * @param Carbon|string $whenReviewed
     */
    protected function setWhenReviewed(Carbon|string $whenReviewed)
    {
        $this->whenReviewed = is_string($whenReviewed) ? Carbon::parse($whenReviewed) : $whenReviewed;
    }
}
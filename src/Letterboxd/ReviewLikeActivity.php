<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class ReviewLikeActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property LogEntry $review
 */
class ReviewLikeActivity extends AbstractActivity
{
    protected LogEntry $review;

    /**
     * @param LogEntry|array $review
     */
    protected function setReview(LogEntry|array $review)
    {
        $this->review = is_array($review) ? new LogEntry($review) : $review;
    }
}
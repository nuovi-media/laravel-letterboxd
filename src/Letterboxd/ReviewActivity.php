<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class ReviewActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property LogEntry $review
 */
class ReviewActivity extends AbstractActivity
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
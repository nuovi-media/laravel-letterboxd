<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class ReviewCommentActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property LogEntry $review
 * @property ReviewComment $comment
 */
class ReviewCommentActivity extends AbstractActivity
{
    protected LogEntry $review;
    protected ReviewComment $comment;

    /**
     * @param LogEntry|array $review
     */
    protected function setReview(LogEntry|array $review)
    {
        $this->review = is_array($review) ? new LogEntry($review) : $review;
    }

    /**
     * @param ReviewComment|array $comment
     */
    protected function setComment(ReviewComment|array $comment)
    {
        $this->comment = is_array($comment) ? new ReviewComment($comment) : $comment;
    }
}
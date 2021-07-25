<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

/**
 * Class ReviewComment
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property MemberSummary $member;
 * @property Carbon $whenCreated;
 * @property Carbon $whenUpdated;
 * @property string $commentLbml;
 * @property bool $removedByAdmin;
 * @property bool $removedByContentOwner;
 * @property bool $deleted;
 * @property bool $blocked;
 * @property bool $blockedByOwner;
 * @property int $editableWindowExpiresIn;
 * @property ReviewIdentifier $review;
 * @property string $comment;
 */
class ReviewComment extends AbstractComment
{
    protected ReviewIdentifier $review;

    /**
     * @param ReviewIdentifier|array $review
     */
    protected function setList(ReviewIdentifier|array $review)
    {
        $this->review = is_array($review) ? new ReviewIdentifier($review) : $review;
    }
}
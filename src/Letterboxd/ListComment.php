<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

/**
 * Class ListComment
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
 * @property ListIdentifier $list;
 * @property string $comment;
 */
class ListComment extends AbstractComment
{
    protected ListIdentifier $list;

    /**
     * @param ListIdentifier|array $list
     */
    protected function setList(ListIdentifier|array $list)
    {
        $this->list = is_array($list) ? new ListIdentifier($list) : $list;
    }
}
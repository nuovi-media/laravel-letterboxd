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
class ListComment extends LetterboxdBaseElement
{
    protected string $id;
    protected MemberSummary $member;
    protected Carbon $whenCreated;
    protected Carbon $whenUpdated;
    protected string $commentLbml;
    protected bool $removedByAdmin;
    protected bool $removedByContentOwner;
    protected bool $deleted;
    protected bool $blocked;
    protected bool $blockedByOwner;
    protected int $editableWindowExpiresIn;
    protected ListIdentifier $list;
    protected string $comment;

    /**
     * @param MemberSummary|array $member
     */
    protected function setMember(MemberSummary|array $member)
    {
        $this->member = is_array($member) ? new MemberSummary($member) : $member;
    }

    /**
     * @param Carbon|string $whenCreated
     */
    protected function setWhenCreated(Carbon|string $whenCreated)
    {
        $this->whenCreated = is_string($whenCreated) ? Carbon::parse($whenCreated) : $whenCreated;
    }

    /**
     * @param Carbon|string $whenUpdated
     */
    protected function setWhenUpdated(Carbon|string $whenUpdated)
    {
        $this->whenUpdated = is_string($whenUpdated) ? Carbon::parse($whenUpdated) : $whenUpdated;
    }

    /**
     * @param ListIdentifier|array $list
     */
    protected function setList(ListIdentifier|array $list)
    {
        $this->list = is_array($list) ? new ListIdentifier($list) : $list;
    }
}
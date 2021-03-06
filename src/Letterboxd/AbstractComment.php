<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

abstract class AbstractComment extends LetterboxdBaseElement
{
    protected string $type;
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
}
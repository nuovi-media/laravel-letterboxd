<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

abstract class AbstractActivity extends LetterboxdBaseElement
{
    protected string $type;
    protected MemberSummary $member;
    protected Carbon $whenCreated;

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
}
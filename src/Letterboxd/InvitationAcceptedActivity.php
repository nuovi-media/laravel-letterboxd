<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class InvitationAcceptedActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property MemberSummary $invitor
 */
class InvitationAcceptedActivity extends AbstractActivity
{
    protected MemberSummary $invitor;


    /**
     * @param MemberSummary|array $invitor
     */
    protected function setInvitor(MemberSummary|array $invitor)
    {
        $this->invitor = is_array($invitor) ? new MemberSummary($invitor) : $invitor;
    }
}
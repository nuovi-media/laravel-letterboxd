<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class ListActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property ListSummary $list
 * @property ListSummary $clonedFrom
 */
class ListActivity extends AbstractActivity
{
    protected ListSummary $list;
    protected ListSummary $clonedFrom;

    /**
     * @param ListSummary|array $list
     */
    protected function setList(ListSummary|array $list)
    {
        $this->list = is_array($list) ? new ListSummary($list) : $list;
    }

    /**
     * @param ListSummary|array $clonedFrom
     */
    protected function setClonedFrom(ListSummary|array $clonedFrom)
    {
        $this->clonedFrom = is_array($clonedFrom) ? new ListSummary($clonedFrom) : $clonedFrom;
    }
}
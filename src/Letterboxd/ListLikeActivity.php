<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class ListLikeActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property ListSummary $list
 */
class ListLikeActivity extends AbstractActivity
{
    protected ListSummary $list;

    /**
     * @param ListSummary|array $list
     */
    protected function setList(ListSummary|array $list)
    {
        $this->list = is_array($list) ? new ListSummary($list) : $list;
    }
}
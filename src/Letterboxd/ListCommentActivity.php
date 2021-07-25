<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class ListCommentActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property ListSummary $list
 * @property ListComment $comment
 */
class ListCommentActivity extends AbstractActivity
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
     * @param ListComment|array $comment
     */
    protected function setClonedFrom(ListComment|array $comment)
    {
        $this->comment = is_array($comment) ? new ListComment($comment) : $comment;
    }
}
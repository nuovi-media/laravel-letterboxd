<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class AListAddition
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property ListIdentifier $list;
 * @property int $additions;
 */
class AListAddition extends LetterboxdBaseElement
{
    protected ListIdentifier $list;
    protected int $additions;

    /**
     * @param ListIdentifier|array $list
     */
    protected function setLogEntry(ListIdentifier|array $list)
    {
        $this->list = is_array($list) ? new ListIdentifier($list) : $list;
    }
}
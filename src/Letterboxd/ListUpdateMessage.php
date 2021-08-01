<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class ListUpdateEntry
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property string $code
 * @property string $title
 */
class ListUpdateMessage extends LetterboxdBaseElement
{
    protected string $type;
    protected string $code;
    protected string $title;
}
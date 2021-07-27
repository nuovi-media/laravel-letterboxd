<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class CommentUpdateMessage
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property string $code
 * @property string $title
 */
class CommentUpdateMessage extends LetterboxdBaseElement
{
    protected string $type;
    protected string $code;
    protected string $title;
}
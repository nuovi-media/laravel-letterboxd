<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class Tag
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $code
 * @property string $displayTag
 */
class Tag extends LetterboxdBaseElement
{
    protected string $tag;
    protected string $code;
    protected string $displayTag;
}
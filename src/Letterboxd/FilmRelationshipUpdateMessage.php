<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmRelationshipUpdateMessage
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type;
 * @property string $code;
 * @property string $title;
 *
 */
class FilmRelationshipUpdateMessage extends LetterboxdBaseElement
{
    protected string $type;
    protected string $code;
    protected string $title;
}
<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmRelationshipUpdateRequest
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property bool $watched;
 * @property bool $liked;
 * @property bool $inWatchlist;
 * @property int $rating;
 *
 */
class FilmRelationshipUpdateRequest extends LetterboxdBaseElement
{
    protected bool $watched;
    protected bool $liked;
    protected bool $inWatchlist;
    protected int $rating;
}
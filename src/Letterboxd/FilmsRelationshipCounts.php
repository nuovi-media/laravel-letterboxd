<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmsRelationshipCounts
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property int $watches
 * @property int $likes
 */
class FilmsRelationshipCounts extends LetterboxdBaseElement
{
    protected int $watches;
    protected int $likes;
}
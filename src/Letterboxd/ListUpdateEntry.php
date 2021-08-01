<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class ListUpdateEntry
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $film;
 * @property int $rank;
 * @property string $notes;
 * @property bool $containsSpoilers;
 */
class ListUpdateEntry extends LetterboxdBaseElement
{
    protected string $film;
    protected int $rank;
    protected string $notes;
    protected bool $containsSpoilers;
}
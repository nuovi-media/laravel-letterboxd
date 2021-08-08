<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class ListEntrySummary
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $notesLbml;
 * @property bool $containsSpoilers;
 * @property string $notes;
 */
class ListEntry extends ListEntrySummary
{
    protected string $notesLbml;
    protected bool $containsSpoilers;
    protected string $notes;
}
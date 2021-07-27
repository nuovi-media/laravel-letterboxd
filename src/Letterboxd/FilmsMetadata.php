<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmsMetadata
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property int $totalFilmCount;
 * @property int $filteredFilmCount;
 */
class FilmsMetadata extends LetterboxdBaseElement
{
    protected int $totalFilmCount;
    protected int $filteredFilmCount;
}
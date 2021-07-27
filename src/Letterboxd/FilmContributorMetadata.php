<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class FilmContributorMetadata
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type;
 * @property FilmsMetadata $data;
 */
class FilmContributorMetadata extends LetterboxdBaseElement
{
    protected string $type;
    protected FilmsMetadata $data;

    protected function setData(FilmsMetadata|array $data)
    {
        $this->data = is_array($data) ? new FilmsMetadata($data) : $data;
    }
}
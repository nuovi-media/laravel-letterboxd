<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmAvailability
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $displayName;
 * @property string $icon;
 * @property string $country;
 * @property string $id;
 * @property string $url;
 * @property Collection $types;
 */
class FilmAvailability extends LetterboxdBaseElement
{
    protected string $service;
    protected string $displayName;
    protected string $icon;
    protected string $country;
    protected string $id;
    protected string $url;
    protected Collection $types;

    public function setTypes(array $types)
    {
        $this->types = collect($types);
    }
}
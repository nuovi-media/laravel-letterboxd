<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class ImageSize
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property int $width;
 * @property int $height;
 * @property string $url;
 */
class ImageSize extends LetterboxdBaseElement
{
    protected int $width;
    protected int $height;
    protected string $url;
}
<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class RatingsHistogramBar
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property float $rating;
 * @property float $normalizedWeight;
 * @property int $count;
 */
class RatingsHistogramBar extends LetterboxdBaseElement
{
    protected float $rating;
    protected float $normalizedWeight;
    protected int $count;
}
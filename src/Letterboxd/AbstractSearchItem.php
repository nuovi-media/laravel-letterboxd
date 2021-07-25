<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


abstract class AbstractSearchItem extends LetterboxdBaseElement
{
    protected string $type;
    protected float $score;
}
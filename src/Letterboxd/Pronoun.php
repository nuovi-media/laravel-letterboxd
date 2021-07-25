<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class Pronoun
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $label;
 * @property string $objectPronoun;
 * @property string $possessiveAdjective;
 * @property string $possessivePronoun;
 * @property string $reflexive;
 */
class Pronoun extends LetterboxdBaseElement
{
    protected string $id;
    protected string $label;
    protected string $objectPronoun;
    protected string $possessiveAdjective;
    protected string $possessivePronoun;
    protected string $reflexive;
}
<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class ContributorSearchItem
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property float $score
 * @property Contributor $contributor
 */
class ContributorSearchItem extends AbstractSearchItem
{
    protected Contributor $contributor;

    /**
     * @param Contributor|array $contributor
     */
    protected function setMessage(Contributor|array $contributor)
    {
        $this->contributor = is_array($contributor) ? new Contributor($contributor) : $contributor;
    }
}
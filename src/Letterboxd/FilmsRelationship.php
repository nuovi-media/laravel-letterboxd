<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmsRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property FilmsRelationshipCounts $counts
 */
class FilmsRelationship extends LetterboxdBaseElement
{
    protected FilmsRelationshipCounts $counts;

    /**
     * @param FilmsRelationshipCounts|array $counts
     */
    public function setCounts(FilmsRelationshipCounts|array $counts)
    {
        $this->counts = is_array($counts) ? new FilmsRelationshipCounts($counts) : $counts;
    }
}
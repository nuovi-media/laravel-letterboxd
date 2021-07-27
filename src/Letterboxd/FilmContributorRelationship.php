<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmContributorRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property MemberSummary $member
 * @property FilmsRelationship $relationship
 */
class FilmContributorRelationship extends LetterboxdBaseElement
{
    protected MemberSummary $member;
    protected Collection $relationship;

    /**
     * @param MemberSummary|array $member
     */
    public function setMember(MemberSummary|array $member)
    {
        $this->member = is_array($member) ? new MemberSummary($member) : $member;
    }

    /**
     * @param FilmsRelationship|array $relationship
     */
    public function setRelationship(FilmsRelationship|array $relationship)
    {
        $this->relationship = is_array($relationship) ? new FilmsRelationship($relationship) : $relationship;
    }
}
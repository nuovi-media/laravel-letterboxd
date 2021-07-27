<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class FilmsMemberRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property MemberSummary $member;
 * @property FilmsRelationship $relationship;
 */
class FilmsMemberRelationship extends LetterboxdBaseElement
{
    protected MemberSummary $member;
    protected FilmsRelationship $relationship;

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
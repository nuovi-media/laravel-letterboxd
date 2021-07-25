<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class MemberFilmRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property MemberSummary $member
 * @property FilmRelationship $relationship
 */
class MemberFilmRelationship extends LetterboxdBaseElement
{
    protected MemberSummary $member;
    protected FilmRelationship $relationship;

    /**
     * @param MemberSummary|array $member
     */
    public function setMember(MemberSummary|array $member)
    {
        $this->member = is_array($member) ? new MemberSummary($member) : $member;
    }

    /**
     * @param FilmRelationship|array $relationship
     */
    public function setRelationship(FilmRelationship|array $relationship)
    {
        $this->relationship = is_array($relationship) ? new FilmRelationship($relationship) : $relationship;
    }
}
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
     * @param Member|array $member
     */
    public function setMember(Member|array $member)
    {
        $this->member = is_array($member) ? new MemberSummary($member) : $member;
    }

    /**
     * @param Member|array $relationship
     */
    public function setRelationship(Member|array $relationship)
    {
        $this->relationship = is_array($relationship) ? new FilmRelationship($relationship) : $relationship;
    }
}
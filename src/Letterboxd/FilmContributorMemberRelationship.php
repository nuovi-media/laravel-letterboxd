<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmContributorMemberRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property MemberSummary $member
 * @property Collection|array<FilmContributorRelationship> $relationships
 */
class FilmContributorMemberRelationship extends LetterboxdBaseElement
{
    protected MemberSummary $member;
    protected Collection $relationships;

    /**
     * @param MemberSummary|array $member
     */
    public function setMember(MemberSummary|array $member)
    {
        $this->member = is_array($member) ? new MemberSummary($member) : $member;
    }

    /**
     * @param Collection|array<array|FilmContributorRelationship> $relationships
     */
    protected function setRelationships(Collection|array $relationships)
    {
        $this->relationships = collect($relationships)->map(fn($relationship) => is_array($relationship) ? new FilmContributorRelationship($relationship) : $relationship);
    }
}
<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class FollowActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property FilmSummary $film
 * @property MemberSummary $followed
 */
class FollowActivity extends AbstractActivity
{
    protected FilmSummary $film;
    protected MemberSummary $followed;

    /**
     * @param FilmSummary|array $film
     */
    protected function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }

    /**
     * @param MemberSummary|array $followed
     */
    protected function setFollowed(MemberSummary|array $followed)
    {
        $this->followed = is_array($followed) ? new MemberSummary($followed) : $followed;
    }
}
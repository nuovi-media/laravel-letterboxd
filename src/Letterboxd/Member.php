<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class Member
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $twitterUsername				The member’s Twitter username, if they have authenticated their account.
 * @property string $bioLbml						The member’s bio in LBML. May contain the following HTML tags: <br> <strong> <em> <b> <i> <a href=""> <blockquote>.
 * @property string $location						The member’s location.
 * @property string $website						The member’s website URL. URLs are not validated, so sanitizing may be required.
 * @property Image $backdrop						The member’s backdrop image at multiple sizes, sourced from the first film in the member’s list of favorite films, if available. Only returned for Patron members.
 * @property float $backdropFocalPoint				The vertical focal point of the member’s backdrop image, if available. Expressed as a proportion of the image’s height, using values between 0.0 and 1.0. Use when cropping the image into a shorter space, such as in the page for a film on the Letterboxd site.
 * @property Collection|array<FilmSummary> $favoriteFilms		A summary of the member’s favorite films, up to a maximum of four.
 * @property Collection|array<LogEntry> $pinnedReviews			The reviews the member has pinned on their profile page, up to a maximum of two. Only returned for paying members.
 * @property Collection|array<Link> $links						A link to the member’s profile page on the Letterboxd website.
 * @property boolean $privateWatchlist				Defaults to false for new accounts. Indicates whether the member has elected to hide their watchlist from other members.
 * @property ListSummary $featuredList				A summary of the member’s featured list. Only returned for HQ members.
 * @property Collection|array<MemberSummary> $teamMembers		A summary of the member’s team members. Only returned for HQ members.
 * @property string $bio							The member’s bio formatted as HTML.
 */
class Member extends MemberSummary
{
    protected string $twitterUsername;
    protected string $bioLbml;
    protected string $location;
    protected string $website;
    protected Image $backdrop;
    protected float $backdropFocalPoint;
    protected Collection $favoriteFilms;
    protected Collection $pinnedReviews;
    protected Collection $links;
    protected bool $privateWatchlist;
    protected ListSummary $featuredList;
    protected Collection $teamMembers;
    protected string $bio;

    /**
     * @param Image|array $backDrop
     */
    protected function setBackDrop(Image|array $backDrop)
    {
        $this->backDrop = is_array($backDrop) ? new Image($backDrop) : $backDrop;
    }

    /**
     * @param Collection|array<array|FilmSummary> $favoriteFilms
     */
    protected function setFavoriteFilms(Collection|array $favoriteFilms)
    {
        $this->favoriteFilms = collect($favoriteFilms)->map(fn ($filmsummary) => is_array($filmsummary) ? new FilmSummary($filmsummary) : $filmsummary);
    }

    /**
     * @param Collection|array<array|LogEntry> $pinnedReviews
     */
    protected function setPinnedReviews(Collection|array $pinnedReviews)
    {
        $this->pinnedReviews = collect($pinnedReviews)->map(fn ($logentry) => is_array($logentry) ? new LogEntry($logentry) : $logentry);
    }

    /**
     * @param Collection|array<array|Link> $links
     */
    protected function setLinks(Collection|array $links)
    {
        $this->links = collect($links)->map(fn ($link) => is_array($link) ? new Link($link) : $link);
    }

    /**
     * @param ListSummary|array $featuredList
     */
    protected function setfeaturedList($featuredList)
    {
        $this->featuredList = new ListSummary($featuredList);
    }

    /**
     * @param Collection|array<array|MemberSummary> $teamMembers
     */
    protected function setTeamMembers(Collection|array $teamMembers)
    {
        $this->teamMembers = collect($teamMembers)->map(fn ($membersummary) => is_array($membersummary) ? new MemberSummary($membersummary) : $membersummary);
    }
}
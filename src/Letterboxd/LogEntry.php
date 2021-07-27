<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class LogEntry
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $name;
 * @property MemberSummary $owner;
 * @property FilmSummary $film;
 * @property DiaryDetails $diaryDetails;
 * @property Review $review;
 * @property Collection|array<Tag> $tags2;
 * @property Carbon $whenCreated;
 * @property Carbon $whenUpdated;
 * @property float $rating;
 * @property bool $like;
 * @property bool $commentable;
 * @property string $commentPolicy;
 * @property Collection|array<Link> $links;
 * @property Image $backdrop;
 * @property float $backdropFocalPoint;
 */
class LogEntry extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected MemberSummary $owner;
    protected FilmSummary $film;
    protected DiaryDetails $diaryDetails;
    protected Review $review;
    protected Collection $tags;
    protected Collection $tags2;
    protected Carbon $whenCreated;
    protected Carbon $whenUpdated;
    protected float $rating;
    protected bool $like;
    protected bool $commentable;
    protected string $commentPolicy;
    protected Collection $links;
    protected Image $backdrop;
    protected float $backdropFocalPoint;

    /**
     * @param MemberSummary|array $owner
     */
    public function setOwner(MemberSummary|array $owner)
    {
        $this->owner = is_array($owner) ? new MemberSummary($owner) : $owner;
    }

    /**
     * @param FilmSummary|array $film
     */
    public function setFilm(FilmSummary|array $film)
    {
        $this->film = is_array($film) ? new FilmSummary($film) : $film;
    }

    /**
     * @param DiaryDetails|array $diaryDetails
     */
    public function setDiaryDetails(DiaryDetails|array $diaryDetails)
    {
        $this->diaryDetails = is_array($diaryDetails) ? new DiaryDetails($diaryDetails) : $diaryDetails;
    }

    /**
     * @param Review|array $review
     */
    public function setReview(Review|array $review)
    {
        $this->review = is_array($review) ? new Review($review) : $review;
    }

    /**
     * @param Collection|array<string> $tags
     */
    protected function setTags(Collection|array $tags)
    {
        $this->tags = collect($tags);
    }

    /**
     * @param Collection|array<array|Tag> $tags2
     */
    protected function setTags2(Collection|array $tags2)
    {
        $this->tags2 = collect($tags2)->map(fn ($tag) => is_array($tag) ? new Tag($tag) : $tag);
    }

    /**
     * @param Carbon|string $whenCreated
     */
    protected function setWhenCreated(Carbon|string $whenCreated)
    {
        $this->whenCreated = is_string($whenCreated) ? Carbon::parse($whenCreated) : $whenCreated;
    }

    /**
     * @param Carbon|string $whenUpdated
     */
    protected function setWhenUpdated(Carbon|string $whenUpdated)
    {
        $this->whenCreated = is_string($whenUpdated) ? Carbon::parse($whenUpdated) : $whenUpdated;
    }

    /**
     * @param Collection|array<array|Link> $links
     */
    protected function setLinks(Collection|array $links)
    {
        $this->links = collect($links)->map(fn ($link) => is_array($link) ? new Link($link) : $link);
    }

    /**
     * @param Image|array $backdrop
     */
    public function setBackdrop(Image|array $backdrop)
    {
        $this->backdrop = is_array($backdrop) ? new Image($backdrop) : $backdrop;
    }
}
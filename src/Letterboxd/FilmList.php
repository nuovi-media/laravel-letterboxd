<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class FilmList
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id
 * @property string $name
 * @property int $filmCount
 * @property bool $published
 * @property bool $ranked
 * @property bool $hasEntriesWithNotes
 * @property string $descriptionLbml
 * @property Collection|array<Tag> $tags2
 * @property Collection|array<string> $canShareOn
 * @property Collection|array<string> $sharedOn
 * @property Carbon $whenCreated
 * @property Carbon $whenPublished
 * @property string $commentPolicy
 * @property MemberSummary $owner
 * @property Collection|array<ListEntrySummary> $previewEntries
 * @property Collection|array<Link> $links
 * @property Image $backdrop
 * @property float $backdropFocalPoint
 * @property string $description
 */
class FilmList extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected int $filmCount;
    protected bool $published;
    protected bool $ranked;
    protected bool $hasEntriesWithNotes;
    protected string $descriptionLbml;
    protected Collection $tags;
    protected Collection $tags2;
    protected Collection $canShareOn;
    protected Collection $sharedOn;
    protected Carbon $whenCreated;
    protected Carbon $whenPublished;
    protected string $commentPolicy;
    protected MemberSummary $owner;
    protected Collection $previewEntries;
    protected Collection $links;
    protected Image $backdrop;
    protected float $backdropFocalPoint;
    protected string $description;

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
     * @param Collection|array<string> $canShareOn
     */
    protected function setCanShareOn(Collection|array $canShareOn)
    {
        $this->canShareOn = collect($canShareOn);
    }

    /**
     * @param Collection|array<string> $sharedOn
     */
    protected function setSharedON(Collection|array $sharedOn)
    {
        $this->sharedOn = collect($sharedOn);
    }

    /**
     * @param Carbon|string $whenCreated
     */
    protected function setWhenCreated(Carbon|string $whenCreated)
    {
        $this->whenCreated = is_string($whenCreated) ? Carbon::parse($whenCreated) : $whenCreated;
    }

    /**
     * @param Carbon|string $whenPublished
     */
    protected function setWhenPublished(Carbon|string $whenPublished)
    {
        $this->whenPublished = is_string($whenPublished) ? Carbon::parse($whenPublished) : $whenPublished;
    }

    /**
     * @param MemberSummary|array $owner
     */
    public function setOwner(MemberSummary|array $owner)
    {
        $this->owner = is_array($owner) ? new MemberSummary($owner) : $owner;
    }

    /**
     * @param Collection|array<array|ListEntrySummary> $previewEntries
     */
    protected function setPreviewEntries(Collection|array $previewEntries)
    {
        $this->previewEntries = collect($previewEntries)->map(fn ($previewEntry) => is_array($previewEntry) ? new ListEntrySummary($previewEntry) : $previewEntry);
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
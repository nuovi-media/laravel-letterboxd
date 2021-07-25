<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Illuminate\Support\Collection;

/**
 * Class ListSummary
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $name;
 * @property int $filmCount;
 * @property bool $published;
 * @property bool $ranked;
 * @property string $descriptionLbml;
 * @property bool $descriptionTruncated;
 * @property MemberSummary $owner;
 * @property ListIdentifier $clonedFrom;
 * @property Collection|array<ListEntrySummary> $previewEntries;
 * @property Collection|array<AListEntryOccurrence> $entriesOfNote;
 * @property string $description;
 */
class ListSummary extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected int $filmCount;
    protected bool $published;
    protected bool $ranked;
    protected string $descriptionLbml;
    protected bool $descriptionTruncated;
    protected MemberSummary $owner;
    protected ListIdentifier $clonedFrom;
    protected Collection $previewEntries;
    protected Collection $entriesOfNote;
    protected string $description;

    /**
     * @param MemberSummary|array $owner
     */
    protected function setOwner(MemberSummary|array $owner)
    {
        $this->owner = is_array($owner) ? new MemberSummary($owner) : $owner;
    }

    /**
     * @param ListIdentifier|array $clonedFrom
     */
    protected function setClonedFrom(ListIdentifier|array $clonedFrom)
    {
        $this->clonedFrom = is_array($clonedFrom) ? new ListIdentifier($clonedFrom) : $clonedFrom;
    }

    /**
     * @param Collection|array<array|ListEntrySummary> $previewEntries
     */
    protected function setPreviewEntries(Collection|array $previewEntries)
    {
        $this->previewEntries = collect($previewEntries)->map(fn ($previewEntry) => is_array($previewEntry) ? new ListEntrySummary($previewEntry) : $previewEntry);
    }

    /**
     * @param Collection|array<array|AListEntryOccurrence> $entriesOfNote
     */
    protected function setEntriesOfNote(Collection|array $entriesOfNote)
    {
        $this->entriesOfNote = collect($entriesOfNote)->map(fn ($entryOfNote) => is_array($entryOfNote) ? new AListEntryOccurrence($entryOfNote) : $entryOfNote);
    }

}
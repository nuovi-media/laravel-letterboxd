<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

use Carbon\Carbon;

/**
 * Class DiaryEntryActivity
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $type
 * @property Carbon $whenCreated
 * @property MemberSummary $member
 * @property LogEntry $diaryEntry
 */
class DiaryEntryActivity extends AbstractActivity
{
    protected LogEntry $diaryEntry;

    /**
     * @param LogEntry|array $logEntry
     */
    protected function setLogEntry(LogEntry|array $logEntry)
    {
        $this->diaryEntry = is_array($logEntry) ? new LogEntry($logEntry) : $logEntry;
    }
}
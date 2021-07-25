<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

/**
 * Class DiaryDetails
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Carbon $diaryDate
 * @property bool $rewatch
 */
class DiaryDetails extends LetterboxdBaseElement
{
    protected Carbon $diaryDate;
    protected bool $rewatch;

    /**
     * @param Carbon|string $diaryDate
     */
    protected function setDiaryDate(Carbon|string $diaryDate)
    {
        $this->diaryDate = is_string($diaryDate) ? Carbon::parse($diaryDate) : $diaryDate;
    }
}
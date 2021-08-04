<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class ListUpdateResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property FilmList $data
 * @property Collection|array<ListUpdateMessage>
 */
class ListUpdateResponse extends LetterboxdBaseElement
{
    protected FilmList $data;
    protected Collection $messages;

    /**
     * @param FilFilmListm|array $film
     */
    protected function setData(FilmList|array $film)
    {
        $this->data = is_array($film) ? new FilmList($film) : $film;
    }

    /**
     * @param Collection|array<array|ListUpdateMessage> $messages
     */
    protected function setMessages(Collection|array $messages)
    {
        $this->messages = collect($messages)->map(fn ($message) => is_array($message) ? new ListUpdateMessage($message) : $message);
    }
}
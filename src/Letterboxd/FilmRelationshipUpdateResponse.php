<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class FilmRelationshipUpdateResponse
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property FilmRelationship $data
 * @property Collection|array<FilmRelationshipUpdateMessage> $messages
 */
class FilmRelationshipUpdateResponse extends LetterboxdBaseElement
{
    protected FilmRelationship $data;
    protected Collection $messages;

    /**
     * @param FilmRelationship|array $data
     */
    protected function setData(FilmRelationship|array $data)
    {
        $this->data = is_array($data) ? new FilmRelationship($data) : $data;
    }

    /**
     * @param Collection|array<array|FilmRelationshipUpdateMessage> $messages
     */
    protected function setMessages(Collection|array $messages)
    {
        $this->messages = collect($messages)->map(fn($messages) => is_array($messages) ? new FilmRelationshipUpdateMessage($messages) : $messages);
    }
}
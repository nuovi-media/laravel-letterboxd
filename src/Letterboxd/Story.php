<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Carbon\Carbon;

/**
 * Class Story
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $name;
 * @property string $source;
 * @property string $videoURL;
 * @property string $bodyHtml;
 * @property string $bodyLbml;
 * @property Carbon $whenUpdated;
 * @property Carbon $whenCreated;
 * @property Image $image;
 */
class Story extends LetterboxdBaseElement
{
    protected string $id;
    protected string $name;
    protected string $source;
    protected string $videoURL;
    protected string $bodyHtml;
    protected string $bodyLbml;
    protected Carbon $whenUpdated;
    protected Carbon $whenCreated;
    protected Image $image;

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
        $this->whenUpdated = is_string($whenUpdated) ? Carbon::parse($whenUpdated) : $whenUpdated;
    }

    /**
     * @param Image|array $image
     */
    protected function setImage(Image|array $image)
    {
        $this->image = is_array($image) ? new Image($image) : $image;
    }
}
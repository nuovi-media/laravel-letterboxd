<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class NewsItem
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $title;
 * @property Image $image;
 * @property string $url;
 * @property string $shortDescription;
 * @property string $longDescription;
 */
class NewsItem extends LetterboxdBaseElement
{
    protected string $title;
    protected Image $image;
    protected string $url;
    protected string $shortDescription;
    protected string $longDescription;

    /**
     * @param Image|array $image
     */
    protected function setImage(Image|array $image)
    {
        $this->image = is_array($image) ? new Image($image) : $image;
    }
}
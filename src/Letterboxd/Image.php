<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class Image
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property Collection|array<ImageSize> $sizes
 */
class Image extends LetterboxdBaseElement
{
    protected Collection $sizes;

    /**
     * @param Collection|array<array|ImageSize> $sizes
     */
    public function setSize(Collection|array $sizes)
    {
        $this->sizes = collect($sizes)->map(fn ($size) => is_array($size) ? new ImageSize($size) : $size);
    }
}
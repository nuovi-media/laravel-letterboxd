<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;

/**
 * Class Film
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $name;
 * @property string $originalName;
 * @property Collection|array<string> $alternativeNames;
 * @property int $releaseYear;
 * @property Collection|array<ContributorSummary> $directors;
 * @property Image $poster;
 * @property Image $adultPoster;
 * @property bool $adult;
 * @property string $filmCollectionId;
 * @property Collection|array<Link> $links;
 * @property MemberFilmRelationship $relationship;
 * @property string $tagline;
 * @property string $description;
 * @property int $runTime;
 * @property Image $backDrop;
 * @property float $backdropFocalPoint;
 * @property FilmTrailer $trailer;
 * @property Collection|array<Genre> $genres;
 * @property Collection|array<Country> $countries;
 * @property Collection|array<Language> $languages;
 * @property Collection|array<FilmContributions> $contributions;
 * @property Collection|array<NewsItem> $news;
 * @property Collection|array<Story> $recentStories;
 */
class Film extends FilmSummary
{
    protected string $tagline;
    protected string $description;
    protected int $runTime;
    protected Image $backDrop;
    protected float $backdropFocalPoint;
    protected FilmTrailer $trailer;
    protected Collection $genres;
    protected Collection $countries;
    protected Collection $languages;
    protected Collection $contributions;
    protected Collection $news;
    protected Collection $recentStories;

    /**
     * @param Image|array $backDrop
     */
    protected function setBackDrop(Image|array $backDrop)
    {
        $this->backDrop = is_array($backDrop) ? new Image($backDrop) : $backDrop;
    }

    /**
     * @param FilmTrailer|array $trailer
     */
    protected function setTrailer(FilmTrailer|array $trailer)
    {
        $this->trailer = is_array($trailer) ? new FilmTrailer($trailer) : $trailer;
    }

    /**
     * @param Collection|array<array|Genre> $genres
     */
    protected function setGenres(Collection|array $genres)
    {
        $this->genres = collect($genres)->map(fn ($genre) => is_array($genre) ? new Genre($genre) : $genre);
    }

    /**
     * @param Collection|array<array|Country> $countries
     */
    protected function setCountries(Collection|array $countries)
    {
        $this->countries = collect($countries)->map(fn ($country) => is_array($country) ? new Country($country) : $country);
    }

    /**
     * @param Collection|array<array|Language> $languages
     */
    protected function setLanguages(Collection|array $languages)
    {
        $this->languages = collect($languages)->map(fn ($language) => is_array($language) ? new Language($language) : $language);
    }

    /**
     * @param Collection|array<array|FilmContributions> $contributions
     */
    protected function setContributions(Collection|array $contributions)
    {
        $this->contributions = collect($contributions)->map(fn ($contribution) => is_array($contribution) ? new FilmContributions($contribution) : $contribution);
    }

    /**
     * @param Collection|array<array|NewsItem> $news
     */
    protected function setNews(Collection|array $news)
    {
        $this->news = collect($news)->map(fn ($newsItem) => is_array($newsItem) ? new NewsItem($newsItem) : $newsItem);
    }

    /**
     * @param Collection|array<array|Story> $recentStories
     */
    protected function setRecentStories(Collection|array $recentStories)
    {
        $this->recentStories = collect($recentStories)->map(fn ($story) => is_array($story) ? new Story($story) : $story);
    }
}
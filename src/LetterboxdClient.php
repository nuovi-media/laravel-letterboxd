<?php

namespace NuoviMedia\LetterboxdClient;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use NuoviMedia\LetterboxdClient\Letterboxd\CountriesResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\Film;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmAvailabilityResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmList;
use NuoviMedia\LetterboxdClient\Letterboxd\ListsResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmRelationship;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmServicesResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmsResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmStatistics;
use NuoviMedia\LetterboxdClient\Letterboxd\GenresResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\LanguagesResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\LetterboxdBaseElement;
use NuoviMedia\LetterboxdClient\Letterboxd\ListUpdateRequest;
use NuoviMedia\LetterboxdClient\Letterboxd\ListUpdateResponse;
use NuoviMedia\LetterboxdClient\Letterboxd\MemberFilmRelationship;
use NuoviMedia\LetterboxdClient\Letterboxd\MemberAccount;
use NuoviMedia\LetterboxdClient\Letterboxd\SearchResponse;

class LetterboxdClient
{
    private const BASE_ENDPOINT = 'https://api.letterboxd.com/api/v0/';
    private string $access_token, $refresh_token;
    private Carbon $token_expires_on;

    /**
     * @throws HttpClientException
     */
    public function __construct()
    {
        # ...
    }

    /**
     * Get Me
     *
     * @return MemberAccount
     * @throws HttpClientException
     * @throws Exception
     */
    public function getMe(): MemberAccount
    {
        $response = $this->signedRequest('GET', 'me', auth: true);

        if ($response->status() === 200) {
            return new MemberAccount(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * A cursored window over the list of films.
     * Use the ‘next’ cursor to move through the list. The response will include the film relationships for
     * the signed-in member and the member indicated by the member LID if specified
     *
     * @param array $params
     *     $params = [
     *         'cursor'               => (string) The pagination cursor
     *         'perPage'              => (int) The number of items to include per page (default 20, max 100)
     *         'filmId'               => (string[]) Up to 100 Letterboxd IDs or TMDB IDs (prefixed with 'tmdb:') or
     *                                   IMDB IDs (prefixed with 'imdb:')
     *         'genre'                => (string) LID of a genre to filter the list
     *         'includeGenre'         => (string[]) Up to 100 genres to filter the list
     *         'includeGenre'         => (string[]) Up to 100 genres to exclude filtering the list
     *         'country'              => (string) The ISO 639-1 defined code of the production country to filter the list.
     *         'language'             => (string) The ISO 639-1 defined code of the language to filter the list.
     *         'decade'               => (int) Release decade starting year (must end in 0)
     *         'year'                 => (int) Release year
     *         'service'              => (string) ID of a supported service to filter the film to those available in that service.
     *         'where'                => (string[]) One or more values to limit the list of films accordingly.
     *                                   Supported values: Released, NotReleased, InWatchlist, NotInWatchlist, Logged,
     *                                   NotLogged, Reviewed, NotReviewed, Owned, NotOwned, Rated, NotRated, Liked,
     *                                   NotLiked, WatchedFromWatchlist, Watched, NotWatched, FeatureLength,
     *                                   NotFeatureLength, Fiction, Film, TV
     *         'member'               => LID of a member to limit the returned films according to the value set in
     *                                   memberRelationship or to access the MemberRating sort options.
     *         'memberRelationship'   => (string) Must be used with `member`. Specifies the type of relationship to filter
     *                                   the list. Use `Ignore` if you only intend to specify the member for use with
     *                                   sort=MemberRating (default: Watched)
     *                                   Accepted values: Ignore, Watched, NotWatched, Liked, NotLiked, Rated,
     *                                   NotRated, InWatchlist, NotInWatchlist, Favorited
     *         'includeFriends'       => (string) Must be used with `member`. `None` only returns films from member
     *                                   account, `Only` returns films from the member friends and `All` returns both.
     *                                   (default: None)
     *                                   Accepted values: None, All, Only
     *         'tagCode'              => (string) A tag code to filter the list
     *         'tagger'               => (string) Must ve used with tagCode. LID of a member to focus the tag filter
     *                                   on the member
     *         'includeTaggerFriends' => Must be used with tagger. `None` filters tags set by the member. `Only` filters
     *                                   tags set by the member’s friends, and `All` filters tags set by both.
     *                                   Accepted values: None, All, Only
     *         'sort'                 => (string) Sorting order. Refer to http://api-docs.letterboxd.com/#path--films
     *                                   (default: FilmPopularity)
     *                                   Accepted values: FilmName, DateLatestFirst, DateEarliestFirst,
     *                                   ReleaseDateLatestFirst, ReleaseDateEarliestFirst,
     *                                   AuthenticatedMemberRatingHighToLow, AuthenticatedMemberRatingLowToHigh,
     *                                   MemberRatingHighToLow, MemberRatingLowToHigh, AverageRatingHighToLow,
     *                                   AverageRatingLowToHigh, RatingHighToLow, RatingLowToHigh,
     *                                   FilmDurationShortestFirst, FilmDurationLongestFirst, FilmPopularity,
     *                                   FilmPopularityThis{Week,Month,Year},
     *                                   FilmPopularityWithFriends, FilmPopularityWithFriendsThis{Week,Month,Year}
     *     ]
     * @param bool $auth
     * 
     * @return FilmsResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilms(array $params = [], ?bool $includeMyRelationship = false): FilmsResponse
    {
        $response = $this->signedRequest('GET', 'films', query: $params, auth: $includeMyRelationship);

        if ($response->status() === 200) {
            return new FilmsResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get a list of countries supported by the /films endpoint.
     * Countries are returned in alphabetical order.
     *
     * @return CountriesResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmsCountries(): CountriesResponse
    {
        $response = $this->signedRequest('GET', 'films/countries');

        if ($response->status() === 200) {
            return new CountriesResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get a list of services supported by the /films endpoint.
     * Services are returned in logical order. Some services (including ‘My Services’ options) are only available to
     * paying members, so results will vary based on the authenticated member’s status.
     *
     * @return FilmServicesResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmsServices(): FilmServicesResponse
    {
        $response = $this->signedRequest('GET', 'films/film-services');

        if ($response->status() === 200) {
            return new FilmServicesResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get a list of genres supported by the /films endpoint.
     * Genres are returned in alphabetical order.
     *
     * @return GenresResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmsGenres(): GenresResponse
    {
        $response = $this->signedRequest('GET', 'films/genres');

        if ($response->status() === 200) {
            return new GenresResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get a list of languages supported by the /films endpoint.
     * Languages are returned in alphabetical order.
     *
     * @return LanguagesResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmsLanguages(): LanguagesResponse
    {
        $response = $this->signedRequest('GET', 'films/genres');

        if ($response->status() === 200) {
            return new LanguagesResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * @param string $id The LID of the film
     * @return Film
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilm(string $id): Film
    {
        $response = $this->signedRequest('GET', "film/{$id}");

        if ($response->status() === 200) {
            return new Film(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get availability data for a film by ID. Only available to first-party API clients.
     *
     * @param string $id The LID of the film
     * @return FilmAvailabilityResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmAvailability(string $id): FilmAvailabilityResponse
    {
        $response = $this->signedRequest('GET', "film/{$id}/availability");

        if ($response->status() === 200) {
            return new FilmAvailabilityResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get details of the authenticated member’s relationship with a film by ID.
     *
     * @param string $id The LID of the film
     * @return FilmRelationship
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmMe(string $id): FilmRelationship
    {
        $response = $this->signedRequest('GET', "film/{$id}/me", auth: true);

        if ($response->status() === 200) {
            return new FilmRelationship(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get details of members’ relationships with a film by ID.
     *
     * @param string $id The LID of the film
     * @param array $params
     *     $params = [
     *         'cursor'              => (string) The pagination cursor
     *         'perPage'             => (int) The number of items to include per page (default 20, max 100)
     *         'sort'                => (string) Sorting order. Defaults to date,
     *                                  refer to http://api-docs.letterboxd.com/#path--film--id--members
     *                                  Accepted values: Date, Name, MemberPopularity, MemberPopularityThis{Week,Month,Year}
     *                                  MemberPopularityWithFriends, MemberPopularityWithFriendsThis{Week,Month,Year}
     *          'member'             => (string) LID of a member to return members who followed or are followed by them
     *          'memberRelationship' => (string) Must be used in conjunction with `member` (default: isFollowing)
     *                                  Accepted values: IsFollowing, IsFollowedBy
     *          'filmRelationship    => (string) Specify the type of relationship to limit the returned members
     *                                  accordingly (default: Watched)
     *                                  Accepted values: Ignore, Watched, NotWatched, Liked, NotLiked, Rated, NotRated,
     *                                  InWatchList, NotInWatchList, Favorited
     *     ]
     * @return MemberFilmRelationship
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmMembers(string $id, array $params = []): MemberFilmRelationship
    {
        $response = $this->signedRequest('GET', "film/{$id}/availability", query: $params);

        if ($response->status() === 200) {
            return new MemberFilmRelationship(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get statistical data about a film by ID.
     *
     * @param string $id The LID of the film
     * @return FilmStatistics()
     * @throws HttpClientException
     * @throws Exception
     */
    public function getFilmStatistics(string $id): FilmStatistics
    {
        $response = $this->signedRequest('GET', "film/{$id}/statistics");

        if ($response->status() === 200) {
            return new FilmStatistics(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     *
     * @param array $params
     *     $params = [
     *         'cursor'               => (string) The pagination cursor
     *         'perPage'              => (int) The number of items to include per page (default 20, max 100)
     *         'filmId'               => (string[]) Up to 100 Letterboxd IDs or TMDB IDs (prefixed with 'tmdb:') or
     *                                   IMDB IDs (prefixed with 'imdb:')
     *         'genre'                => (string) LID of a genre to filter the list
     *         'includeGenre'         => (string[]) Up to 100 genres to filter the list
     *         'includeGenre'         => (string[]) Up to 100 genres to exclude filtering the list
     *         'country'              => (string) The ISO 639-1 defined code of the production country to filter the list.
     *         'language'             => (string) The ISO 639-1 defined code of the language to filter the list.
     *         'decade'               => (int) Release decade starting year (must end in 0)
     *         'year'                 => (int) Release year
     *         'service'              => (string) ID of a supported service to filter the film to those available in that service.
     *         'where'                => (string[]) One or more values to limit the list of films accordingly.
     *                                   Supported values: Released, NotReleased, InWatchlist, NotInWatchlist, Logged,
     *                                   NotLogged, Reviewed, NotReviewed, Owned, NotOwned, Rated, NotRated, Liked,
     *                                   NotLiked, WatchedFromWatchlist, Watched, NotWatched, FeatureLength,
     *                                   NotFeatureLength, Fiction, Film, TV
     *         'member'               => LID of a member to limit the returned films according to the value set in
     *                                   memberRelationship or to access the MemberRating sort options.
     *         'memberRelationship'   => (string) Must be used with `member`. Specifies the type of relationship to filter
     *                                   the list. Use `Ignore` if you only intend to specify the member for use with
     *                                   sort=MemberRating (default: Watched)
     *                                   Accepted values: Ignore, Watched, NotWatched, Liked, NotLiked, Rated,
     *                                   NotRated, InWatchlist, NotInWatchlist, Favorited
     *         'includeFriends'       => (string) Must be used with `member`. `None` only returns films from member
     *                                   account, `Only` returns films from the member friends and `All` returns both.
     *                                   (default: None)
     *                                   Accepted values: None, All, Only
     *         'tagCode'              => (string) A tag code to filter the list
     *         'tagger'               => (string) Must ve used with tagCode. LID of a member to focus the tag filter
     *                                   on the member
     *         'includeTaggerFriends' => Must be used with tagger. `None` filters tags set by the member. `Only` filters
     *                                   tags set by the member’s friends, and `All` filters tags set by both.
     *                                   Accepted values: None, All, Only
     *         'sort'                 => (string) Sorting order. Refer to http://api-docs.letterboxd.com/#path--films
     *                                   (default: FilmPopularity)
     *                                   Accepted values: FilmName, DateLatestFirst, DateEarliestFirst,
     *                                   ReleaseDateLatestFirst, ReleaseDateEarliestFirst,
     *                                   AuthenticatedMemberRatingHighToLow, AuthenticatedMemberRatingLowToHigh,
     *                                   MemberRatingHighToLow, MemberRatingLowToHigh, AverageRatingHighToLow,
     *                                   AverageRatingLowToHigh, RatingHighToLow, RatingLowToHigh,
     *                                   FilmDurationShortestFirst, FilmDurationLongestFirst, FilmPopularity,
     *                                   FilmPopularityThis{Week,Month,Year},
     *                                   FilmPopularityWithFriends, FilmPopularityWithFriendsThis{Week,Month,Year}
     *     ]
     * @return ListsResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function getLists(array $params): ListsResponse
    {
        $response = $this->signedRequest('GET', "lists", query: $params);

        if ($response->status() === 200) {
            return new ListsResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Get details of a list by ID.
     *
     * @param string $id The LID of the list
     * @return FilmList
     * @throws HttpClientException
     * @throws Exception
     */
    public function getList(string $id): FilmList
    {
        $response = $this->signedRequest('GET', "list/{$id}");

        if ($response->status() === 200) {
            return new FilmList(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Update a list by ID.
     *
     * @param string $id The LID of the list.
     * @param ListUpdateRequest $data Update request
     * @return ListUpdateResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function patchList(string $id, ListUpdateRequest $data): ListUpdateResponse
    {
        $response = $this->signedRequest('PATCH', "list/{$id}", data: $data, auth: true);

        if ($response->status() === 200) {
            return new ListUpdateResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Delete a list by ID.
     *
     * @param string $id The LID of the list.
     * @return bool false if not found
     * @throws HttpClientException
     * @throws Exception
     */
    public function deleteList(string $id): bool
    {
        $response = $this->signedRequest('DELETE', "list/{$id}", auth: true);

        if ($response->status() === 200) {
            return true;
        } elseif ($response->status() === 404) {
            return false;
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * @param array $params
     *     $params = [
     *         'cursor'               => (string) The pagination cursor
     *         'perPage'              => (int) The number of items to include per page (default 20, max 100)
     *         'input'                => (string) (REQUIRED) The word, partial word or phrase to search for.  
     *         'searchMethod'         => The type of search to perform. Defaults to FullText, which performs a standard
     *                                   search considering text in all fields. Autocomplete only searches primary fields.
     *         'include'              => The types of results to search for. Default to all SearchResultTypes.
     *                                   Supported values: ContributorSearchItem, FilmSearchItem, ListSearchItem, MemberSearchItem,
     *                                   ReviewSearchItem, TagSearchItem.
     *         'contributionType'     => The type of contributor to search for. Implies "include=ContributorSearchItem".
     *                                   Supported values: Director, CoDirector, Actor, Producer, Writer, Editor, Cinematography, ProductionDesign,
     *                                   ArtDirection, SetDecoration, VisualEffects, Composer, Sound, Costumes, MakeUp, Studio.
     *         'adult'                => Whether to include adult content in search results. Default to false.
     *     ]
     * @return SearchResponse
     * @throws HttpClientException
     * @throws Exception
     */
    public function search(array $params): SearchResponse
    {
        $response = $this->signedRequest('GET', "search", query: $params);

        if ($response->status() === 200) {
            return new SearchResponse(json_decode($response->body(), true));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Executes a signed API request
     * @param string $method
     * @param string $endpoint
     * @param array|null $query
     * @param LetterboxdBaseElement|array|null $data
     * @param bool $auth
     * @return Response
     * @throws Exception
     */
    private function signedRequest(string $method, string $endpoint, ?array $query = null, LetterboxdBaseElement|array|null $data = null, bool $auth = false): Response
    {
        // Required signature fields
        $query = array_merge($query ?? [], [
            'apikey'    => Config::get('letterboxd.key'),
            'nonce'     => (string)Str::uuid(),
            'timestamp' => time(),
        ]);

        // URI without signature
        $uri = self::BASE_ENDPOINT . $endpoint . '?' . http_build_query($query);

        // Signature
        $signature = $this->getSignature(Str::upper($method), $uri, $data ? json_encode(is_array($data) ? $data : $data->toArray()) : '');
        $query = array_merge($query ?? [], [
            'signature' => $signature,
        ]);

        // Options array for Http::send
        $options = [
            'query' => $query,
            'body'  => $data ? json_encode($data) : null,
        ];

        $http = new Factory();

        if ($auth) {
            $this->authenticate();
            $http = $http->withToken($this->access_token);
        }

        if($data) {
            $http = $http->contentType('application/json');
        }

        return $http->accept('application/json')->send($method, self::BASE_ENDPOINT . $endpoint, $options);
    }

    /**
     * Authenticates on Letterboxd
     * @throws HttpClientException
     */
    private function authenticate(): void
    {
        if ($this->isTokenExpired()) {
            $body = [
                'grant_type' => 'password',
                'username'   => Config::get('letterboxd.username'),
                'password'   => Config::get('letterboxd.password'),
            ];
        } else {
            $body = [
                'grant_type'    => 'refresh_token',
                'refresh_token' => $this->refresh_token,
            ];
        }
        $query = [
            'apikey'    => Config::get('letterboxd.key'),
            'nonce'     => (string)Str::uuid(),
            'timestamp' => time(),
        ];

        $uri = $this->getSignedUri('POST', self::BASE_ENDPOINT . 'auth/token?' . http_build_query($query), http_build_query($body));
        $response = Http::asForm()->acceptJson()->post($uri, $body);

        if ($response->status() === 200) {
            $this->access_token = $response['access_token'];
            $this->refresh_token = $response['refresh_token'];
            $this->token_expires_on = Carbon::now()->addSeconds($response['expires_in']);
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Checks if the token is expired
     * @return bool
     */
    private function isTokenExpired(): bool
    {
        if ($this->token_expires_on ?? false) {
            return Carbon::now()->gt($this->token_expires_on->subSeconds(10));
        } else {
            return true;
        }
    }

    /**
     * Gets a request signature
     * @param string $method
     * @param string $uri
     * @param string|null $body
     * @return string
     */
    private function getSignature(string $method, string $uri, ?string $body): string
    {
        $data = $method . "\0" . $uri . "\0" . ($body ?: '');
        return hash_hmac('sha256', $data, Config::get('letterboxd.secret'));
    }

    /**
     * Gets a signed URI
     *
     * @param string $method
     * @param string $uri
     * @param ?string $body
     * @return string
     */
    private function getSignedUri(string $method, string $uri, ?string $body): string
    {
        $data = $method . "\0" . $uri . "\0" . ($body ?: '');
        $signature = hash_hmac('sha256', $data, Config::get('letterboxd.secret'));
        return "$uri&signature={$signature}";
    }

    /**
     * Keeps making requests over pagination up to set limits
     *
     * @param string $command
     * @param ?array $params
     * @param ?int $perPage
     * @param ?int $limit
     * @param ?int $pageLimit
     * @return string
     */
    public function paginateRequest($command, ?array $params = [], ?int $perPage = 100, ?int $limit = 1000000000, ?int $pageLimit = 0) {
        $limit = $pageLimit ? $pageLimit * $perPage : $limit;

        $items = collect();
        $params["perPage"] = $perPage > $limit ? $limit : $perPage;
        $params["cursor"] = "";

        while(is_string($params["cursor"]) && $items->count() < $limit) {
            $response = $this->$command($params);

            $items = $items->merge($response->items);

            $params["perPage"] = $items->count() > $limit ? $limit % $perPage : $perPage;
            $params["cursor"] = $response?->next;
        }

        return $items;
    }
}

<?php

namespace NuoviMedia\LetterboxdClient;

use Carbon\Carbon;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;
use NuoviMedia\LetterboxdClient\Letterboxd\FilmsResponse;

class LetterboxdClient
{
    private const BASE_ENDPOINT = 'https://api.letterboxd.com/api/v0/';
    private string $access_token, $refresh_token;
    private Carbon $token_expires_on;

    /**
     * @throws HttpClientException
     */
    #[NoReturn]
    public function __construct()
    {
        $this->authenticate();
    }

    /**
     * @param array $params
     * @return FilmsResponse
     * @throws HttpClientException
     */
    public function films(array $params = []): FilmsResponse
    {
        $response = $this->signedRequest('GET', 'films', query: $params);

        if($response->status() === 200) {
            return new FilmsResponse(json_decode($response->body()));
        } else {
            throw new HttpClientException($response->body(), $response->status());
        }
    }

    /**
     * Executes a signed API request
     * @param string $method
     * @param string $endpoint
     * @param array|null $query
     * @param array|null $data
     * @return Response
     */
    private function signedRequest(string $method, string $endpoint, ?array $query = null, ?array $data = null): Response
    {
        // Required signature fields
        $query = array_merge($query, [
            'apikey'    => Config::get('letterboxd.key'),
            'nonce'     => (string)Str::uuid(),
            'timestamp' => time(),
        ]);

        // URI without signature
        $uri = self::BASE_ENDPOINT . $endpoint . '?' . http_build_query($query);

        // Signature
        $signature = $this->getSignature(Str::upper($method), $uri, json_encode($data));
        $query = array_merge($query, [
            'signature' => $signature,
        ]);

        // Options array for Http::send
        $options = [
            'query' => $query,
            'body'  => $data,
        ];

        return Http::send($method, self::BASE_ENDPOINT . $endpoint, $options);
    }

    /**
     * Authenticates on Letterboxd
     * @param bool $refresh
     * @throws HttpClientException
     */
    #[NoReturn]
    private function authenticate(bool $refresh = false): void
    {
        if ($refresh and !$this->isTokenExpired()) {
            $body = [
                'grant_type'    => 'refresh_token',
                'refresh_token' => $this->refresh_token,
            ];
        } else {
            $body = [
                'grant_type' => 'password',
                'username'   => Config::get('letterboxd.username'),
                'password'   => Config::get('letterboxd.password'),
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
        if ($this->token_expires_on) {
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
}

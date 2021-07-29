<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use JsonSerializable;

abstract class LetterboxdBaseElement implements JsonSerializable
{
    private array $keys = [];

    // General constructor
    public function __construct(array $element)
    {
        // Automated setting
        foreach ($element as $key => $value) {
            $this->{'set' . ucfirst($key)}($value);
        }

        // List of of used keys
        $this->keys = array_keys($element);
    }

    // Automated getters and setters
    public function __call($method, $params)
    {

        $var = lcfirst(substr($method, 3));

        if (strncasecmp($method, "get", 3) === 0) {
            return $this->$var ?? null;
        }
        if (strncasecmp($method, "set", 3) === 0) {
            $this->$var = $params[0];
        }
        return null;
    }

    public function __get($name)
    {
        return $this->{'get' . ucfirst($name)}();
    }

    public function __set($name, $value)
    {
        return $this->{'set' . ucfirst($name)}($value);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toJson(): string
    {
        return json_encode($this);
    }

    public function toArray(): array
    {
        $arrayRepresentation = [];
        foreach ($this->keys as $key) {
            $arrayRepresentation[$key] = is_object($this->$key) ? $this->$key?->toArray() : $this->$key;
        }
        return $arrayRepresentation;
    }
}

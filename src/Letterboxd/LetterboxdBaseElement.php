<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


class LetterboxdBaseElement
{
    // General constructor
    public function __construct(array $element)
    {
        // Automated setting
        foreach($element as $key => $value) {
            ${'set' . ucfirst($key)}($value);
        }
    }

    // Automated getters and setters
    public function __call($method, $params) {

        $var = lcfirst(substr($method, 3));

        if (strncasecmp($method, "get", 3) === 0) {
            return $this->$var;
        }
        if (strncasecmp($method, "set", 3) === 0) {
            $this->$var = $params[0];
        }
    }

    public function __get($name)
    {
        return $this->${'get' . ucfirst($name)}();
    }

    public function __set($name, $value)
    {
        return $this->${'set' . ucfirst($name)}($value);
    }
}
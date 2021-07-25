<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


/**
 * Class MemberRelationship
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property bool $following;
 * @property bool $followedBy;
 * @property bool $blocking;
 * @property bool $blockedBy;
 */
class MemberRelationship extends LetterboxdBaseElement
{
    protected bool $following;
    protected bool $followedBy;
    protected bool $blocking;
    protected bool $blockedBy;
}
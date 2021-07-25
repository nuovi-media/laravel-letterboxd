<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;

/**
 * Class MemberSummary
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $id;
 * @property string $username;
 * @property string $givenName;
 * @property string $familyName;
 * @property string $displayName;
 * @property string $shortName;
 * @property Pronoun $pronoun;
 * @property Image $avatar;
 * @property string $memberStatus;
 * @property bool $hideAdsInContent;
 * @property string $commentPolicy;
 * @property string $accountStatus;
 * @property bool $hideAds;
 */
class MemberSummary extends LetterboxdBaseElement
{
    protected string $id;
    protected string $username;
    protected string $givenName;
    protected string $familyName;
    protected string $displayName;
    protected string $shortName;
    protected Pronoun $pronoun;
    protected Image $avatar;
    protected string $memberStatus;
    protected bool $hideAdsInContent;
    protected string $commentPolicy;
    protected string $accountStatus;
    protected bool $hideAds;


    public function setPronoun(Pronoun|array $pronoun)
    {
        $this->pronoun = is_array($pronoun) ? new Pronoun($pronoun) : $pronoun;
    }

    public function setAvatar(Image|array $avatar)
    {
        $this->avatar = is_array($avatar) ? new Image($avatar) : $avatar;
    }
}
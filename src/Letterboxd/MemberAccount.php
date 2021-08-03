<?php


namespace NuoviMedia\LetterboxdClient\Letterboxd;


use Illuminate\Support\Collection;




/**
 * Class MemberAccount
 * @package NuoviMedia\LetterboxdClient\Letterboxd
 *
 * @property string $emailAddress 										The member’s email address.
 * @property bool $emailAddressValidated 							Will be true if the member has validated their emailAddress via an emailed link.
 * @property bool $privateAccount 									Defaults to false for new accounts. Indicates whether the member has elected for their content to appear in the API (other than in the /me endpoint).
 * @property bool $includeInPeopleSection 							Defaults to true for new accounts. Indicates whether the member has elected to appear in the People section of the Letterboxd website.
 * @property bool $emailWhenFollowed 								Defaults to true for new accounts. Indicates whether the member has elected to receive an email notification when another member follows them.
 * @property bool $emailAvailability 								Defaults to true for new accounts. Indicates whether the member has elected to receive an email notification when films on their watchlist become available to stream on one of their favorite services.
 * @property bool $emailBuyAvailability 								Defaults to true for new accounts. Indicates whether the member has elected to receive an email notification when films on their watchlist become available to buy on one of their favorite services.
 * @property bool $emailRentAvailability 							Defaults to true for new accounts. Indicates whether the member has elected to receive an email notification when films on their watchlist become available to rent on one of their favorite services.
 * @property bool $emailComments 									Defaults to true for new accounts. Indicates whether the member has elected to receive email notifications when new comments are posted in threads they are subscribed to.
 * @property bool $emailNews 										Defaults to true for new accounts. Indicates whether the member has elected to receive regular email news (including ‘Call Sheet’) from Letterboxd.
 * @property bool $emailRushes 										Defaults to true for new accounts. Indicates whether the member has elected to receive a weekly email digest of new and popular content (called ‘Rushes’).
 * @property bool $emailPartnerMessages 								Defaults to true for new accounts. Indicates whether the member has elected to receive offers from trusted partners via Letterboxd.
 * @property Collection|array<string> $devicesRegisteredForPushNotifications		The list of device IDs that may receive push notifications for this account.
 * @property bool $pushNotificationsForGeneralAnnouncements 			Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications for platform and account alerts.
 * @property bool $pushNotificationsForPartnerMessages 				Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications with offers from trusted partners.
 * @property bool $pushNotificationsForComments 						Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when new comments are posted in threads they are subscribed to.
 * @property bool $pushNotificationsForListLikes 					Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when another member likes one of their lists.
 * @property bool $pushNotificationsForReviewLikes 					Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when another member likes one of their reviews.
 * @property bool $pushNotificationsForNewFollowers 					Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when another member follows them.
 * @property bool $pushNotificationsForAvailability 					Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when films on a members watchlist become available to stream on one of their favorite services.
 * @property bool $pushNotificationsForBuyAvailability 				Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when films on a members watchlist become available to buy on one of their favorite services.
 * @property bool $pushNotificationsForRentAvailability 				Defaults to true for new accounts. Indicates whether the member has elected to receive push notifications when films on a members watchlist become available to rent on one of their favorite services.
 * @property bool $canComment 										Defaults to false for new accounts. Indicates whether the member has commenting privileges. Commenting is disabled on new accounts until the member’s emailAddress is validated. At present canComment is synonymous with emailAddressValidated (unless the member is suspended) but this may change in future.
 * @property bool $suspended 										Indicates whether the member is suspended from commenting due to a breach of the Community Policy.
 * @property bool $canCloneLists 									Indicates whether the member is able to clone other members’ lists. Determined by Letterboxd based upon memberStatus.
 * @property bool $canFilterActivity 								Indicates whether the member is able to filter activity by type. Determined by Letterboxd based upon memberStatus.
 * @property integer $membershipDaysRemaining 							The number of days the member has left in their subscription. Only returned for paying members.
 * @property bool $membershipWillAutoRenewViaIAP 					Indicates whether the member’s subscription is expected to auto-renew via Apple’s IAP subscription. Only returned for members who have subscribed through IAP.
 * @property bool $hasActiveSubscription 							Indicates whether the member has an active subscription that will auto-renew. Will return false for members who did subscribe and then set their subscription to no longer renew, even if the original subscription period has not yet expired.
 * @property string $subscriptionType 									Indicates the member’s subscription type, possible values are apple or paddle. Only returned for members who have an active subscription.
 * @property Member $member 											Standard member details.
 * @property Collection|array<string> $campaigns 									The list of campaigns this account is involved in.
 * @property Collection|array<string> $adultContentPolicy 									The member’s adult content policy determing whether or not they see adult content. Supported options are Always or Default. Default means never show adult content.
 * @property Collection|array<string> $commentPolicy 										The member’s default policy determing who can post comments to their content. Supported options are Anyone, Friends and You. You in this context refers to the content owner. Use the commentThreadState property of the ListRelationship to determine the signed-in member’s ability to comment (or not).
 * @property Collection|array<string> $accountStatus 										The member’s account status.
 * @property bool $hideAds 											true if member should not be shown ads.
 * 
 */
class MemberAccount extends LetterboxdBaseElement
{
    protected string $emailAddress;
    protected bool $emailAddressValidated;
    protected bool $privateAccount;
    protected bool $includeInPeopleSection;
    protected bool $privateWatchlist;
    protected bool $emailWhenFollowed;
    protected bool $emailAvailability;
    protected bool $emailBuyAvailability;
    protected bool $emailRentAvailability;
    protected bool $emailComments;
    protected bool $emailNews;
    protected bool $emailRushes;
    protected bool $emailPartnerMessages;
    protected array $devicesRegisteredForPushNotifications;
    protected bool $pushNotificationsForGeneralAnnouncements;
    protected bool $pushNotificationsForPartnerMessages;
    protected bool $pushNotificationsForComments;
    protected bool $pushNotificationsForListLikes;
    protected bool $pushNotificationsForReviewLikes;
    protected bool $pushNotificationsForNewFollowers;
    protected bool $pushNotificationsForAvailability;
    protected bool $pushNotificationsForBuyAvailability;
    protected bool $pushNotificationsForRentAvailability;
    protected bool $canComment;
    protected bool $suspended;
    protected bool $canCloneLists;
    protected bool $canFilterActivity;
    protected int $membershipDaysRemaining;
    protected bool $membershipWillAutoRenewViaIAP;
    protected bool $hasActiveSubscription;
    protected string $subscriptionType;
    protected Member $member;
    protected array $campaigns;
    protected array $adultContentPolicy;
    protected array $commentPolicy;
    protected array $accountStatus;
    protected bool $hideAds;

    /**
     * @param Member|array $member
     */
    protected function setMember($member)
    {
        $this->member = new Member($member);
    }
}
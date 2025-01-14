<?php

namespace Aoxiang\QqMicroApp;

use Doctrine\Common\Cache\Cache;
use Aoxiang\Foundation\Foundation;

/**
 * Class TtMicroApp
 * @package Aoxiang\TtMicroApp
 *
 * @property-read AccessToken $access_token
 * @property-read HttpClient $http
 * @property-read Auth $auth
 * @property-read QrCode $qr_code
 * @property-read Storage $storage
 * @property-read TempMsg $temp_msg
 * @property-read SubscriptionMsg $subscription_msg
 * @property-read ContentSecurity $content_security
 * @property-read Decrypt $decrypt
 * @property-read Payment $payment
 * @property-read Cache $cache
 */
class QqMicroApp extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

    public function getAppId()
    {
        return $this->getConfig('access_key');
    }

    public function getAppSecret()
    {
        return $this->getConfig('secret_key');
    }

    public function getMchId()
    {
        return $this->getConfig('mch_id');
    }

    public function getMchKey()
    {
        return $this->getConfig('mch_key');
    }

}
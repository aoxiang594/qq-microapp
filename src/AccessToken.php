<?php


namespace Aoxiang\EasyQQ;


use Aoxiang\Foundation\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{
    protected $tokenJsonKey = 'access_token';

    protected $expiresJsonKey = 'expires_in';

    /**
     * 从服务端获取 access token
     * @return mixed|void
     * @throws \Aoxiang\Foundation\Exception\HttpException
     */
    public function getTokenFromServer()
    {
        return json_decode((string)$this->app->http->get('https://api.q.qq.com/api/getToken', [
            'appid' => $this->app->getAppId(),
            'secret' => $this->app->getAppSecret(),
            'grant_type' => 'client_credential',
        ])->getBody(), true);
    }

    /**
     * @param $result
     * @return mixed|void
     * @throws EasyQQException
     */
    public function checkTokenResponse($result)
    {
        if (isset($result['errcode']) && $result['errcode'] !== 0) {
            throw new EasyQQException("获取 access token 失败：{$result['errmsg']}");
        }
    }
}
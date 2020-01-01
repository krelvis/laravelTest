<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ProxyTrait
{

    /**
     * Notes:获取token
     * @param $username
     * @param $password
     * @param $provider
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    protected function getTokenData ($username, $password, $provider = 'users')
    {
        $data = [
            'grant_type'    => 'password',
            'client_id'     => env('ClientID'),
            'client_secret' => env('ClientSecret'),
            'username'      => $username,
            'password'      => $password,
            'scope'         => '*',
            'provider'=> $provider,
        ];
//        empty($provider) ? '' : $data['provider'] = $provider;
        return $this->getToken($data);
    }

    /**
     * Notes:刷新令牌
     * @param $refreshToken
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getRefresh ($refreshToken, $provider = 'users')
    {
        $data = [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id'     => env('PASSWORD_ID'),
            'client_secret' => env('PASSWORD_SECRET'),
            'scope'         => '*',
            'provider'=> $provider,
        ];
        empty($provider) ? '' : $data['provider'] = $provider;
        return $this->getToken($data);

    }

    /**
     * Notes:发送请求获取Token
     * @param array $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    protected function getToken ($data = [])
    {
        $http = new Client();
        $url = \request()->root() . '/oauth/token';
        $result = $http->post($url, [
            'form_params' => $data
        ]);
        $result = json_decode((string)$result->getBody(), true);
        return $result;
    }

    /**
     * Notes:客户端凭据授权令牌
     * @param $provider
     * @return mixed
     */
    public function client ($provider = '')
    {
        $http = new Client();
        $url = \request()->root() . '/oauth/token';
        $data = [
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'client_id'     => env('PASSWORD_ID'),
                'client_secret' => env('PASSWORD_SECRET'),
                'scope'         => '*',
            ]
        ];
        empty($provider) ? '' : $data['provider'] = $provider;

        $response = $http->post($url, $data);
        $result = json_decode((string)$response->getBody(), true);
        return $result;
    }
}
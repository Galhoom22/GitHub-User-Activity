<?php

class GithubApiClient
{
    private string $baseUrl = 'https://api.github.com';

    public function getUserActivity(string $username) : string{
        $url = $this->baseUrl . '/users/' . $username . '/events';
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => 'User-Agent: MyGithubApiClient/1.0'
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return $response;
    }
}

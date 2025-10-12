<?php

class GithubApiClient
{
    private string $baseUrl = 'https://api.github.com';

    public function getUserActivity(string $username) : string{
        $url = $this->baseUrl . '/users/' . $username . '/events';
        $response = file_get_contents($url);
        return $response;
    }
}

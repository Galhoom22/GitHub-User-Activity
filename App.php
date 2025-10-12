<?php

if (!isset($argv[1])) {
    echo "Usage: php App.php <github-username>\n";
} else {
    require_once 'src/GithubApiClient.php';
    $api = new GithubApiClient();
    $username = $argv[1];
    $response = $api->getUserActivity($username);
    echo "Fetching for user activity: " . $username . "\n";
    echo $response . "\n";
}

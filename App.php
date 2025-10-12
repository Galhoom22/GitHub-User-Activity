<?php

if (!isset($argv[1])) {
    echo "Usage: php App.php <github-username>\n";
} else {
    require_once 'src/GithubApiClient.php';
    require_once 'src/ActivityFormatter.php';

    $api = new GithubApiClient();
    $formatter = new ActivityFormatter();

    $username = $argv[1];
    $response = $api->getUserActivity($username);

    echo "Fetching for user activity: " . $username . "\n";
    $events = json_decode($response, true);
    foreach($events as $event){
        echo $formatter->formatEvent($event) . "\n";
    }
}

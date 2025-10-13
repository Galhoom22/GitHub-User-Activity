<?php

if (!isset($argv[1])) {
    echo "Usage: php App.php <github-username>\n";
} else {
    require_once 'src/GithubApiClient.php';
    require_once 'src/ActivityFormatter.php';

    $api = new GithubApiClient();
    $formatter = new ActivityFormatter();

    $username = $argv[1];
    if(isset($argv[2])){
        $filter = explode('=', $argv[2]);
        $filterType = $filter[1];
    }
    $response = $api->getUserActivity($username);

    echo "Fetching for user activity: " . $username . "\n";
    $events = json_decode($response, true);
    foreach($events as $event){
        if(!isset($filterType)){
            echo $formatter->formatEvent($event) . "\n";
        }else{
            if($event['type'] === $filterType){
                echo $formatter->formatEvent($event) . "\n";
            }
        }
    }
}

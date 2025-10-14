<?php

if (!isset($argv[1])) {
    echo "Usage: php App.php <github-username>\n";
} else {
    require_once 'src/GithubApiClient.php';
    require_once 'src/ActivityFormatter.php';
    require_once 'src/CacheManager.php';

    $api = new GithubApiClient();
    $formatter = new ActivityFormatter();
    $cache = new CacheManager();

    $username = $argv[1];
    if(isset($argv[2])){
        $filter = explode('=', $argv[2]);
        $filterType = $filter[1];
    }

    if($cache->get($username) === null){
        $response = $api->getUserActivity($username);
        $cache->set($username, $response);
    }else{
        $response = $cache->get($username);
    }

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

<?php

if (isset($argv[1])) {
    $username = $argv[1];
    echo "Fetching for user activity: " . $username . "\n";
} else {
    echo "Usage: php App.php <github-username>\n";
}

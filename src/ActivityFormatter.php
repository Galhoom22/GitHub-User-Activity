<?php 

class ActivityFormatter{
    public function formatEvent(array $event): string{
        if($event['type'] == 'PushEvent'){
            $count = count($event['payload']['commits']);
            $commit = $count === 1 ? " commit" : " commits";
            return "Pushed " . $count . $commit . " to " . $event['repo']['name'] ;
        }else{
            return $event['type'] . " in " . $event['repo']['name'];
        }
    }
}
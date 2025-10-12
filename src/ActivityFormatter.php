<?php 

class ActivityFormatter{
    public function formatEvent(array $event): string{
        return $event['type'];
    }
}
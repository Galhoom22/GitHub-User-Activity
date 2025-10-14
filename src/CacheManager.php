<?php 

class CacheManager{
    private string $cacheDir = 'cache';

    public function __construct(){
        if(!is_dir($this->cacheDir)){
            mkdir($this->cacheDir);
        }
    }

    public function set(string $key, string $data): void{
        file_put_contents($this->cacheDir . '/' . $key . '.cache', $data);
    }

    public function get(string $key): ?string{
        $filePath = $this->cacheDir . '/' . $key . '.cache';
        if(!file_exists($filePath)){
            return null;
        }else{
            $fileTime = filemtime($filePath);
            $currentTime = time();
            $ageInSeconds = $currentTime - $fileTime;
            if($ageInSeconds < 300){
                $file = file_get_contents($filePath);
                return $file;
            }else{
                return null;
            }
        }
    }
}
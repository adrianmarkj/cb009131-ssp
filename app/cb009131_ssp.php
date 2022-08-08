<?php

namespace App;

class cb009131_ssp{
    private $version = '1.0.0';
    private $url;

    public function __construct()
    {
    }

    public function setUrl(string $url){
        $this->url =  $url;
    }

    public function getUrl(){
        return $this->url;
    }
}

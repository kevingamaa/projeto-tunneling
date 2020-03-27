<?php

namespace Core\Traits;



trait  TraitUrlParser {
    public function parseUrl($url = '') {
        if(empty($url))
        {
            $url = $_GET['url'];
        }
        return explode('/', rtrim($url), FILTER_SANITIZE_URL  );
    }
}
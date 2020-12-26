<?php
use Illuminate\Support\Facades\Auth;

function getUserImageDir() {
    return 'img/user/';
}


function removeDir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                    $this->removeDir($dir. DIRECTORY_SEPARATOR .$object);
                else
                    unlink($dir. DIRECTORY_SEPARATOR .$object);
            }
        }
        rmdir($dir);
    }
}

function devPrint($data, $options = []) {
    $options['dump_func'] = 'print_r';
    echo '<pre>';

    if (isset($options['loop']) && $options['loop'] === true) {
        if (isset($options['key_val']) && $options['key_val'] === true) {
            foreach ($data as $key => $val) {
                $options['dump_func']($key . ' => ' . $val);
                if (isset($options['br']) && $options['br'] === true) {
                    echo '<br>';
                }
            }
        }
        else {
            foreach ($data as $item) {
                $options['dump_func']($item);
                if (isset($options['br']) && $options['br'] === true) {
                    echo '<br>';
                }
            }
        }
    }
    else {
        $options['dump_func']($data);
    }

    if (isset($options['exit']) && $options['exit'] === true) {
        exit;
    }

}

function hasRoutePart($key_word, $separator = '/', $withoutParams = false) {
    $url = request()->getUri();
    if ($withoutParams) {
        $url = explode('?', $url)[0];
    }
    return in_array($key_word, explode($separator, $url));
}

function isDefaultImage($path) {
    $default_images = [
        'img/defaults/startup.png',
        'img/defaults/user-image.jpg',
        'img/defaults/no-image-grey.png',
        'img/defaults/no-image-blue.png',
        'img/defaults/no-image.png',
    ];

    return in_array($path, $default_images);
}

function currentUser() {
    return Auth::user();
}

function parseYoutubeVideo($url) {
    $resource_link = 'https://www.youtube.com/embed/';
    if (preg_match('#^(https|http)://(www\.)?(youtube|youtu)\.[a-zA-Z]{2,3}.*$#', $url)) {

        if (strpos($url, '?v=')) {
            $url_parts = explode('?v=', $url);
            return $resource_link . trim($url_parts[1]);
        }
        else if (strpos($url, '.be/')) {
            $url_parts = explode('.be/', $url);
            return $resource_link . trim($url_parts[1]);
        }
        else {
            return $url;
        }

    }
    else {
        return false;
    }
}
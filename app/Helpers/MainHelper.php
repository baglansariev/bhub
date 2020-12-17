<?php

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
    echo '<pre>';

    if (isset($options['iteration']) && $options['iteration'] === true) {
        if (isset($options['key_val']) && $options['key_val'] === true) {
            foreach ($data as $key => $val) {
                echo $key . ' => ' . $val;
                if (isset($options['br']) && $options['br'] === true) {
                    echo '<br>';
                }
            }
        }
        else {
            foreach ($data as $item) {
                echo $item;
                if (isset($options['br']) && $options['br'] === true) {
                    echo '<br>';
                }
            }
        }
    }
    else {
        if (isset($options['dump_func']) && $options['dump_func']) {
            $options['dump_func']($data);
        }
        else {
            print_r($data);
        }
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
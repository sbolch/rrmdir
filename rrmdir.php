<?php

/**
 * @param string $dir
 */
function rrmdir($dir) {
    if(is_dir($dir)) {
        $objects = scandir($dir);
        foreach($objects as $object) {
            if($object != '.' && $object != '..') {
                if(is_dir("{$dir}/{$object}")) {
                    $this->rrmdir("{$dir}/{$object}");
                } else {
                    unlink("{$dir}/{$object}");
                }
            }
        }
        rmdir($dir);
    }
}
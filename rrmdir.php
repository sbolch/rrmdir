<?php

function rrmdir(string $dir): void {
    if(is_dir($dir)) {
        $objects = scandir($dir);
        foreach($objects as $object) {
            if($object != '.' && $object != '..') {
                if(is_dir("$dir/$object")) {
                    rrmdir("$dir/$object");
                } else {
                    unlink("$dir/$object");
                }
            }
        }
        rmdir($dir);
    }
}
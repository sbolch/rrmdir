<?php

/**
 * Recursively removes a directory
 * @param string $directory Path to the directory
 * @return void
 */
function rrmdir(string $directory): void {
    if (!is_dir($directory)) {
        return;
    }

    foreach (new FilesystemIterator($directory, FilesystemIterator::SKIP_DOTS) as $item) {
        if ($item->isDir()) {
            rrmdir($item->getPathname());
        } else {
            unlink($item->getPathname());
        }
    }

    rmdir($directory);
}
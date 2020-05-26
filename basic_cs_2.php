<?php

/**
 * Exercise 2.
 *
 */
function deleteFilesStartingWith($path, $string) {
    $it = new RecursiveDirectoryIterator($path);

    foreach(new RecursiveIteratorIterator($it) as $file) {
        if (!$file->isDir() && substr($file->getFileName(), 0, strlen($string)) === $string) {
            unlink($file->getRealPath());
        }
    }
}

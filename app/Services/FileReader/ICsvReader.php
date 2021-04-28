<?php

namespace App\Services\FileReader;

interface ICsvReader
{
    /**
     * Reads the contents of the file line by line and returns a generator yielding
     * the User object for the last read line.
     * 
     * @param bool $associative
     * @return \Generator<int, array, mixed, void>
     */
    public function read($associative = true);

    /**
     * Returns the last modified time of the file.
     * 
     * @return int
     */
    public function lastModified();
}

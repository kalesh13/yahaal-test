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
     * Sets a new data file path.
     * 
     * @param string $path
     * @return static
     */
    public function setFilePath($path);

    /**
     * Sets the `hasHeader` flag of the reader to the given value.
     * 
     * @param bool $hasHeader
     * @return static
     */
    public function setHasHeader($hasHeader);

    /**
     * Returns the last modified time of the file.
     * 
     * @return int
     */
    public function lastModified();
}

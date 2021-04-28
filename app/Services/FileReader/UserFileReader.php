<?php

namespace App\Services\FileReader;

use Illuminate\Support\Facades\File;

class UserFileReader implements ICsvReader
{
    /**
     * The absolute path to the user data file on the disk.
     * 
     * @var string
     */
    protected $filePath;

    /**
     * This file reader supports csv with headers and without headers. If `hasHeader` is
     * set true, values of the first line will be used as keys for the `read()` operation.
     * 
     * @var bool
     */
    protected $hasHeader;

    public function __construct($filePath, $hasHeader = true)
    {
        $this->filePath = $filePath;
        $this->hasHeader = $hasHeader;
    }

    /**
     * Reads the contents of the file line by line and returns a generator yielding
     * the User object for the last read line.
     * 
     * @param bool $associative
     * @return \Generator<int, array, mixed, void>
     */
    public function read($associative = true)
    {
        $file = fopen($this->filePath, 'r');

        if ($this->hasHeader && ($line = fgetcsv($file)) !== false) {
            $headers = $line;
        }
        while (($line = fgetcsv($file)) !== false) {
            // If line is empty $line[0] will be null.
            // If line is false or null, there is an error on line.
            if (!$line || $line[0] === null) {
                continue;
            }
            yield $this->hasHeader && $associative ? array_combine($headers, $line) : $line;
        }
    }

    /**
     * Returns the last modified time of the file.
     * 
     * @return int
     */
    public function lastModified()
    {
        return File::lastModified($this->filePath);
    }
}

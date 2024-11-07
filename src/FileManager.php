<?php

namespace Egor\Files;

use Egor\Files\FileFormatInterface;

interface FileManager extends FileFormatInterface
{

    public function readFile(string $fileName);
    public function writeFile(string $fileName, string $data);
}

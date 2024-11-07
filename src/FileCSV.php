<?php

namespace Egor\Files;

class FileCSV extends FileCommon
{

    public function getFormat(): string
    {
        return 'CSV';
    }
}
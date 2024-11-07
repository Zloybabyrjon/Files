<?php

namespace Egor\Files;

use Exception;
use Egor\Files\FileTxt;
use Egor\Files\FileCSV;
use Egor\Files\FileJSON;

class FailFactory
{
    public string $failType;

    public function createFail(string $failType, string $failName, string $data)
    {
        switch ($failType) {
            case 'txt':
                return new FileTxt($failName, $data);
            case 'JSON':
                return new FileJSON($failName, $data);
            case 'CSV':
                return new FileCSV($failName, $data);
            default:
                throw new Exception("Неподдерживаемый тип файла: $failType");
        }
    }
}

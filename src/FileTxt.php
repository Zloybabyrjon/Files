<?php

namespace Egor\Files;

use Exception;

class FileTxt extends FileManager
{
    private string $fileName;
    private string $data;

    public function __construct(string $fileName, string $data)
    {
        $this->fileName = $fileName;
        $this->data = $data;
    }

    public function getFormat(): string
    {
        return 'txt';
    }

    public function readFile(string $fileName): void
    {
        try {
            if (!file_exists($fileName)) {
                throw new Exception("Файл $fileName не существует.");
            }

            $fileHandle = fopen($fileName, 'r');
            if (!$fileHandle) {
                throw new Exception("Не удалось открыть файл $fileName для чтения.");
            }

            while (!feof($fileHandle)) {
                $str = htmlentities(fgets($fileHandle));
                echo $str;
            }
            fclose($fileHandle);
        } catch (Exception $e) {
            echo "Ошибка при чтении файла: " . $e->getMessage();
        }
    }

    public function writeFile(string $fileName, string $data): void
    {
        try {
            $fileHandle = fopen($fileName, 'w');
            if (!$fileHandle) {
                throw new Exception("Не удалось открыть файл $fileName для записи.");
            }

            if (fwrite($fileHandle, $data) === false) {
                throw new Exception("Ошибка при записи в файл $fileName.");
            }
            fclose($fileHandle);
        } catch (Exception $e) {
            echo "Ошибка при записи файла: " . $e->getMessage();
        }
    }
}
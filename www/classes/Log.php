<?php

class Log
{

    const PATH = __DIR__ . '/../log.txt';

    public function addRecord($text)
    {
        file_put_contents(Log::PATH, date('c') . ' - ' . $text . PHP_EOL, FILE_APPEND);
    }

    public function show()
    {
        $log = explode(PHP_EOL, file_get_contents(Log::PATH));
        foreach ($log as $row) {
            echo $row . '<br/>';
        }
    }

}
<?php
class FileLogger extends Logger
{
    public function writer($message)
    {
        //logic
    }

    public function output()
    {
        throw new \Exception;
    }
}
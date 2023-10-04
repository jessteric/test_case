<?php
class Config
{
    private $configData = [];

    public function __construct()
    {
        $this->configData = include('configData.php');
    }

    public function get($key, $defaultValue = null)
    {
        if (isset($this->configData[$key])) {
            return $this->configData[$key];
        }
        return $defaultValue;
    }
}



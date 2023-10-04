<?php
class Decode
{
    public function getCodeFullInfo($url)
    {
        $getContent = file_get_contents($url); 
        $getContent = str_replace("{}", "", $getContent);
        $getContent = str_replace("}", "},", $getContent);
        $getContent = '[' . $getContent . ']';
        $getContent = str_replace(",]", "]", $getContent);
        $data = json_decode($getContent, TRUE);
        return $data;
    }
}
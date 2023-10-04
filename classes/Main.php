<?php
include("classes/Config.php");
include("classes/Decode.php");
include("classes/Parse.php");
class Main
{
    public function getAllData()
    {
        $configObject = new Config();
        $decodeObject = new Decode();

        $arrayResult = [];
        foreach ($decodeObject->getCodeFullInfo($configObject->get('url')) as $i => $cars) {
            $decodeData = base64_decode($cars['result']);
            $parse = new Parse($decodeData);

            $arrayResult[] = array_merge($parse->returnMarkAndModel(), $parse->returnMainData(), $parse->returnCO2());
        }

        return $arrayResult;
    }
}
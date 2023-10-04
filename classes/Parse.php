<?php
require 'vendor/autoload.php';
use voku\helper\HtmlDomParser;

class Parse
{
    private string $html;
    public function __construct($html)
    {
        $this->html = $html;
    }
    public function returnMainData(): array
    {
        $result = [];
        $dom = HtmlDomParser::str_get_html($this->html);
        $mainInfo = $dom->find('span')->plaintext;
        if($mainInfo[1] == "NEW" || $mainInfo[2] == "NEW") {
            $result['title'] = $mainInfo[0];
            list($month, $year) = explode('/', $mainInfo[3]);
            $newDate = $year . '-' . $month . '-01';
            $result['first_register_date'] = $newDate;
            $expMileage = explode(" KM",  $mainInfo[4]);
            $result['mileage'] = str_replace(" ", "", $expMileage[0]);
            $result['gearbox'] = $mainInfo[5];
            $result['fuel'] = $mainInfo[6];
            $expPower = explode('(', $mainInfo[9]);
            $powerKw = preg_replace("/[^0-9]/", "", $expPower[1]);
            $powerHp = preg_replace("/[^0-9]/", "", $expPower[0]);
            $result['power_hp'] = $powerHp;
            $result['power_kw'] = $powerKw;
            $result['engine_size'] = $mainInfo[7];
            $result['emission_class'] = $mainInfo[10];
            $result['country_origin'] = $mainInfo[11];
        } else {
            $result['title'] = $mainInfo[0];
            list($month, $year) = explode('/', $mainInfo[1]);
            $newDate = $year . '-' . $month . '-01';
            $result['first_register_date'] = $newDate;
            $expMileage = explode(" KM",  $mainInfo[2]);
            $result['mileage'] = str_replace(" ", "", $expMileage[0]);
            $result['gearbox'] = $mainInfo[3];
            $result['fuel'] = $mainInfo[4];
            $expPower = explode('(', $mainInfo[7]);
            $powerKw = preg_replace("/[^0-9]/", "", $expPower[1]);
            $powerHp = preg_replace("/[^0-9]/", "", $expPower[0]);
            $result['power_hp'] = $powerHp;
            $result['power_kw'] = $powerKw;
            $result['engine_size'] = $mainInfo[5];
            $result['emission_class'] = $mainInfo[8];
            $result['country_origin'] = $mainInfo[9];
        }
        
        return $result;
    }

    public function returnMarkAndModel()
    {
        $dom = HtmlDomParser::str_get_html($this->html);
        $markAndModel = $dom->find('div.small', 0)->plaintext;
        $explodeData = explode(' - ', $markAndModel);
        $result['id'] = str_replace("#", "", $explodeData[0]);
        $result['mark'] = $explodeData[1];
        
        return $result;
    }

    public function returnCO2()
    {
        $dom = HtmlDomParser::str_get_html($this->html);
        $co2 = $dom->find('div.item-feature', 7)->plaintext;
        $expCo2 = explode(' ', $co2);
        $result['co2'] = $expCo2[0];

        return $result;
    }
}
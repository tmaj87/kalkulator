<?php

class Calculator
{
    const WATER_PER_GRAM = .335;

    private $input = array();
    private $base_sum = 0;
    private $base_type = 'NaOH';
    private $water_sum = 0;
    private $oil_sum = 0;

    public function __construct(array $inputForm, string $type, int $percent)
    {
        $this->input = $this->sortByGram($inputForm);
        $this->setType($type);
        $this->calculate();
        $this->applyPercent($percent);
    }

    private function sortByGram(array $array) : array
    {
        uasort($array, array(__CLASS__, 'compareGram'));
        return $array;
    }

    private function calculate()
    {
        foreach ($this->input as $key => $array) {
            $this->oil_sum += $array['gram'];
            $this->base_sum += $array['gram'] * $array[$this->base_type];
            $this->water_sum += $array['gram'] * self::WATER_PER_GRAM;
        }
    }

    public function oilTable() : array
    {
        $array = array();
        foreach ($this->input as $oil => $row) {
            $array[$oil] = array(
                'typ' => $row['typ'],
                'gram' => $row['gram'],
                'percent' => round($row['gram'] / $this->oil_sum * 100)
            );
        }
        return $array;
    }

    public function requiredWater() : int
    {
        return $this->water_sum;
    }

    public function requiredBase() : float
    {
        return round($this->base_sum, 2);
    }

    public function oilSum() : int
    {
        return $this->oil_sum;
    }

    public function totalMass() : int
    {
        return ceil($this->oil_sum + $this->water_sum + $this->base_sum);
    }

    public function inci() : string
    {
        $string = "";
        foreach ($this->input as $oil => $row) {
            if (strlen($string) > 0) {
                $string .= ', ';
            }
            $string .= $row['inci'];
        }
        return $string;
    }

    private function compareGram(array $a, array $b) : int
    {
        return $a['gram'] <=> $b['gram'];
    }

    private function setType(string $type)
    {
        if ($type == 'KOH') {
            $this->base_type = 'KOH';
        }
    }

    private function applyPercent(int $percent)
    {
        $this->base_sum *= 1 - $percent / 100;
    }
}

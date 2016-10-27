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
        $this->base_type = $this->checkType($type);
        $this->calculateFor($percent);
    }

    private function sortByGram(array $array) : array
    {
        uasort($array, array(__CLASS__, 'compareGram'));
        return $array;
    }

    private function calculateFor(int $percent)
    {
        foreach ($this->input as $key => $array) {
            $this->oil_sum += $array['gram'];
            $this->base_sum += $array['gram'] * $array[$this->base_type];
            $this->water_sum += $array['gram'] * self::WATER_PER_GRAM;
        }
        $this->base_sum *= 1 - $percent / 100;
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
        return $this->base_sum;
    }

    public function oilSum() : int
    {
        return $this->oil_sum;
    }

    public function totalMass() : float
    {
        return $this->oil_sum + $this->water_sum + $this->base_sum;
    }

    public function inci() : string
    {
        $string = "";
        foreach ($this->input as $oil => $row) {
            $string .= $row['inci'];
        }
        return $string;
    }

    private function compareGram(array $a, array $b) : int
    {
        return $a['gram'] <=> $b['gram'];
    }

    private function checkType(string $type) : string
    {
        switch ($type) {
            case 'KOH':
                return 'KOH';
            default:
                return $this->base_type;
        }
    }
}

<?php

class Calculator
{
    const WATER_PER_GRAM = .335;

    private $database = array();
    private $base_sum = 0;
    private $base_type = 'NaOH';
    private $water_sum = 0;
    private $oil_sum = 0;
    private $percent = 6;

    public function __construct(array $array, string $type, int $percent)
    {
        $this->percent = $percent;
        $this->database = $this->sortByGram($array);
        $this->base_type = $this->checkType($type);
        $this->calculate();
    }

    private function sortByGram(array $array) : array
    {
        uasort($array, array(__CLASS__, 'compareGram'));
        return $array;
    }

    private function calculate()
    {
        foreach ($this->database as $key => $array) {
            $this->oil_sum += $array['gram'];
            $this->base_sum += $array['gram'] * $array[$this->base_type];
            $this->water_sum += $array['gram'] * self::WATER_PER_GRAM;
        }
    }

    public function oilTable() : array
    {
        $array = array();
        foreach ($this->database as $oil => $row) {
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
        return $this->base_sum * 1 - $this->percent / 100;
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
        foreach ($this->database as $oil => $row) {
            $string .= $row['inci'];
        }
        return $string;
    }

    private function compareGram($a, $b)
    {
        return $a['gram'] <=> $b['gram'];
    }

    private function checkType(string $typ) : string
    {
        switch ($typ) {
            case 'KOH':
                return 'KOH';
            default:
                return $this->base_type;
        }
    }
}

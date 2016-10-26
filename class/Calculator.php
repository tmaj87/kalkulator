<?php

class Calculator
{
    const WATER_PER_GRAM = .335;

    private $database = array();
    private $base_sum = 0;
    private $base_type = 'NaOH';
    private $water_sum = 0;
    private $oil_sum = 0;

    public function __construct(array $array, string $typ)
    {
        $this->database = $this->sortByGram($array);
        $this->base_type = $this->checkType($typ);
        $this->calculate();
    }

    private function sortByGram(array $array) : array
    {
        uasort($array, array(__CLASS__, 'compare'));
        return $array;
    }

    private function calculate()
    {
        foreach ($this->database as $olej => $ile) {
            $this->oil_sum += $ile['gram'];
            $this->base_sum += $ile['gram'] * $ile[$this->base_type];
            $this->water_sum += $ile['gram'] * self::WATER_PER_GRAM;
        }
    }

    public function oilTable() : array
    {
        $array = array();
        foreach ($this->database as $oil => $row) {
            $array[$oil] = array(
                'gram' => $row['gram'],
                'percent' => round($row['gram'] / $this->oil_sum * 100)
            );
        }
        return $array;
    }

    public function requiredWater() : int
    {
        return round($this->water_sum);
    }

    public function oilSum() : int
    {
        return round($this->oil_sum);
    }

    public function saponificationChart() : array
    {
        $array = array();
        for ($procent = 100; $procent >= 90; $procent--) {
            $array[$procent] = round($this->base_sum * $procent / 100, 2);
        }
        return $array;
    }

    public function totalMass() : int
    {
        return round($this->oil_sum + $this->water_sum + $this->base_sum);
    }

    public function inci() : string
    {
        $string = "";
        foreach ($this->database as $oil => $row) {
            $string .= $row['inci'];
        }
        return $string;
    }

    private function compare($a, $b)
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

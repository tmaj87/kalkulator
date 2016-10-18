<?php

class Calculator
{

    const WATER_PER_GRAM = .335;

    private $database = array();
    private $base_sum = 0;
    private $base_type = 'NaOH';
    private $water_sum= 0;
    private $oil_sum = 0;

    public function __construct($tablica, $typ)
    {
        $this->database = $this->sortByGram($tablica);
        $this->base_type = $this->checkType($typ);
        $this->calculate();
    }

    private function sortByGram($tablica)
    {
        uasort($tablica, array(__CLASS__, 'compare'));
        return $tablica;
    }

    private function calculate()
    {
        foreach ($this->database as $olej => $ile) {
            $this->oil_sum += $ile['gram'];
            $this->base_sum += $ile['gram'] * $ile[$this->base_type];
            $this->water_sum += $ile['gram'] * self::WATER_PER_GRAM;
        }
    }

    public function oilTable()
    {
        $tablica = array();
        foreach ($this->database as $oil => $row) {
            $tablica[$oil] = array(
                'gram' => $row['gram'],
                'percent' => round($row['gram'] / $this->oil_sum * 100)
            );
        }
        return $tablica;
    }

    public function requiredWater()
    {
        return round($this->water_sum);
    }

    public function oilSum()
    {
        return round($this->oil_sum);
    }

    public function saponificationChart()
    {
        $tablica = array();
        for ($procent = 100; $procent >= 90; $procent--) {
            $tablica[$procent] = round($this->base_sum * $procent / 100, 2);
        }
        return $tablica;
    }

    public function totalMass()
    {
        return round($this->oil_sum + $this->water_sum + $this->base_sum);
    }

    public function inci()
    {
        return '';
    }

    private function compare($a, $b)
    {
        if ($a['gram'] == $b['gram']) {
            return 0;
        }
        return ($a['gram'] > $b['gram']) ? -1 : 1;
    }

    private function checkType($typ)
    {
        switch ($typ) {
            case 'KOH':
                return 'KOH';
            default:
                return $this->base_type;
        }
    }
}

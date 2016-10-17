<?php

class Calculator
{

    const WSPOLCZYNNIK_WODY = .335;

    private $baza_danych = array();
    private $suma_NaOH = 0;
    private $suma_wody = 0;
    private $suma_olei = 0;
    private $typ_zasady = 'NaOH';

    public function __construct($tablica, $typ)
    {
        $this->baza_danych = $this->sortuj_tablice($tablica);
        $this->typ_zasady = $this->filtruj_typ($typ);
        $this->oblicz_zasade();
    }

    private function sortuj_tablice($tablica)
    {
        uasort($tablica, array(__CLASS__, 'porownaj'));
        return $tablica;
    }

    private function oblicz_zasade()
    {
        foreach ($this->baza_danych as $olej => $ile) {
            $this->suma_olei += $ile['gram'];
            $this->suma_NaOH += $ile['gram'] * $ile[$this->typ_zasady];
            $this->suma_wody += $ile['gram'] * self::WSPOLCZYNNIK_WODY;
        }
    }

    public function tablica_olei()
    {
        $tablica = array();
        foreach ($this->baza_danych as $olej => $ile) {
            $tablica[$olej] = array(
                'gram' => $ile['gram'],
                'udzial' => round($ile['gram'] / $this->suma_olei * 100)
            );
        }
        return $tablica;
    }

    public function potrzebna_woda()
    {
        return round($this->suma_wody);
    }

    public function suma_olei()
    {
        return round($this->suma_olei);
    }

    public function tablica_zmydlenia() // $start, $stop
    {
        $tablica = array();
        for ($procent = 100; $procent >= 90; $procent--) {
            $tablica[$procent] = array(
                'gram' => round($this->suma_NaOH * $procent / 100, 2),
            );
        }
        return $tablica;
    }

    public function masa_calkowita()
    {
        return round($this->suma_olei + $this->suma_wody + $this->suma_NaOH);
    }

    public function sklad()
    {
        return '';
    }

    private function porownaj($a, $b)
    {
        if ($a['gram'] == $b['gram']) {
            return 0;
        }
        return ($a['gram'] > $b['gram']) ? -1 : 1;
    }

    private function filtruj_typ($typ)
    {
        switch ($typ) {
            case 'KOH':
                return 'KOH';
            default:
                return $this->typ_zasady;
        }
    }
}

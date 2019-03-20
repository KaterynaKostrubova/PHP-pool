<?php 
Class NightsWatch
{
    private $persons = array();

    public function recruit($person) {
        if ($person instanceof IFighter) {
            $this->persons[] = $person;
        }
    }
    public function fight() {
        foreach ($this->persons as $p) {
            $p->fight();
        }
    }
}
?>

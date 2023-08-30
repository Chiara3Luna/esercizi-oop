<?php
class Esercito {
    private $attacco;
    private $difesa;

    public function __construct(Attacco $attacco, Difesa $difesa) {
        $this->attacco = $attacco;
        $this->difesa = $difesa;
    }

    public function attacca() {
        echo "L'esercito attacca:\n";
        $this->attacco->fanteria(); // Richiama il metodo di attacco della fanteria
        $this->attacco->cavalleria(); // Richiama il metodo di attacco della cavalleria
        $this->attacco->arcieri(); // Richiama il metodo di attacco degli arcieri
        $this->attacco->catapulte(); // Richiama il metodo di attacco delle catapulte
        echo "\n";
    }

    public function difendi() {
        echo "L'esercito difende:\n";
        $this->difesa->fossato(); // Richiama il metodo di difesa del fossato
        $this->difesa->fortezza(); // Richiama il metodo di difesa della fortezza
        $this->difesa->muraDiCinta(); // Richiama il metodo di difesa delle mura di cinta
        echo "\n";
    }
}

class Attacco {
    public function fanteria() {
        echo "Fanteria attacca!\n";
    }

    public function cavalleria() {
        echo "Cavalleria attacca!\n";
    }

    public function arcieri() {
        echo "Arcieri attaccano!\n";
    }

    public function catapulte() {
        echo "Catapulte attaccano!\n";
    }
}

class Difesa {
    public function fossato() {
        echo "Fossato difende!\n";
    }

    public function fortezza() {
        echo "Fortezza difende!\n";
    }

    public function muraDiCinta() {
        echo "Mura di cinta difendono!\n";
    }
}

$attacco = new Attacco();
$difesa = new Difesa();

$esercito = new Esercito($attacco, $difesa);
$esercito->attacca();
$esercito->difendi();
?>

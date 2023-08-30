<?php

//! definisco le interfacce per i componenti del computer
interface RAM {
    public function storeData($data);
    public function retrieveData();
}

interface ROM {
    public function readData();
}

interface SchedaVideo {
    public function display($data);
}

//! implemento le classi che rappresentano i componenti del computer
class DDR4RAM implements RAM {
    private $storedData;

    public function storeData($data) {
        $this->storedData = $data;
    }

    public function retrieveData() {
        return $this->storedData;
    }
}

class EEPROMROM implements ROM {
    private $data;

    public function readData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }
}

class SchedaVideoHDMI implements SchedaVideo {
    public function display($data) {
        echo "Mostra dati video: " . $data . "\n";
    }
}

//! creo la classe Computer che utilizza Dependency Injection e Object Composition per assemblare i componenti
class Computer {
    private $ram;
    private $rom;
    private $schedaVideo;

    public function __construct(RAM $ram, ROM $rom, SchedaVideo $schedaVideo) {
        $this->ram = $ram;
        $this->rom = $rom;
        $this->schedaVideo = $schedaVideo;
    }

    public function boot() {
        $data = $this->rom->readData();
        $this->ram->storeData($data);
        $retrievedData = $this->ram->retrieveData();
        $this->schedaVideo->display($retrievedData);
    }
}

//! creo un'istanza 
$ram = new DDR4RAM();
$rom = new EEPROMROM();
$schedaVideo = new SchedaVideoHDMI();

$computer = new Computer($ram, $rom, $schedaVideo);
$computer->boot();


?>

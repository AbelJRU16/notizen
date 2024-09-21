<?php
class Coche {
    public $marca;
    public $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function mostrarInformacion() {
        echo "Marca: $this->marca, Modelo: $this->modelo";
    }
}

$miCoche = new Coche("Toyota", "Corolla");
$miCoche->mostrarInformacion();

class Vehiculo {
    public $tipo;
    public function arrancar() {
        echo "El vehículo arranca";
    }
}

class Moto extends Vehiculo {
    public function arrancar() {
        echo "La moto arranca";
    }
}

<?php
    class carro {
        public $cor, $modelo;

        public function __construct ($cor, $modelo) {
                $this->cor = $cor;
                $this->modelo = $modelo;
        }

        function apresentar () {
            echo "a cor do carro é: $cor. O modelo do carro é: $modelo.";
        }


    }

    $carro1 = new carro ("branco", "uno");
    $carro2 = new carro ("preto", "civic");

    echo $carro1->apresentar();
    echo $carro2->apresentar();
    ?>
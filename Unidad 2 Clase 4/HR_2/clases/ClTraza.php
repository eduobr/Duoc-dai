<?php

class ClTraza {
    function __construct($parametros) {
        $traza= fopen("traza.log", "w");
        fwrite($traza, date("Y-m-d")."-".$parametros);
        fclose($traza);
    }

}

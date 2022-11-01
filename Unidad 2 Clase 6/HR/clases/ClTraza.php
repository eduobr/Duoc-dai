<?php

class ClTraza {

    public function ClTraza($param) {
        $traza = fopen("traza.log", "w");
        fwrite($traza, $param);
        fclose($traza);
    }

}

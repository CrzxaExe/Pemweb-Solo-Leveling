<?php

class STR {
    static function random(int $n) {
        return bin2hex(random_bytes($n / 2));
    } 
}

?>
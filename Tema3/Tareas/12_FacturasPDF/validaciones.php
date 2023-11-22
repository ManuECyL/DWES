<?php   
    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }
?>
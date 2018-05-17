<?php

class FlashMessage {

    public static function render($level) {
        if (!isset($_SESSION[$level])) {
            return null;
        }
        $messages = $_SESSION[$level];
        unset($_SESSION[$level]);
        return implode('<br/>', $messages);
    }

    public static function add($message, $level) {
        if (!isset($_SESSION[$level])) {
            $_SESSION[$level] = array();
        }
        $_SESSION[$level][] = $message;
    }

    public static function isset($level){
        if (!isset($_SESSION[$level])) {
            return False;
        } else {
            return True;
        }
    }

}

?>
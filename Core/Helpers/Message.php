<?php

    namespace Core\Helpers;

    use Core\Helpers\Sanitize;

    class Message
    {
        private static $message;
        
        public static function setMessage(Array $message)
        {
            if (isset($message) && !is_null($message) && is_array($message)) {
                foreach ($message as $key => $value) {
                    self::$message[$key] = (Sanitize::stripTags($message[$key])) ? Sanitize::stripTags($message[$key]) : null;
                }
            }
        }
        public static function getMessage()
        {
            return self::$message;
        }
    }

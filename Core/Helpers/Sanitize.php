<?php

    namespace Core\Helpers;

    class Sanitize 
    {
        public static function stripTags ($dados)
        {
            if (isset($dados) && !is_null($dados)) {
                return trim(strip_tags($dados));
            }
            
            return false;
        }

        public static function sanitizeEmail ($dados)
        {
            if (isset($dados) && !is_null($dados)) {
                return filter_var($dados, FILTER_VALIDATE_EMAIL);
            }

            return false;
        }
    }
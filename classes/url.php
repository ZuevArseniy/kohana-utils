<?php defined('SYSPATH') or die('No direct script access.');

    class URL extends Kohana_URL {
        /**
         * A method to creates a friendly url from russian titles
         * Consider to use it as a ORM filter and store the value in the DB
         *
         * @param        $string
         * @param string $delimiter
         *
         * @return string ready-to-use url string
         */
        public static function transliterate($string, $delimiter = '_')
        {
            $string = UTF8::strtolower($string);

            $trans_arr = array(
                "а"=> "a", "б"=> "b", "в"=> "v", "г"=> "g", "д"=> "d",
                "е"=> "e", "ё"=> "yo", "ж"=> "j", "з"=> "z", "и"=> "i",
                "й"=> "i", "к"=> "k", "л"=> "l", "м"=> "m", "н"=> "n",
                "о"=> "o", "п"=> "p", "р"=> "r", "с"=> "s", "т"=> "t",
                "у"=> "y", "ф"=> "f", "х"=> "h", "ц"=> "c", "ч"=> "ch",
                "ш"=> "sh", "щ"=> "sh", "ы"=> "i", "э"=> "e", "ю"=> "u",
                "я"=> "ya", "ь"=> "", "Ь"=> "", "ъ"=> "", "Ъ"=> "",
            );
            // Not a perfect, but it work properly
            $url = str_replace(array_keys($trans_arr), array_values($trans_arr), $string);

            return self::title($url, $delimiter);
        }
    }


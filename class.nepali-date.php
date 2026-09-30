<?php

class Nepali_Date
{
    // Data for nepali date
    private $_bs = array(
        0 => array(2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        1 => array(2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        2 => array(2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        3 => array(2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        4 => array(2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        5 => array(2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        6 => array(2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        7 => array(2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        8 => array(2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        9 => array(2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        10 => array(2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        11 => array(2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        12 => array(2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        13 => array(2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        14 => array(2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        15 => array(2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        16 => array(2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        17 => array(2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        18 => array(2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        19 => array(2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        20 => array(2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        21 => array(2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        22 => array(2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        23 => array(2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        24 => array(2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        25 => array(2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        26 => array(2026, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31),
        27 => array(2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        28 => array(2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        29 => array(2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        30 => array(2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        31 => array(2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        32 => array(2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        33 => array(2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        34 => array(2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        35 => array(2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        36 => array(2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        37 => array(2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        38 => array(2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        39 => array(2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        40 => array(2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        41 => array(2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        42 => array(2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        43 => array(2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        44 => array(2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        45 => array(2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        46 => array(2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        47 => array(2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        48 => array(2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        49 => array(2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        50 => array(2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        51 => array(2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        52 => array(2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        53 => array(2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        54 => array(2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        55 => array(2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        56 => array(2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        57 => array(2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        58 => array(2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        59 => array(2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        60 => array(2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        61 => array(2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        62 => array(2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31),
        63 => array(2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        64 => array(2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        65 => array(2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        66 => array(2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        67 => array(2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        68 => array(2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        69 => array(2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        70 => array(2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        71 => array(2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        72 => array(2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        73 => array(2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        74 => array(2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        75 => array(2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        76 => array(2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        77 => array(2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        78 => array(2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        79 => array(2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        80 => array(2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        81 => array(2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        82 => array(2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        83 => array(2083, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
        84 => array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        85 => array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        86 => array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        87 => array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
        88 => array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        89 => array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        90 => array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
    );

    private $_nep_date = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'nmonth' => '', 'num_day' => '');
    private $_eng_date = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'emonth' => '', 'num_day' => '');
    public $debug_info = "";

    /**
     * Return day
     *
     * @param int $day
     * @return string
     */
    private function _get_day_of_week($day)
    {
        switch ($day) {
            case 1:
                $day = "आइतबार";
                break;
            case 2:
                $day = "सोमबार";
                break;
            case 3:
                $day = "मंगलबार";
                break;
            case 4:
                $day = "बुधबार";
                break;
            case 5:
                $day = "बिहिबार";
                break;
            case 6:
                $day = "शुक्रबार";
                break;
            case 7:
                $day = "शनिबार";
                break;
        }
        return $day;
    }

    /**
     * Return english month name
     *
     * @param int $m
     * @return string
     */
    private function _get_english_month($m)
    {
        $eMonth = FALSE;
        switch ($m) {
            case 1:
                $eMonth = "January";
                break;
            case 2:
                $eMonth = "February";
                break;
            case 3:
                $eMonth = "March";
                break;
            case 4:
                $eMonth = "April";
                break;
            case 5:
                $eMonth = "May";
                break;
            case 6:
                $eMonth = "June";
                break;
            case 7:
                $eMonth = "July";
                break;
            case 8:
                $eMonth = "August";
                break;
            case 9:
                $eMonth = "September";
                break;
            case 10:
                $eMonth = "October";
                break;
            case 11:
                $eMonth = "November";
                break;
            case 12:
                $eMonth = "December";
        }
        return $eMonth;
    }

    /**
     * Return nepali month name
     *
     * @param int $m
     * @return string
     */
    private function _get_nepali_month($m)
    {
        $n_month = FALSE;
        switch ($m) {
            case 1:
                $n_month = "बैशाख";
                break;
            case 2:
                $n_month = "जेष्ठ";
                break;
            case 3:
                $n_month = "असार";
                break;
            case 4:
                $n_month = "श्रावण";
                break;
            case 5:
                $n_month = "भाद्र";
                break;
            case 6:
                $n_month = "आश्विन";
                break;
            case 7:
                $n_month = "कार्तिक";
                break;
            case 8:
                $n_month = "मंसिर";
                break;
            case 9:
                $n_month = "पुस";
                break;
            case 10:
                $n_month = "माघ";
                break;
            case 11:
                $n_month = "फाल्गुन";
                break;
            case 12:
                $n_month = "चैत्र";
                break;
        }
        return $n_month;
    }

    /**
     * Check if date range is in english
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return bool
     */
    private function _is_in_range_eng($yy, $mm, $dd)
    {
        if ($yy < 1943 || $yy > 2034) {
            return 'Supported only between 1943-2034';
        }
        if ($mm < 1 || $mm > 12) {
            return 'Error! month value can be between 1-12 only';
        }
        if (!checkdate($mm, $dd, $yy)) {
            return 'Error! invalid English date';
        }
        return TRUE;
    }

    /**
     * Check if date is with in nepali data range
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return bool
     */
    private function _is_in_range_nep($yy, $mm, $dd)
    {
        if ($yy < 2000 || $yy > 2090) {
            return 'Supported only between 2000-2090';
        }
        if ($mm < 1 || $mm > 12) {
            return 'Error! month value can be between 1-12 only';
        }
        $month_days = $this->_bs[$yy - 2000][$mm];
        if ($dd < 1 || $dd > $month_days) {
            return 'Error! invalid Nepali date';
        }
        return TRUE;
    }

    /**
     * Calculates wheather english year is leap year or not
     *
     * @param int $year
     * @return bool
     */
    public function is_leap_year($year)
    {
        $a = $year;
        if ($a % 100 == 0) {
            if ($a % 400 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            if ($a % 4 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /**
     * Calculate dates between AD 1943 and the final Gregorian date covered by the BS table.
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return array
     */
    public function eng_to_nep($yy, $mm, $dd)
    {
        // Check for date range
        $chk = $this->_is_in_range_eng($yy, $mm, $dd);
        if ($chk !== TRUE) {
            die($chk);
        } else {
            $date = new DateTimeImmutable(sprintf('%04d-%02d-%02d', $yy, $mm, $dd), new DateTimeZone('UTC'));
            $epoch = new DateTimeImmutable('1943-04-15', new DateTimeZone('UTC'));
            $remaining_days = $epoch->diff($date)->days;
            $year_index = 0;
            $year = 2000;

            while (isset($this->_bs[$year_index])) {
                $year_days = array_sum(array_slice($this->_bs[$year_index], 1));
                if ($remaining_days < $year_days) {
                    break;
                }
                $remaining_days -= $year_days;
                $year_index++;
                $year++;
            }

            if (!isset($this->_bs[$year_index])) {
                die('Supported date table does not contain this English date');
            }

            $month = 1;
            while ($remaining_days >= $this->_bs[$year_index][$month]) {
                $remaining_days -= $this->_bs[$year_index][$month];
                $month++;
            }

            $day = ((int) $date->format('w')) + 1;
            $this->_nep_date['year'] = $year;
            $this->_nep_date['month'] = $month;
            $this->_nep_date['date'] = $remaining_days + 1;
            $this->_nep_date['day'] = $this->_get_day_of_week($day);
            $this->_nep_date['nmonth'] = $this->_get_nepali_month($month);
            $this->_nep_date['num_day'] = $day;
            return $this->_nep_date;
        }
    }

    /**
     * Calculate dates between BS 2000-2090.
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     * @return array
     */
    public function nep_to_eng($yy, $mm, $dd)
    {
        // Check for date range
        $chk = $this->_is_in_range_nep($yy, $mm, $dd);
        if ($chk !== TRUE) {
            die($chk);
        } else {
            $year_index = $yy - 2000;
            $remaining_days = $dd - 1;
            for ($month = 1; $month < $mm; $month++) {
                $remaining_days += $this->_bs[$year_index][$month];
            }
            for ($index = 0; $index < $year_index; $index++) {
                $remaining_days += array_sum(array_slice($this->_bs[$index], 1));
            }

            $epoch = new DateTimeImmutable('1943-04-15', new DateTimeZone('UTC'));
            $date = $epoch->modify('+' . $remaining_days . ' days');
            $day = ((int) $date->format('w')) + 1;
            $this->_eng_date['year'] = (int) $date->format('Y');
            $this->_eng_date['month'] = (int) $date->format('n');
            $this->_eng_date['date'] = (int) $date->format('j');
            $this->_eng_date['day'] = $this->_get_day_of_week($day);
            $this->_eng_date['nmonth'] = $this->_get_english_month($this->_eng_date['month']);
            $this->_eng_date['num_day'] = $day;
            return $this->_eng_date;
        }
    }

    function convert_to_nepali_number($str)
    {
        $str = strval($str);
        $array = array(
            0 => '&#2406;',
            1 => '&#2407;',
            2 => '&#2408;',
            3 => '&#2409;',
            4 => '&#2410;',
            5 => '&#2411;',
            6 => '&#2412;',
            7 => '&#2413;',
            8 => '&#2414;',
            9 => '&#2415;',
            /*'.'=>'&#2404;'*/
        );
        $utf = "";
        $cnt = strlen($str);
        for ($i = 0; $i < $cnt; $i++) {
            if (!isset($array[$str[$i]])) {
                $utf .= $str[$i];
            } else
                $utf .= $array[$str[$i]];
        }
        return $utf;
    }
    function convert_to_nepali_secandmin($str)
    {
        $result = $str;
        $result = str_replace("seconds", "सेकेण्ड", $result);
        $result = str_replace("seco", "सेकेण्ड", $result);
        $result = str_replace("mins", "मिनेट", $result);
        $result = str_replace("min", "मिनेट", $result);
        $result = str_replace("hours", "घण्टा", $result);
        $result = str_replace("hour", "घण्टा", $result);
        $result = str_replace("days", "दिन", $result);
        $result = str_replace("day", "दिन", $result);
        $result = str_replace("weeks", "हप्ता", $result);
        $result = str_replace("week", "हप्ता", $result);
        $result = str_replace("month", "महिना", $result);
        $result = str_replace("months", "महिना", $result);
        $result = str_replace("year", "वर्ष", $result);
        $result = str_replace("years", "वर्ष", $result);
        return $result;
    }
}
//  Example:
//	$cal = new Nepali_Calendar();
//	print_r ($cal->eng_to_nep(2008,11,23));
//	print_r($cal->nep_to_eng(2065,8,8));
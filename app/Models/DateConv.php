<?php

    namespace App\Models;

	class DateConv
	{
		// Data for nepali date
    private $_bs = array(
      array(1970, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1971, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
      array(1972, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(1973, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(1974, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1975, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(1976, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(1977, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
      array(1978, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1979, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(1980, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(1981, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(1982, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1983, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(1984, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(1985, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(1986, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1987, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(1988, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(1989, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1990, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1991, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(1992, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(1993, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1994, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1995, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
      array(1996, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(1997, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1998, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(1999, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
      array(2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
      array(2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
      array(2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
      array(2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
      array(2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
      array(2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
      array(2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31),
      array(2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
      array(2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
      array(2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
      array(2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
      array(2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
      array(2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
      array(2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
      array(2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
      array(2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30),
      array(2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
      array(2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
      array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
      array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
      array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
      array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
      array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
      array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
      array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30)
    );

            // private $_nep_date = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'nmonth' => '', 'num_day' => '');
        private $_nep_date = array('year' => '', 'month' => '', 'date' => '');

		// private $_eng_date = array('year' => '', 'month' => '', 'date' => '', 'day' => '', 'emonth' => '', 'num_day' => '');
		private $_eng_date = array('year' => '', 'month' => '', 'date' => '');

		public $debug_info = "";

		/**
		 * Return day
		 *
		 * @param int $day
		 * @return string
		 */
		private function _get_day_of_week($day)
		{
			switch ($day)
			{
				case 1:
					$day = "Sunday";
					break;

				case 2:
					$day = "Monday";
					break;

				case 3:
					$day = "Tuesday";
					break;

				case 4:
					$day = "Wednesday";
					break;

				case 5:
					$day = "Thursday";
					break;

				case 6:
					$day = "Friday";
					break;

				case 7:
					$day = "Saturday";
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
			switch ($m)
			{
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
		public function _get_nepali_month($m)
		{
			$n_month = FALSE;

			switch ($m)
			{
				case 1:
					$n_month = "Baishak";
					break;

				case 2:
					$n_month = "Jestha";
					break;

				case 3:
					$n_month = "Ashad";
					break;

				case 4:
					$n_month = "Shrawn";
					break;

				case 5:
					$n_month = "Bhadra";
					break;

				case 6:
					$n_month = "Ashwin";
					break;

				case 7:
					$n_month = "kartik";
					break;

				case 8:
					$n_month = "Mangshir";
					break;

				case 9:
					$n_month = "Poush";
					break;

				case 10:
					$n_month = "Magh";
					break;

				case 11:
					$n_month = "Falgun";
					break;

				case 12:
					$n_month = "Chaitra";
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
		  if ($yy < 1914 || $yy > 2033) {
        return 'Supported only between 1914-2022';
      }

			if ($mm < 1 || $mm > 12)
			{
				return 'Error! month value can be between 1-12 only';
			}

			if ($dd < 1 || $dd > 31)
			{
				return 'Error! day value can be between 1-31 only';
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
      if ($yy < 1970 || $yy > 2089) {
        return 'Supported only between 1970-2089';
      }

			if ($mm < 1 || $mm > 12)
			{
				return 'Error! month value can be between 1-12 only';
			}

			if ($dd < 1 || $dd > 32)
			{
				return 'Error! day value can be between 1-31 only';
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
			if ($a % 100 == 0)
			{
				if ($a % 400 == 0)
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				if ($a % 4 == 0)
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
		}

		/**
		 * currently can only calculate the date between AD 1944-2033...
		 *
		 * @param int $yy
		 * @param int $mm
		 * @param int $dd
		 * @return array
		 */
		public function eng_to_nep($date)
		{
            $date_explode = explode('-',$date);

            $yy = $date_explode[0];
            $mm = $date_explode[1];
            $dd = $date_explode[2];

			$chk = $this->_is_in_range_eng($yy, $mm, $dd);

			if($chk !== TRUE)
			{
				die($chk);
			}
			else
			{
				// Month data.
				$month  = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

				// Month for leap year
				$lmonth = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

				$def_eyy     = 1914;	// initial english date.
				$def_nyy     = 1970;
				$def_nmm     = 9;
				$def_ndd     = 17 - 1;	// inital nepali date.
				$total_eDays = 0;
				$total_nDays = 0;
				$a           = 0;
				$day         = 7 - 1;
				$m           = 0;
				$y           = 0;
				$i           = 0;
				$j           = 0;
				$numDay      = 0;

				// Count total no. of days in-terms year
				for ($i = 0; $i < ($yy - $def_eyy); $i++) //total days for month calculation...(english)
				{
					if ($this->is_leap_year($def_eyy + $i) === TRUE)
					{
						for ($j = 0; $j < 12; $j++)
						{
							$total_eDays += $lmonth[$j];
						}
					}
					else
					{
						for ($j = 0; $j < 12; $j++)
						{
							$total_eDays += $month[$j];
						}
					}
				}

				// Count total no. of days in-terms of month
				for ($i = 0; $i < ($mm - 1); $i++)
				{
					if ($this->is_leap_year($yy) === TRUE)
					{
						$total_eDays += $lmonth[$i];
					}
					else
					{
						$total_eDays += $month[$i];
					}
				}

				// Count total no. of days in-terms of date
				$total_eDays += $dd;


				$i           = 0;
				$j           = $def_nmm;
				$total_nDays = $def_ndd;
				$m           = $def_nmm;
				$y           = $def_nyy;

				// Count nepali date from array
				while ($total_eDays != 0)
				{
					$a = $this->_bs[$i][$j];

					$total_nDays++;		//count the days
					$day++;				//count the days interms of 7 days

					if ($total_nDays > $a)
					{
						$m++;
						$total_nDays = 1;
						$j++;
					}

					if ($day > 7)
					{
						$day = 1;
					}

					if ($m > 12)
					{
						$y++;
						$m = 1;
					}

					if ($j > 12)
					{
						$j = 1;
						$i++;
					}

					$total_eDays--;
				}

				$numDay = $day;

				$this->_nep_date['year']    = $y;
				$this->_nep_date['month']   = ($m<10) ? '0'.$m : $m;
				$this->_nep_date['date']    = ($total_nDays<10) ? '0'.$total_nDays : $total_nDays ;
				// $this->_nep_date['day']     = $this->_get_day_of_week($day);
				// $this->_nep_date['nmonth']  = $this->_get_nepali_month($m);
                // $this->_nep_date['num_day'] = $numDay;

                $this->_nep_date = implode('-',$this->_nep_date);
				return $this->_nep_date;
			}
		}


		/**
		 * Currently can only calculate the date between BS 2000-2089
		 *
		 * @param int $yy
		 * @param int $mm
		 * @param int $dd
		 * @return array
		 */
		public function nep_to_eng($date)
		{

        $date_explode = explode('-',$date);

        $yy = $date_explode[0];
        $mm = $date_explode[1];
        $dd = $date_explode[2];


			$def_eyy     = 1913;
			$def_emm     = 4;
			$def_edd     = 14 - 1;	// initial english date.
			$def_nyy     = 1970;
			$def_nmm     = 1;
			$def_ndd     = 1;		// iniital equivalent nepali date.
			$total_eDays = 0;
			$total_nDays = 0;
			$a           = 0;
			$day         = 4 - 1;
			$m           = 0;
			$y           = 0;
			$i           = 0;
			$k           = 0;
			$numDay      = 0;

			$month  = array(
				0,
				31,
				28,
				31,
				30,
				31,
				30,
				31,
				31,
				30,
				31,
				30,
				31
			);
			$lmonth = array(
				0,
				31,
				29,
				31,
				30,
				31,
				30,
				31,
				31,
				30,
				31,
				30,
				31
			);

			// Check for date range
			$chk = $this->_is_in_range_nep($yy, $mm, $dd);

			if ( $chk !== TRUE)
			{
				die($chk);
			}
			else
			{
				// Count total days in-terms of year
				for ($i = 0; $i < ($yy - $def_nyy); $i++)
				{
					for ($j = 1; $j <= 12; $j++)
					{
						$total_nDays += $this->_bs[$k][$j];
					}
					$k++;
				}

				// Count total days in-terms of month
				for ($j = 1; $j < $mm; $j++)
				{
					$total_nDays += $this->_bs[$k][$j];
				}

				// Count total days in-terms of dat
				$total_nDays += $dd;

				// Calculation of equivalent english date...
				$total_eDays = $def_edd;
				$m           = $def_emm;
				$y           = $def_eyy;
				while ($total_nDays != 0)
				{
					if ($this->is_leap_year($y))
					{
						$a = $lmonth[$m];
					}
					else
					{
						$a = $month[$m];
					}

					$total_eDays++;
					$day++;

					if ($total_eDays > $a)
					{
						$m++;
						$total_eDays = 1;
						if ($m > 12)
						{
							$y++;
							$m = 1;
						}
					}

					if ($day > 7)
					{
						$day = 1;
					}

					$total_nDays--;
				}

				$numDay = $day;

				$this->_eng_date['year']    = $y;
				$this->_eng_date['month']   = ($m<10) ? '0'.$m : $m  ;
				$this->_eng_date['date']    = ($total_eDays<10) ? '0'.$total_eDays : $total_eDays;
				// $this->_eng_date['day']     = $this->_get_day_of_week($day);
				// $this->_eng_date['nmonth']  = $this->_get_english_month($m);
                // $this->_eng_date['num_day'] = $numDay;

                $this->_eng_date = implode('-',$this->_eng_date);

				return $this->_eng_date;
			}
        }

        public function get_number_of_days($year, $month){
                return $this->_bs[$year-2000][$month];
        }

	}

//  Example:
//	$cal = new Nepali_Calendar();
//	print_r ($cal->eng_to_nep(2008,11,23));
//	print_r($cal->nep_to_eng(2065,8,8));

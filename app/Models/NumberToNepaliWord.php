<?php

namespace App\Models;

use Exception;

class NumberToNepaliWord
{
    private function check_valid_number($nums)
    {// use $nums > PHP_INT_MAX if error occurred for large numbers
        $nums = intval($nums);
        if($nums>9900000000000 || !is_int($nums))
        {
            throw new Exception("गणकले गन्न सक्ने भन्दा बढी नम्बर हाल्नुभो");

        }
    }
    private $number_list = array('एक', 'दुइ', 'तीन', 'चार', 'पाँच', 'छ', 'सात', 'आठ', 'नौ', 'दश', 'एघार', 'बाह्र', 'तेर', 'चौध', 'पन्ध्र', 'सोर्ह', 'सत्र', 'अठार', 'उन्नाइस', 'बीस','एक्काइस', 'बाईस', 'तेइस', 'चौबिस', 'पच्चीस', 'छब्बीस', 'सत्ताइस', 'अठ्ठाइस', 'उन्नतीस', 'तीस', 'एक्तीस', 'बत्तीस', 'तेत्तीस', 'चौतीस', 'पैतिस', 'छत्तिस', ' सड्तीस', 'अड्तीस', 'उन्नचालीस', 'चालीस','एकचालीस', 'ब्यालीस', 'त्रीचालीस', 'चौबालीस', 'पैतालीस', 'छ्यालीस', 'सड्चालीट्ठ', 'अड्चालीस', 'उन्नपचास', 'पचास', 'एकाउन्न', 'बाउन्न', 'त्रीपन्न', 'चौबन्न', 'पच्पन्न', 'छप्पन्न', 'सन्ताउन्न', 'अन्ठाउन्न', 'उनन्साठ्ठी', 'साठी','एकसाठी', 'ब्यासठ्ठी', 'त्रीसठ्ठी', 'चौसठ्ठी', 'पैसठ्ठी', 'छ्यासठ्ठी', 'सड्सठ्ठी', 'अठ्सठ्ठी', 'उन्नसत्तरी', 'सत्तरी', 'एकत्तर', 'बहत्तर', 'त्रीयत्तर', 'चौरत्तर', 'पचत्तर', 'छ्यातर', 'सत्तर', 'अठ्अार', 'उन्नअसी', 'असी','एकासी', 'बयासी', 'त्रीरासी', 'चौरासी', 'पचासी', 'छ्यासी', 'सतासी', 'अठासी', 'उनानब्बे', 'नब्बे', 'एकानब्बे', 'बयानब्बे', 'त्रीयानब्बे', 'चौरानब्बे', 'पञ्चानब्बे', 'छ्यानब्बे', 'सन्तानब्बे', 'अन्ठानब्बे', 'उनान्सय');
    private $mainlist = array('100000000000'=>'खरव', '1000000000'=>'अरव', '10000000'=>'करोड', '100000'=>'लाख', '1000'=>'हजार', '100'=>'सय');
    private function ten($nums)
    {
        if ($nums>0) {
            return $this->number_list[$nums-1];
        }
    }
    private function nepali_name($nums, $divident)
    {
        $number = floor($nums/$divident);
        if($number>0)
        {
            return $this->number_list[$number-1].' '.$this->mainlist[$divident];
        }
    }
    public function nepali_word($nums)
    {
        $nums = abs($nums);

        $this->check_valid_number($nums);
        $result = '';
        foreach ($this->mainlist as $count => $name)
        {
            $result.= $this->nepali_name($nums, $count).' ';
            $nums = bcmod($nums,$count);
            if($nums<=99)
            {
                $result.= $this->ten($nums);
                return $result;
            }
        }
        return $result;
    }
}

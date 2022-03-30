<?php


class Permutation
{
    private $text;
    private $result = [];
    private $amount;

    public function __construct($text, $amount)
    {
        $this->validateInputValue($text);
        $this->text = str_split($text);
        $this->amount = $amount;
    }


    private function validateInputValue($value) {
        if (strlen($value) <= 1) throw new Exception('Длина строки должна превышать 1');
    }

    public function permutation() {
        return $this->permute($this->amount);
    }

    private function permute($amount , $step = 0, $ch = array(), $result = array())
    {
        if ($amount == 1) {
            for ($k = 0; $k < count($this->text); $k++) {
                if (in_array($k, $ch))
                    continue;
                $prefix = '';
                foreach ($ch as $value) {
                    $prefix .= $this->text[$value];
                }
                $this->result[] = $prefix . $this->text[$k];
            }
        } else {
            for ($i = 0; $i < count($this->text); $i++) {
                if (in_array($i, $ch))
                    continue;
                $ch[$step] = $i;

                $this->permute($amount - 1, $step + 1, $ch, $this->result);
            }
        }
        return $this->result;
    }

    public function maxPermutation()
    {
         $n = $this->fact(count($this->text));
         $divider = count($this->text) - $this->amount;
         $countPerm = $n / $this->fact($divider);
         return $countPerm;
    }


    private function fact($number)
    {
        if ($number <= 0) return 1;
        return $number * $this->fact($number - 1);
    }
}

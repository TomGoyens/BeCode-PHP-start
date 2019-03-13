<?php

class Validator{
  private $charRegEx = '/[^A-Za-z]/';
  private $mailRegEx = '/^[\w][\w.]+[\w]@[\w.]+\.[\w]{2,4}$/i';
  private $doubleDotRegEx = '/\.{2,}/';

  public function charStr($str){
    if (preg_match($this->charRegEx, $str)){
      return false;
    }
    return true;
  }
  public function mailCheck($mail){
    if (preg_match($this->mailRegEx, $mail)){
      if (!preg_match($this->doubleDotRegEx, $mail)){
        return true;
      }
      return false;
    }
    return false;
  }
  public function isInt($i){
    return is_int($i);
  }
  public function isDecimal($i){
    return !$this->isInt($i);
  }
}

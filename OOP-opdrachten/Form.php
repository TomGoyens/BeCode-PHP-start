<?php
class Form{
  private $action;
  private $method = "POST";
  public function __construct(){
    $this->action = $_SERVER['PHP_SELF'];
  }
  public function setAction($action){//create the form action
    $this->action = $action;
  }
  public function getAction(){
    return $this->action;
  }
  public function setMethod($method){//create the form method
    $this->method = $method;
  }
  public function getMethod(){
    return $this->method;
  }

  public function label($name, $text=NULL){
    echo '<label for="'.$name.'" >'.$text.'</label>';
  }
  public function formOpen(){
    echo "<form action='".$this->action."' method='".$this->method."' >";
  }
  public function text($name){
    echo "<input type='text' name='".$name."' />";
  }
  public function submit($name, $value = NULL){
    echo "<input type='submit' name='".$name."' value='".$value."' />";
  }
  public function select($value){
    echo '<select>';
    for ($i = 0; $i < count($value); $i++){
      echo '<option value="'.$value[$i].'">'.ucfirst($value[$i]).'</option>';
    }
    echo '</select>';
  }
  public function radio($name, $value){
    for ($i = 0; $i < count($value); $i++){
      echo '<input type="radio" name="'.$name.'" value="'.$value[$i].'">'.ucfirst($value[$i]).'</br>';
    }
  }
  public function checkbox($name, $value){
    echo '<input type="checkbox" name="'.$name.'" value="'.$value.'">'.ucfirst($value);
  }
  public function textarea($rows, $cols){
    echo '<textarea rows="'.$rows.'" cols="'.$cols.'"></textarea>';
  }
  public function formClose(){
    echo "</form>";
  }
  public function openTag($tag, $attributes = NULL){
    echo '<'.$tag.' '.$attributes.' >';
  }
  public function closeTag($tag){
    echo '</'.$tag.'>';
  }
}

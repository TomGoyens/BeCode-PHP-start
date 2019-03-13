<?php
class Car{
  private $regNum;
  private $dateOfCirculation;
  private $mileage;
  private $model;
  private $brand;
  private $color;
  private $weight;
  function __construct($regNum, $dateOfCirculation, $mileage, $model, $brand, $color, $weight){
    $this->regNum = $regNum;
    $this->dateOfCirculation = $dateOfCirculation;
    $this->mileage = $mileage;
    $this->model = $model;
    $this->brand = $brand;
    $this->color = $color;
    $this->weight = $weight;
  }

  public function addMileage($add){
    $this->mileage = $this->mileage+$add;
  }

  public function weightClass(){
    if ($this->weight > 3.5){
      return "utility";
    }
    return "commercial";
  }
  public function availability(){
    if(strtolower($this->brand) == "audi"){
      return "reserved";
    }
    return "free";
  }
  public function CountryOfOrigin(){
    if (substr($this->regNum, 0, 2) == "BE"){
      return "Belgium";
    } elseif (substr($this->regNum, 0, 2) == "FR"){
      return "France";
    } else{
      return "germany";
    }
  }
  public function vehicleState(){
    if ($this->mileage < 100000){
      return "Practically new.";
    } elseif ($this->mileage > 100000 && $this->mileage < 200000){
      return "Still going somehow.";
    } else{
      return "This thing still works?";
    }
  }
  public function age(){
    $date1 = date("d-m-Y", strtotime($this->dateOfCirculation));
    $date1 = date_create($date1);
    $date2 = new DateTime();
    $age = date_diff($date1,$date2);
    return $age->format("This car is %y years, %m months and %d days old.");
  }
  public function rouler(){//Ouioui, c'est fuckin francais!
    $this->mileage = $this->mileage+100000;
  }
  public function setColor($colour){//Ouioui, c'est fuckin francais!
    $this->color = $colour;
  }
  public function setWeight($mass){//Ouioui, c'est fuckin francais!
    $this->weight = $mass;
  }
  public function display(){//Ouioui, c'est fuckin francais!
    echo "<table>
      <tr>
        <th>Registration number</th>
        <th>Date of Circulation</th>
        <th>Mileage</th>
        <th>Model</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Weight</th>
      </tr>
      <tr>
        <td>'".$this->regNum."'</td>
        <td>'".$this->dateOfCirculation."'</td>
        <td>'".$this->mileage."'</td>
        <td>'".$this->model."'</td>
        <td>'".$this->brand."'</td>
        <td>'".$this->color."'</td>
        <td>'".$this->weight."'</td>
      </tr>
    </table>";
  }
}

<?php

class Html{
  public function meta(){
    echo '<meta charset="utf-8">';
  }
  public function css($href){
    echo '<link href="'.$href.'" rel =" stylesheet " type="text/css" >';
  }
  public function title($title){
    echo '<title>'.$title.'</title>';
  }
  public function img($src, $alt){
    echo '<img src="'.$src.'" alt="'.$alt.'"/>';
}
  public function script($src){
    echo '<script src="'.$src.'"></script>';
  }
  public function link($href, $name){
    echo '<a href="'.$href.'">'.$name.'</a>';
  }
}

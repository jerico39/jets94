<?php

namespace test1;

Class testClass{
  //プロパティ宣言
  private $var = 'test_class';
  private $test_array;
  //コンストラクタ
  function __construct(){
    //echo 'Class of testArry';
      $_SESSION['p_session']=array(
        'ねぎま'=>90,
        'はつ'=>80
      );

    $this->test_array[] = array('name'=>'test1','value'=>'10');
    $this->test_array[] = array('name'=>'test2','value'=>'20');
    $this->test_array[] = array('name'=>'test3','value'=>'30');
  }

  function getTestArray(){

    return $this->test_array;
  }




}
 ?>


<?php
  class stack_prm {
    private $st_mnemonic = [];
    private $st_type = [];
    //private $done = [];
    private $cnt = 0;
    public function push($v){
      $str = preg_replace('/^\s+/', '', $v);
      array_push($this->st_type, $str);
      $str = preg_filter('/{.*}|\(.*\)/', '_', $str);
      if (!$str){ $str = $v; }
      $str = preg_replace('/[\s\t\r\n{}\(\),;:]/', '_', $str);
      $str = preg_replace('/__+/', '_', $str);
      $str = preg_replace('/_+$/', '', $str);
      $str = preg_replace('/^_+/', '', $str);
      array_push($this->st_mnemonic,$str);
      $this->cnt += 1;
    }
    public function pop(){
      //array_push($this->done,$this->st_mnemonic[$this->cnt]);
      array_pop($this->st_mnemonic);
      array_pop($this->st_type);
      $this->cnt--;
    }
    public function mnemonic(){
      return $this->st_mnemonic[$this->cnt-1];
    }
    public function type(){
      return $this->st_type[$this->cnt-1];
    }
    public function empty(){
      return $this->cnt == 0;
    }
  }
?>
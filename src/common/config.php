<?php

require_once('unifier.php');
require_once('stack_prm.php');

if ( !isset($prms) ){

  printTopHeader();

  if ( count($argv) == 1 ){
    $default_type = "long long";
  } else {
    $default_type = "";
    for( $i=0; $i<count($argv); $i++ ){
      if (!$i){ continue; }
      $default_type .= " " . $argv[$i];
    }
    $default_type = preg_replace('/\s\s+/', ' ', $default_type);
    $default_type = preg_replace('/\s$/', '', $default_type);
    $default_type = preg_replace('/^\s$/', '', $default_type);
  }

  $prms = new stack_prm();
  $prms->push($default_type);

}

if ($prms->empty()){
  exit(0);
}

$m = $mnemonic = $prms->mnemonic();
$t = $type = $prms->type();

printCommonHeader($name,$m,$t);

?>
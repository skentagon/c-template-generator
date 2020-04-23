
<?php

function printTopHeader() {
  echo "/*\n======================================================\n";
  echo "C template generator\n";
  echo "\tURL : https://github.com/skentagon/c-template-generator.git\n";
  echo "======================================================\n*/\n";
}

function printCommonHeader($p,$m,$t) {
  echo "/*\n======================================================\n";
  echo "C template generator\n";
  echo "\tclass name : '${p}'\n";
  echo "\ttype : '${t}'\n";
  echo "\tmnemonic : '${m}'\n";
  echo "======================================================\n*/\n";
  return;
}

?>
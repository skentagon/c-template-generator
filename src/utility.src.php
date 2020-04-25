
<?php
  $name = 'list';
  include('common/config.php');
?>

#ifndef C_UTILITY_<?=$m?>_GENERATOR_HEADER_INCLUDED
#define C_UTILITY_<?=$m?>_GENERATOR_HEADER_INCLUDED

void swap_<?=$m?>( <?=$t?>* l, <?=$t?>* r ){ <?=$t?> t = *l; *l = *r; *r = t; }

#endif
<?php
  $name = 'treelist';
  include('common/config.php');
?>

#ifndef C_TREELIST_<?=$m?>_GENERATOR_HEADER_INCLUDED
#define C_TREELIST_<?=$m?>_GENERATOR_HEADER_INCLUDED

/*

tree-list samples
  https://atcoder.jp/contests/abc070/submissions/12890611

*/

#include <stdlib.h>
#include <stddef.h>
#include <stdbool.h>
#include <stdarg.h>

typedef struct {
  <?=$t?> value;
  size_t node;
} treelist_item_<?=$m?>;
//typedef struct treelist_item_<?=$m?>_internal__ treelist_item_<?=$m?>;

<?php
  $prms->push("treelist_item_$m");
  for( $i=0; $i < 1; $i++ ){
    include('list.src.php');
    $prms->pop();
  }
  $m = $mnemonic =  $prms->mnemonic();
  $t = $type = $prms->type();
?>

typedef struct {
  list_treelist_item_<?=$m?>* nodes;
  size_t num;
} treelist_<?=$m?>;

void treelist_constructor_<?=$m?>( treelist_<?=$m?>* l, size_t n ){
  l->num = n;
  l->nodes = (list_treelist_item_<?=$m?>*)malloc( sizeof(list_treelist_item_<?=$m?>) * n );
}
//void treelist_constructor_move_<?=$m?>( treelist_<?=$m?>* l );
//void treelist_constructor_copy_<?=$m?>( treelist_<?=$m?>* l );
void treelist_destructor_<?=$m?>( treelist_<?=$m?>* l );
void treelist_addEdge_<?=$m?>( treelist_<?=$m?>* l, size_t a, size_t b, <?=$t?>* t );
<?=$t?>* treelist_edge_<?=$m?>( treelist_<?=$m?>* l, size_t a, size_t b );
list_treelist_item_<?=$m?>* treelist_edges_<?=$m?>( treelist_<?=$m?>* l, size_t a ){ return &l->nodes[a]; }

void treelist_destructor_<?=$m?>( treelist_<?=$m?>* l ){
  for( size_t i=0; i<l->num; ++i ){
    list_destructor_treelist_item_<?=$m?>(&l->nodes[i]);
  }
  free(l->nodes);
}
void treelist_addEdge_<?=$m?>( treelist_<?=$m?>* l, size_t a, size_t b, <?=$t?>* t ){
  treelist_item_<?=$m?> tmp;
  tmp.value = *t;
  tmp.node = b;
  list_push_back_treelist_item_<?=$m?>( &l->nodes[a], &tmp );
  tmp.node = a;
  list_push_back_treelist_item_<?=$m?>( &l->nodes[b], &tmp );
}
<?=$t?>* treelist_edge_<?=$m?>( treelist_<?=$m?>* l, size_t a, size_t b ){
  for(
    list_item_treelist_item_<?=$m?>* v = list_front_treelist_item_<?=$m?>(&l->nodes[a]);
    v != list_back_treelist_item_<?=$m?>(&l->nodes[a]);
    v = v->next
  ){ if ( v->value.node == b ) return &v->value.value; }
  return NULL;
}


#endif
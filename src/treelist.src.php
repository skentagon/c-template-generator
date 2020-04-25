<?php
  $name = 'treelist';
  include('common/config.php');
?>

#ifndef C_TREELIST_<?=$m?>_GENERATOR_HEADER_INCLUDED
#define C_TREELIST_<?=$m?>_GENERATOR_HEADER_INCLUDED

/*

tree-list samples
  https://atcoder.jp/contests/abc066/submissions/12287482

*/

<?php
  include('list.src.php');
  $m = $mnemonic =  $prms->mnemonic();
  $t = $type = $prms->type();
?>

#include <stdlib.h>
#include <stddef.h>
#include <stdbool.h>
#include <stdarg.h>

struct treelist_<?=$m?> {
  list_<?=$m?>* nodes; 
  size_t num;
}

void treelist_constructor_<?=$m?>( treelist_<?=$m?>* l, size_t n ){
  num = n;
  nodes = malloc( sizeof(list_<?=$m?>) * n );
}
//void treelist_constructor_move_<?=$m?>( treelist_<?=$m?>* l );
//void treelist_constructor_copy_<?=$m?>( treelist_<?=$m?>* l );
void treelist_destructor_<?=$m?>( treelist_<?=$m?>* l );
void treelist_addEdge_<?=$m?>( size_t a, size_t b, <?=$t?>* t );

void treelist_destructor_<?=$m?>( treelist_<?=$m?>* l ){
  for( size_t i=0; i<numl; ++i ){
    list_destructor_<?=$m?>(&nodes[i]);
  }
  free(nodes);
}



void list_constructor_<?=$m?>( list_<?=$m?>* l ){ l->front = l->back = NULL; l->size = 0; };
void list_constructor_n_<?=$m?>( list_<?=$m?>* l, size_t n, <?=$t?>* t = NULL );
void list_constructor_range_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* begin, list_item_<?=$m?>* end );
void list_deconstructor_<?=$m?>( list_<?=$m?>* l );
bool list_empty_<?=$m?>( list_<?=$m?>* l ){ return l->front == NULL; };
size_t list_size_<?=$m?>( list_<?=$m?>* l ){ return l->size; };
//size_t list_max_size_<?=$m?>( list_<?=$m?>* l );
list_<?=$m?>* list_resize_<?=$m?>( list_<?=$m?>* l, size_t sz );
list_<?=$m?>* list_resize_default_<?=$m?>( list_<?=$m?>* l, size_t sz, <?=$t?>* p );
list_item_<?=$m?>* list_front_<?=$m?>( list_<?=$m?>* l ){ return l->front; };
list_item_<?=$m?>* list_back_<?=$m?>( list_<?=$m?>* l ){ return l->back; };
list_item_<?=$m?>* list_push_front_<?=$m?>( list_<?=$m?>* l, <?=$t?>* p );
list_item_<?=$m?>* list_push_back_<?=$m?>( list_<?=$m?>* l, <?=$t?>* p );
list_item_<?=$m?>* list_push_front_empty_<?=$m?>( list_<?=$m?>* l );
list_item_<?=$m?>* list_push_back_empty_<?=$m?>( list_<?=$m?>* l );
list_item_<?=$m?>* list_insert_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm, <?=$t?>* p );
list_item_<?=$m?>* list_insert_va_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm, int num, ... );
list_item_<?=$m?>* list_insert_multiple_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm, int num, <?=$t?>* p );
list_item_<?=$m?>* list_pop_front_<?=$m?>( list_<?=$m?>* l );
list_item_<?=$m?>* list_pop_back_<?=$m?>( list_<?=$m?>* l );
list_item_<?=$m?>* list_erase_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm );
list_item_<?=$m?>* list_erase_range_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* bgn, list_item_<?=$m?>* end );
list_item_<?=$m?>* list_erase_if_<?=$m?>( list_<?=$m?>* l, bool(*f)(list_item_<?=$m?>*,list_item_<?=$m?>*) );
list_<?=$m?>* list_clear_<?=$m?>( list_<?=$m?>* l );
void list_swap_<?=$m?>( list_<?=$m?>* l, list_<?=$m?>* r ){ swap_list_<?=$m?>(l,r); }
void list_swap_item_<?=$m?>( list_item_<?=$m?>* l, list_item_<?=$m?>* r ){ swap_list_item_<?=$m?>(l,r); }
list_<?=$m?>* list_splice_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* pos, list_<?=$m?>* r );
list_<?=$m?>* list_splice_item_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* pos, list_<?=$m?>* r, list_item_<?=$m?>* itm );
//list_<?=$m?>* list_splice_range_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* pos, list_<?=$m?>* r, list_item_<?=$m?>* bgn, list_item_<?=$m?>* end );
size_t list_remove_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm ){ list_erase_<?=$m?>(l,itm); }
//size_t list_remove_if_<?=$m?>( list_<?=$m?>* l, bool(*f)(list_item_<?=$m?>*) );
//list_<?=$m?>* list_unique_<?=$m?>( list_<?=$m?>* l );
//list_<?=$m?>* list_unique_if_<?=$m?>( list_<?=$m?>* l, bool(*f)(list_item_<?=$m?>*,list_item_<?=$m?>*) );
list_<?=$m?>* list_merge_<?=$m?>( list_<?=$m?>* l, list_<?=$m?>* r );
//list_<?=$m?>* list_merge_if_<?=$m?>( list_<?=$m?>* l, list_<?=$m?>* r, bool(*f)(list_int_item*,list_int_item*) );
list_<?=$m?>* list_sort_<?=$m?>( list_<?=$m?>* l );
//list_<?=$m?>* list_sort_if_<?=$m?>( list_<?=$m?>* l, bool(*f)(list_item_<?=$m?>*,list_item_<?=$m?>*) );
//list_<?=$m?>* list_reverse_<?=$m?>( list_<?=$m?>* l );

void list_constructor_range_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* begin, list_item_<?=$m?>* end ){
  list_constructor_<?=$m?>(l);
  for( list_item_<?=$m?>* t=begin; t!=end; t=t->next ){
    list_push_back_<?=$m?>(l,&t->value)
  }
}
void list_deconstructor_<?=$m?>( list_<?=$m?>* l ){ list_clear_<?=$m?>(l); }
list_<?=$m?>* list_resize_<?=$m?>( list_<?=$m?>* l, size_t sz ){
  while( list_size_<?=$m?>(l) > sz ){ list_erase_<?=$m?>(l,list_back_<?=$m?>(l)); }
  while( list_size_<?=$m?>(l) < sz ){ list_push_back_empty_<?=$m?>(l); }
  return l;
};
list_<?=$m?>* list_resize_default_<?=$m?>( list_<?=$m?>* l, size_t sz, <?=$t?>* p ){
  while( list_size_<?=$m?>(l) > sz ){ list_erase_<?=$m?>(l,list_back_<?=$m?>(l)); }
  while( list_size_<?=$m?>(l) < sz ){ list_push_back_<?=$m?>(l,p); }
  return l;
};
list_item_<?=$m?>* list_push_front_<?=$m?>( list_<?=$m?>* l, <?=$t?>* p ){
  list_item_<?=$m?>* t = list_push_front_empty_<?=$m?>(l);
  if (!t){ return NULL; }
  t->value = *p;
  return t;
};
list_item_<?=$m?>* list_push_back_<?=$m?>( list_<?=$m?>* l, <?=$t?>* p ){
  list_item_<?=$m?>* t = list_push_back_empty_<?=$m?>(l);
  if (!t){ return NULL; }
  t->value = *p;
  return t;
};
list_item_<?=$m?>* list_push_front_empty_<?=$m?>( list_<?=$m?>* l ){
  list_item_<?=$m?>* t = (list_item_<?=$m?>*)malloc(sizeof(list_item_<?=$m?>));
  if (!t)return NULL;
  if (list_empty_<?=$m?>(l)){
    l->front = l->back = t;
    l->front->prev = l->front->prev = NULL;
  } else {
    l->front->prev = t;
    l->front->prev->next = l->front;
    l->front = l->front->prev;
    l->front->prev = NULL;
  }
  return t;
};
list_item_<?=$m?>* list_push_back_empty_<?=$m?>( list_<?=$m?>* l ){
  list_item_<?=$m?>* t = (list_item_<?=$m?>*)malloc(sizeof(list_item_<?=$m?>));
  if (!t)return NULL;
  if (list_empty_<?=$m?>(l)){
    l->front = l->back = t;
    l->front->prev = l->front->prev = NULL;
  } else {
    l->back->next = t;
    l->back->next->prev = l->back;
    l->back = l->back->next;
    l->back->next = NULL;
  }
  return t;
};
list_item_<?=$m?>* list_insert_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm, <?=$t?>* p ){
  list_item_<?=$m?>* t = (list_item_<?=$m?>*)malloc(sizeof(list_item_<?=$m?>));
  if ( t == NULL )return NULL;
  if ( l->back == itm )l->back = t;
  t->next = itm->next;
  t->prev = itm;
  itm->next = t;
  if ( t->next != NULL )t->next->prev = t;
  return t;
};
list_item_<?=$m?>* list_insert_va_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm, int num, ... ){
  va_list args; va_start( args, num );
  list_item_<?=$m?>* itr = itm;
  for( int i=0; i<num; ++i ) itr = list_insert_<?=$m?>( l, itr, va_arg(args,<?=$t?>*) );
  va_end(args);
  return itr;
};
list_item_<?=$m?>* list_insert_multiple_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm, int num, <?=$t?>* p ){
  list_item_<?=$m?>* itr = itm;
  for( int i=0; i<num; ++i ) itr = list_insert_<?=$m?>( l, itr, p );
  return itr;
}
list_item_<?=$m?>* list_pop_front_<?=$m?>( list_<?=$m?>* l ){ list_erase_<?=$m?>(l,l->front); }
list_item_<?=$m?>* list_pop_back_<?=$m?>( list_<?=$m?>* l ){ list_erase_<?=$m?>(l,l->back); }
list_item_<?=$m?>* list_erase_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* itm ){
  list_item_<?=$m?>* t;
  if ( itm->prev ){
    if ( itm->next ){
      itm->prev->next = itm->next;
      t = itm->next;
    } else {
      itm->prev->next = NULL;
      l->back = itm->prev;
      t = itm->prev;
    }
  } else {
    if ( itm->next ){
      itm->next->prev = NULL;
      l->front = itm->next;
      t = itm->next;
    } else { l->front = l->back = t = NULL; }
  }
  free(itm); --l->size;
  return t;
};
list_item_<?=$m?>* list_erase_range_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* bgn, list_item_<?=$m?>* end ){
  list_item_<?=$m?>* t = bgn;
  end->prev = bgn->prev;
  if ( !bgn->prev ){ l->front = end; }
  while( t != end ){
    t = t->next;
    free(t->prev);
    --l->size;
  }
  return end;
};
list_<?=$m?>* list_clear_<?=$m?>( list_<?=$m?>* l ){
  list_item_<?=$m?>* t = l->front;
  if (!t)return l;
  while(t->next){t=t->next;free(t->prev);}
  free(l->back);
  l->front = l->back = NULL;
  l->size = 0;
  return l;
};
list_<?=$m?>* list_splice_<?=$m?>( list_<?=$m?>* l, list_item_<?=$m?>* pos, list_<?=$m?>* r ){
  if (r->size){
    l->size +=  r->size;
    r->front->prev = pos;
    r->back->next = pos->next;
    pos->next->prev = r->back;
    pos->next = r->front;
    r->front = r->back = NULL;
    r->size = 0;
  }
  return l;
};
list_<?=$m?>* list_sort_<?=$m?>( list_<?=$m?>* l ){}
list_<?=$m?>* list_merge_<?=$m?>( list_<?=$m?>* l, list_<?=$m?>* r ){}

#endif
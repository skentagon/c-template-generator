
<?php
  $name = 'list';
  include('common/config.php');
?>

#ifndef C_LIST_<?=$m?>_GENERATOR_HEADER_INCLUDED
#define C_LIST_<?=$m?>_GENERATOR_HEADER_INCLUDED

/*

list samples
  https://atcoder.jp/contests/abc066/submissions/11643502

*/

<?php
  $prms->push("list_item_$m");
  $prms->push("list_$m");
  $prms->push("list_item_ptr_$m");
  for( $i=0; $i < 3; $i++ ){
    include('utility.src.php');
    $prms->pop();
  }
  $m = $mnemonic =  $prms->mnemonic();
  $t = $type = $prms->type();
?>

#include <stdlib.h>
#include <stddef.h>
#include <stdbool.h>
#include <stdarg.h>

struct list_item_<?=$m?>_internal__ {
  <?=$t?> value;
  struct list_item_<?=$m?>_internal__* prev;
  struct list_item_<?=$m?>_internal__* next;
};
typedef struct list_item_<?=$m?>_internal__ list_item_<?=$m?>;

typedef struct {
  list_item_<?php echo $mnemonic?>* front;
  list_item_<?php echo $mnemonic?>* back;
  size_t size;
} list_<?php echo $mnemonic?>;

typedef struct list_item_<?php echo $mnemonic?>_internal__* list_item_ptr_<?php echo $mnemonic?>;

<?php
  $prms->push("list_item_$m");
  $prms->push("list_$m");
  $prms->push("list_item_ptr_$m");
  for( $i=0; $i < 3; $i++ ){
    include('utility.src.php');
    $prms->pop();
  }
  $m = $mnemonic =  $prms->mnemonic();
  $t = $type = $prms->type();
?>

//void swap_list_<?=$m?>( list_<?php echo $mnemonic?>* l, list_<?php echo $mnemonic?>* r ){ list_<?php echo $mnemonic?> t = *l; *l = *r; *r = t; }
//void swap_list_item_<?php echo $mnemonic?>( list_item_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* r ){ list_item_<?php echo $mnemonic?> t = *l; *l = *r; *r = t; }

list_<?php echo $mnemonic?>* list_constructor_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ l->front = l->back = NULL; l->size = 0; return l; };
void list_deconstructor_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
bool list_empty_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ return l->front == NULL; };
size_t list_size_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ return l->size; };
//size_t list_max_size_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
list_<?php echo $mnemonic?>* list_resize_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, size_t sz );
list_<?php echo $mnemonic?>* list_resize_default_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, size_t sz, <?php echo $type?>* p );
list_item_<?php echo $mnemonic?>* list_front_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ return l->front; };
list_item_<?php echo $mnemonic?>* list_back_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ return l->back; };
list_item_<?php echo $mnemonic?>* list_push_front_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, <?php echo $type?>* p );
list_item_<?php echo $mnemonic?>* list_push_back_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, <?php echo $type?>* p );
list_item_<?php echo $mnemonic?>* list_push_front_empty_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
list_item_<?php echo $mnemonic?>* list_push_back_empty_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
list_item_<?php echo $mnemonic?>* list_insert_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm, <?php echo $type?>* p );
list_item_<?php echo $mnemonic?>* list_insert_va_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm, int num, ... );
list_item_<?php echo $mnemonic?>* list_insert_multiple_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm, int num, <?php echo $type?>* p );
list_item_<?php echo $mnemonic?>* list_pop_front_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
list_item_<?php echo $mnemonic?>* list_pop_back_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
list_item_<?php echo $mnemonic?>* list_erase_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm );
list_item_<?php echo $mnemonic?>* list_erase_range_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* bgn, list_item_<?php echo $mnemonic?>* end );
list_item_<?php echo $mnemonic?>* list_erase_if_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, bool(*f)(list_item_<?php echo $mnemonic?>*,list_item_<?php echo $mnemonic?>*) );
list_<?php echo $mnemonic?>* list_clear_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
void list_swap_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_<?php echo $mnemonic?>* r ){ swap_list_<?php echo $mnemonic?>(l,r); }
void list_swap_item_<?php echo $mnemonic?>( list_item_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* r ){ swap_list_item_<?php echo $mnemonic?>(l,r); }
list_<?php echo $mnemonic?>* list_splice_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* pos, list_<?php echo $mnemonic?>* r );
list_<?php echo $mnemonic?>* list_splice_item_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* pos, list_<?php echo $mnemonic?>* r, list_item_<?php echo $mnemonic?>* itm );
//list_<?php echo $mnemonic?>* list_splice_range_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* pos, list_<?php echo $mnemonic?>* r, list_item_<?php echo $mnemonic?>* bgn, list_item_<?php echo $mnemonic?>* end );
size_t list_remove_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm ){ list_erase_<?php echo $mnemonic?>(l,itm); }
//size_t list_remove_if_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, bool(*f)(list_item_<?php echo $mnemonic?>*) );
//list_<?php echo $mnemonic?>* list_unique_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
//list_<?php echo $mnemonic?>* list_unique_if_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, bool(*f)(list_item_<?php echo $mnemonic?>*,list_item_<?php echo $mnemonic?>*) );
//list_<?php echo $mnemonic?>* list_merge_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_<?php echo $mnemonic?>* r );
//list_<?php echo $mnemonic?>* list_merge_if_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_<?php echo $mnemonic?>* r, bool(*f)(list_int_item*,list_int_item*) );
//list_<?php echo $mnemonic?>* list_sort_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );
//list_<?php echo $mnemonic?>* list_sort_if_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, bool(*f)(list_item_<?php echo $mnemonic?>*,list_item_<?php echo $mnemonic?>*) );
//list_<?php echo $mnemonic?>* list_reverse_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l );

void list_deconstructor_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ list_clear_<?php echo $mnemonic?>(l); }
list_<?php echo $mnemonic?>* list_resize_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, size_t sz ){
  while( list_size_<?php echo $mnemonic?>(l) > sz ){ list_erase_<?php echo $mnemonic?>(l,list_back_<?php echo $mnemonic?>(l)); }
  while( list_size_<?php echo $mnemonic?>(l) < sz ){ list_push_back_empty_<?php echo $mnemonic?>(l); }
  return l;
};
list_<?php echo $mnemonic?>* list_resize_default_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, size_t sz, <?php echo $type?>* p ){
  while( list_size_<?php echo $mnemonic?>(l) > sz ){ list_erase_<?php echo $mnemonic?>(l,list_back_<?php echo $mnemonic?>(l)); }
  while( list_size_<?php echo $mnemonic?>(l) < sz ){ list_push_back_<?php echo $mnemonic?>(l,p); }
  return l;
};
list_item_<?php echo $mnemonic?>* list_push_front_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, <?php echo $type?>* p ){
  list_item_<?php echo $mnemonic?>* t = list_push_front_empty_<?php echo $mnemonic?>(l);
  if (!t){ return NULL; }
  t->value = *p;
  return t;
};
list_item_<?php echo $mnemonic?>* list_push_back_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, <?php echo $type?>* p ){
  list_item_<?php echo $mnemonic?>* t = list_push_back_empty_<?php echo $mnemonic?>(l);
  if (!t){ return NULL; }
  t->value = *p;
  return t;
};
list_item_<?php echo $mnemonic?>* list_push_front_empty_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){
  list_item_<?php echo $mnemonic?>* t = (list_item_<?php echo $mnemonic?>*)malloc(sizeof(list_item_<?php echo $mnemonic?>));
  if (!t)return NULL;
  if (list_empty_<?php echo $mnemonic?>(l)){
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
list_item_<?php echo $mnemonic?>* list_push_back_empty_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){
  list_item_<?php echo $mnemonic?>* t = (list_item_<?php echo $mnemonic?>*)malloc(sizeof(list_item_<?php echo $mnemonic?>));
  if (!t)return NULL;
  if (list_empty_<?php echo $mnemonic?>(l)){
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
list_item_<?php echo $mnemonic?>* list_insert_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm, <?php echo $type?>* p ){
  list_item_<?php echo $mnemonic?>* t = (list_item_<?php echo $mnemonic?>*)malloc(sizeof(list_item_<?php echo $mnemonic?>));
  if ( t == NULL )return NULL;
  if ( l->back == itm )l->back = t;
  t->next = itm->next;
  t->prev = itm;
  itm->next = t;
  if ( t->next != NULL )t->next->prev = t;
  return t;
};
list_item_<?php echo $mnemonic?>* list_insert_va_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm, int num, ... ){
  va_list args; va_start( args, num );
  list_item_<?php echo $mnemonic?>* itr = itm;
  for( int i=0; i<num; ++i ) itr = list_insert_<?php echo $mnemonic?>( l, itr, va_arg(args,<?php echo $type?>*) );
  va_end(args);
  return itr;
};
list_item_<?php echo $mnemonic?>* list_insert_multiple_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm, int num, <?php echo $type?>* p ){
  list_item_<?php echo $mnemonic?>* itr = itm;
  for( int i=0; i<num; ++i ) itr = list_insert_<?php echo $mnemonic?>( l, itr, p );
  return itr;
}
list_item_<?php echo $mnemonic?>* list_pop_front_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ list_erase_<?php echo $mnemonic?>(l,l->front); }
list_item_<?php echo $mnemonic?>* list_pop_back_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){ list_erase_<?php echo $mnemonic?>(l,l->back); }
list_item_<?php echo $mnemonic?>* list_erase_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* itm ){
  list_item_<?php echo $mnemonic?>* t;
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
list_item_<?php echo $mnemonic?>* list_erase_range_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* bgn, list_item_<?php echo $mnemonic?>* end ){
  list_item_<?php echo $mnemonic?>* t = bgn;
  end->prev = bgn->prev;
  if ( !bgn->prev ){ l->front = end; }
  while( t != end ){
    t = t->next;
    free(t->prev);
    --l->size;
  }
  return end;
};
list_<?php echo $mnemonic?>* list_clear_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l ){
  list_item_<?php echo $mnemonic?>* t = l->front;
  if (!t)return l;
  while(t->next){t=t->next;free(t->prev);}
  free(l->back);
  l->front = l->back = NULL;
  l->size = 0;
  return l;
};
list_<?php echo $mnemonic?>* list_splice_<?php echo $mnemonic?>( list_<?php echo $mnemonic?>* l, list_item_<?php echo $mnemonic?>* pos, list_<?php echo $mnemonic?>* r ){
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

#endif
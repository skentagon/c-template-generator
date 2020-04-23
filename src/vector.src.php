
<?php
  $name = 'vector';
  include('config.php');
?>

#ifndef C_VECTOR_<?=$m?>_GENERATOR_HEADER_INCLUDED
#define C_VECTOR_<?=$m?>_GENERATOR_HEADER_INCLUDED

/*
vector samples:

*/

#include <stdint.h>

typedef struct {
  <?=$t?>* data;
  size_t size;
  size_t capacity;
} vector_<?=$m?>;

typedef <?=$t?>* vector_iterator_<?=$m?>;

<?php
  $prms->push("vector_$m");
  for( $i=0; $i < 1; $i++ ){
    include('utility.src.php');
    $prms->pop();
  }
  $m = $mnemonic =  $prms->mnemonic();
  $t = $type = $prms->type();
?>

vector_<?=$m?>* vector_<?=$m?>_constructor();
vector_<?=$m?>* vector_<?=$m?>_constructor_n( size_t n );
vector_<?=$m?>* vector_<?=$m?>_constructor_nrepeat( size_t n, <?=$t?>* value );
vector_<?=$m?>* vector_<?=$m?>_constructor_copy( vector_<?=$m?>* x );
vector_<?=$m?>* vector_<?=$m?>_constructor_move( vector_<?=$m?>* x )
vector_<?=$m?>* vector_<?=$m?>_constructor_range( <?=$t?>* begin, <?=$t?>* end );
void vector_<?=$m?>_destructor();

vector_<?=$m?>* vector_<?=$m?>_copy( vector_<?=$m?>* x );
vector_<?=$m?>* vector_<?=$m?>_move( vector_<?=$m?>* x );

size_t vector_<?=$m?>_size( vector_<?=$m?>* this ){ return this->size; }
size_t vector_<?=$m?>_max_size( vector_<?=$m?>* this ){ return SIZE_MAX; }
void vector_<?=$m?>_resize( vector_<?=$m?>* this, size_t sz );
void vector_<?=$m?>_resize_copy( vector_<?=$m?>* this, size_t sz, <?=$t?>* c );
size_t vector_<?=$m?>_capacity( vector_<?=$m?>* this ){ return this->capacity; }
bool vector_<?=$m?>_empty( vector_<?=$m?>* this );
bool vector_<?=$m?>_reserve( vector_<?=$m?>* this, size_t n );
void vector_<?=$m?>_shrink_to_fit( vector_<?=$m?>* this );

vector_iterator_<?=$m?> vector_<?=$m?>_at( vector_<?=$m?>* this, size_t n ){ return this->data+n; }
vector_iterator_<?=$m?> vector_<?=$m?>_data( vector_<?=$m?>* this ){ return this->data; }
vector_iterator_<?=$m?> vector_<?=$m?>_front( vector_<?=$m?>* this ){ return this->data; }
vector_iterator_<?=$m?> vector_<?=$m?>_back( vector_<?=$m?>* this ){ return this->data+size-1; }

void vector_<?=$m?>_assign( vector_<?=$m?>* this, vector_iterator_<?=$m?>* first, vector_iterator_<?=$m?>* last );
void vector_<?=$m?>_assign_range( vector_<?=$m?>* this, size_t n, <?=$t?>* u );
vector_<?=$m?>_push_back( vector_<?=$m?>* this, <?=$t?>* x );
vector_<?=$m?>_pop_back( vector_<?=$m?>* this, <?=$t?>* x );
vector_<?=$m?>_insert( vector_<?=$m?>* this, vector_iterator_<?=$m?> position, <?=$t?>* x, size_t n = 0 );
vector_<?=$m?>_insert( vector_<?=$m?>* this, vector_iterator_range_<?=$m?> position, vector_iterator_<?=$m?> first, vector_iterator_<?=$m?> second );
vector_<?=$m?>_erase( vector_<?=$m?>* this, vector_iterator_<?=$m?> position );
vector_<?=$m?>_erase_range( vector_<?=$m?>* this, vector_iterator_<?=$m?> first, vector_iterator_<?=$m?> last );
vector_<?=$m?>_swap( vector_<?=$m?>* this, vector_<?=$m?>* x );
vector_<?=$m?>_clear( vector_<?=$m?>* this );

#endif
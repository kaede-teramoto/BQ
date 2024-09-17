<?php
/*
 * This is search.
 *
 * @package BOUTiQ
 */
/*--------------------------------------------------------------
   Search results exclude the page other than the normal post from
 --------------------------------------------------------------*/
function atq_search_filter($query)
{
  if (!$query->is_admin && $query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', 'atq_search_filter');

/*--------------------------------------------------------------
  search widget customize
--------------------------------------------------------------*/
function atq_search_form($form)
{
  $form = '<form method="get" id="search__form" action="' . home_url() . '/" class="form-inline">
<div>
<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />
</div>
</form>';
  return $form;
}
add_filter('get_search_form', 'atq_search_form');

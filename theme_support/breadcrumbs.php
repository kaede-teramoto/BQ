<?php
/*
 * This is breadcrumbs
 *
 * @package BOUTiQ
 */
/*--------------------------------------------------------------
   breadcrumbs
 --------------------------------------------------------------*/
function boutiq_breadcrumb()
{
        echo '<div><ul id="crumbs" class="breadcrumb">';
        if (!is_home()) {
                echo '<li><a href="';
                echo home_url();
                echo '">';
                echo '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ';
                        the_category(' </li><li><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>  ');
                        if (is_single()) {
                                echo '</li><li><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ';
                                the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ';
                        echo the_title();
                        echo '</li>';
                }
        } elseif (is_tag()) {
                single_tag_title();
        } elseif (is_day()) {
                echo "<li>Archive for ";
                get_the_date('F jS, Y');
                echo '</li>';
        } elseif (is_month()) {
                echo "<li>Archive for ";
                get_the_date('F, Y');
                echo '</li>';
        } elseif (is_year()) {
                echo "<li>Archive for ";
                get_the_date('Y');
                echo '</li>';
        } elseif (is_author()) {
                echo "<li>Author Archive";
                echo '</li>';
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
                echo "<li>Blog Archives";
                echo '</li>';
        } elseif (is_search()) {
                echo "<li>Search Results";
                echo '</li>';
        }
        echo '</ul></div>';
}

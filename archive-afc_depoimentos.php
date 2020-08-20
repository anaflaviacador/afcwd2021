<?php get_header(); 
$urlHome = esc_url(home_url('/'));
echo '<section id="depoimentos-incriveis">';
	echo '<div class="container">';
		echo '<span class="gutter-sizer"></span><span class="grid-sizer"></span>';
		afc_depoimentos(-1);
	echo '</div>';
echo '</section>';
get_footer();
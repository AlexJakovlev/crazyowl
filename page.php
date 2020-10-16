<?php
	/**
	 * The main template file for Saturblade theme.
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Saturblade
	 */

	get_header();
?>

	<main class="content">
      <div class="wrapper">
         <section class="section section_static">
            <?php
               if( have_posts() ):
                  while( have_posts() ): the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <div><?php the_content(); ?></div>
                  <?php
                  endwhile;
               else :
                  ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
               <?php endif; ?>
         </section>
      </div>

	   <?php get_footer(); ?>
	</main>
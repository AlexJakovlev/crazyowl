<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Saturblade
 */

?>

   <footer class="footer">
      <div class="top-footer">
          <?php dynamic_sidebar( 'Top-footer' ) ?>
      </div>
      <div class="main-footer">

          <nav class="main-footer__item">
            <h6 class="main-footer__item-header">Site Map</h6>
              <?php dynamic_sidebar( 'footer-1' ) ?>
         </nav>
         <nav class="main-footer__item main-footer__item_big">
            <h6 class="main-footer__item-header">
               <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ) ?>">Shop</a>
            </h6>
             <?php dynamic_sidebar( 'footer-2' ) ?>
         </nav>
         <nav class="main-footer__item">
            <h6 class="main-footer__item-header">Contact Us</h6>
             <?php dynamic_sidebar( 'footer-3' ) ?>
         </nav>
      </div>
   </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>

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
            <ul class="main-footer__item-list">
               <li class="main-footer__item-list-item"><a href="#">"Conqueror" Triumph Seal</a></li>
               <li class="main-footer__item-list-item"><a href="#">"Flawless" Triumph Seal</a></li>
               <li class="main-footer__item-list-item"><a href="#">"Almighty" Triumph Seal</a></li>
               <li class="main-footer__item-list-item"><a href="#">Raids</a></li>
               <li class="main-footer__item-list-item"><a href="#">Exotic Missions</a></li>
               <li class="main-footer__item-list-item"><a href="#">Dungeons</a></li>
               <li class="main-footer__item-list-item"><a href="#">Trials of Osiris</a></li>
               <li class="main-footer__item-list-item"><a href="#">Pinnacle & Ritual Weapons</a></li>
               <li class="main-footer__item-list-item"><a href="#">Iron Banner</a></li>
               <li class="main-footer__item-list-item"><a href="#">Valor & Glory Points</a></li>
               <li class="main-footer__item-list-item"><a href="#">Story & DLC Campaigns</a></li>
               <li class="main-footer__item-list-item"><a href="#">Power Levelling</a></li>
               <li class="main-footer__item-list-item"><a href="#">Seasonal Rank Levelling</a></li>
               <li class="main-footer__item-list-item"><a href="#">Bundles</a></li>
               <li class="main-footer__item-list-item"><a href="#">Milestones</a></li>
            </ul>
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

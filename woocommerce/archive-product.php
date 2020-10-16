<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<!--Content-->
<main class="content">
   <div class="wrapper">
      <div class="section section_static">
         <div class="wrapper_thin">
            <h2>Raids, dungeons & missions</h2>
            <div class="products">
               <div class="products__item">
                  <div class="products__item-top">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/tiger_release_final_20200409_205454.jpg"
                          class="products__img" />
                     <div class="products__item-part">
                        <h5 class="products__description-title">Whispers of the Worm (Normal + Full Catalyst + Ship)</h5>
                        <span class="products__item-price">$69.69</span>
                        <span class="products__item-labels">
                           <span class="products__item-label products__item-label_new">New</span>
                           <span class="products__item-label products__item-label_hot"><i class="far fa-clock"></i></span>
                        </span>
                     </div>
                  </div>
                  <div class="products__description">
                     <p class="products__description-text">Необходимо найти Van Darkholme’а на планете Fisting и отжать его заначку.</p>
                     <div>
                        <p class="products__description-requirements">This product have requirements</p>
                        <label for="urgent-1" class="products__description-checkbox-label">
                           <input type="checkbox" id="urgent-1">
                           <span>Срочность выполнения</span>
                        </label>
                        <select name="" id="" class="products__description-select">
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                        </select>
                        <div class="products__btns">
                           <button class="btn btn-danger products__btn">Buy now</button>
                           <button class="btn btn-danger products__btn">Add to cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="products__item">
                  <div class="products__item-top">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/tiger_release_final_20200409_205454.jpg"
                          class="products__img" />
                     <div class="products__item-part">
                        <h5 class="products__description-title">Whispers of the Worm (Normal + Full Catalyst + Ship)</h5>
                        <span class="products__item-price">$69.69</span>
                        <span class="products__item-labels">
                        <span class="products__item-label products__item-label_new">New</span>
                     </span>
                     </div>
                  </div>
                  <div class="products__description">
                     <p class="products__description-text">Необходимо найти Van Darkholme’а на планете Fisting и отжать его заначку.</p>
                     <div>
                        <p class="products__description-requirements">This product have requirements</p>
                        <label for="urgent-1" class="products__description-checkbox-label">
                           <input type="checkbox" id="urgent-1">
                           <span>Срочность выполнения</span>
                        </label>
                        <select name="" id="" class="products__description-select">
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                        </select>
                        <div class="products__btns">
                           <button class="btn btn-danger products__btn">Buy now</button>
                           <button class="btn btn-danger products__btn">Add to cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="products__item">
                  <div class="products__item-top">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/tiger_release_final_20200409_205454.jpg"
                          class="products__img" />
                     <div class="products__item-part">
                        <h5 class="products__description-title">Whispers of the Worm (Normal + Full Catalyst + Ship)</h5>
                        <span class="products__item-price">$69.69</span>
                        <span class="products__item-labels">
                        <span class="products__item-label products__item-label_new">New</span>
                     </span>
                     </div>
                  </div>
                  <div class="products__description">
                     <p class="products__description-text">Необходимо найти Van Darkholme’а на планете Fisting и отжать его заначку.</p>
                     <div>
                        <p class="products__description-requirements">This product have requirements</p>
                        <label for="urgent-1" class="products__description-checkbox-label">
                           <input type="checkbox" id="urgent-1">
                           <span>Срочность выполнения</span>
                        </label>
                        <select name="" id="" class="products__description-select">
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                        </select>
                        <div class="products__btns">
                           <button class="btn btn-danger products__btn">Buy now</button>
                           <button class="btn btn-danger products__btn">Add to cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="products__item products__advert-block">
                  <p class="products__advert-text">
                     Здесь должен быть текст с удержанием для покупателя, но я не еду зачем он вообще нужен потому что на мой
                     взгляд он только лишний. А также мне не дали ни текста, ни намёка как его сделать. Поэтому вы видите этот
                     бесполезный текст.
                  </p>
                  <button class="btn btn-danger products__btn_advert">Hello world</button>
               </div>
               <div class="products__item">
                  <div class="products__item-top">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/tiger_release_final_20200409_205454.jpg"
                          class="products__img" />
                     <div class="products__item-part">
                        <h5 class="products__description-title">Whispers of the Worm (Normal + Full Catalyst + Ship)</h5>
                        <span class="products__item-price">$69.69</span>
                        <span class="products__item-labels">
                        <span class="products__item-label products__item-label_new">New</span>
                     </span>
                     </div>
                  </div>
                  <div class="products__description">
                     <p class="products__description-text">Необходимо найти Van Darkholme’а на планете Fisting и отжать его заначку.</p>
                     <div>
                        <p class="products__description-requirements">This product have requirements</p>
                        <label for="urgent-1" class="products__description-checkbox-label">
                           <input type="checkbox" id="urgent-1">
                           <span>Срочность выполнения</span>
                        </label>
                        <select name="" id="" class="products__description-select">
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                           <option value="Dungeon master">Dungeon master</option>
                        </select>
                        <div class="products__btns">
                           <button class="btn btn-danger products__btn">Buy now</button>
                           <button class="btn btn-danger products__btn">Add to cart</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php
      get_footer( 'shop' );
   ?>
</main>

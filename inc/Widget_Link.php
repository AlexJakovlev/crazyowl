<?php
class LinkWidget extends WP_Widget {

    /*
     * создание виджета
     */
    function __construct() {
        parent::__construct(
            'Link-page',
            'Link-page', // заголовок виджета
            array( 'description' => 'Позволяет вывести линки страниц' ) // описание
        );
    }

    /*
     * фронтэнд виджета
     */
    public function widget( $args, $instance ) {
//        $title = $instance['title'] ; // к заголовку применяем фильтр (необязательно)
        $Link = $instance['Link-page'];

        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        $q = new WP_Query("Link-page=$Link");
        if( $q->have_posts() ):
            ?><ul><?php
            while( $q->have_posts() ): $q->the_post();
                ?><li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><?php echo $Link ?></li><?php
            endwhile;
            ?></ul><?php
        endif;
        wp_reset_postdata();

        echo $args['after_widget'];
    }

    /*
     * бэкэнд виджета
     */
    public function form( $instance ) {
//        if ( isset( $instance[ 'title' ] ) ) {
//            $title = $instance[ 'title' ];
//        }
        if ( isset( $instance[ 'Link-page' ] ) ) {
            $Link = $instance[ 'Link-page' ];
        }
        ?>
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id( 'title' ); ?><!--">Заголовок</label>-->
<!--            <input class="widefat" id="--><?php //echo $this->get_field_id( 'title' ); ?><!--" name="--><?php //echo $this->get_field_name( 'title' ); ?><!--" type="text" value="--><?php //echo esc_attr( $title ); ?><!--" />-->
<!--        </p>-->
        <p>
            <label for="<?php echo $this->get_field_id( 'Link-page' ); ?>">Линк на страницу</label>
            <input id="<?php echo $this->get_field_id( 'Link-page' ); ?>" name="<?php echo $this->get_field_name( 'Link-page' ); ?>" type="text" value="<?php echo ($Link) ?> " />
        </p>
        <?php
    }

    /*
     * сохранение настроек виджета
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
//        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['Link-page'] = $new_instance['Link-page']   ? $new_instance['Link-page'] : ''; // по умолчанию выводятся 5 постов
        return $instance;
    }
}

/*
 * регистрация виджета
 */
function Link_widget_load() {
    register_widget( 'LinkWidget' );
}
add_action( 'widgets_init', 'Link_widget_load' );
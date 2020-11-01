<?php
function true_register_wp_sidebars() {
    /* В подвале - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'header_1', // уникальный id
            'name' => 'Хедер 1', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );
    /* В подвале - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'footer_1', // уникальный id
            'name' => 'Футер 1', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );

    /* В подвале - второй сайдбар */
    register_sidebar(
        array(
            'id' => 'footer_2',
            'name' => 'Футер 2',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    /* В подвале - второй сайдбар */
    register_sidebar(
        array(
            'id' => 'footer_3',
            'name' => 'Футер 3',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}

add_action( 'widgets_init', 'true_register_wp_sidebars' );

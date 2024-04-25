<?php

if( function_exists('get_field') ) {
    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

    function my_wp_nav_menu_objects( $items, $args ) {
        foreach( $items as &$item ) {
            $icon = get_field('icon', $item);

            // append icon
            if( $icon ) {
                $item->title = '<span class="item-icon"><img src="'.$icon['url'].'" alt=""></span>'.$item->title;
            }
        }

        return $items;
    }
}
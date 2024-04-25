<?php function headerTransparencyClass() {
    $class = '';

    if( is_front_page() ) {
        $class = 'transparent-light';
    }

    if( is_page_template('templates/about.php') || is_page_template('templates/about.php') ) {
        $class = 'transparent-dark';
    }

    return $class;
}

function desktop_mobile_images($desktop_img, $mobile_img) {
    $alt_text = get_post_meta($desktop_img , '_wp_attachment_image_alt', true);

    if( !$desktop_img && $mobile_img) {
        // if desktop image doesn't exist and mobile do, use mobile for desktop
        $desktop_img = $mobile_img;
        $alt_text = get_post_meta($mobile_img , '_wp_attachment_image_alt', true);
    }

    if( $desktop_img || $mobile_img ): ?>
        <picture>
            <source srcset="<?= wp_get_attachment_image_url($desktop_img, 'full') ?>" media="(min-width: 768px)" />
            <source srcset="<?= wp_get_attachment_image_url($mobile_img, 'full') ?>" media="(min-width: 0px)" />
            <img src="<?= wp_get_attachment_image_url($desktop_img, 'full') ?>" alt="<?= $alt_text ?>" />
        </picture>
    <?php endif; ?>
<?php }
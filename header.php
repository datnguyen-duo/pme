<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-primary'); ?>>
<?php wp_body_open(); ?>

<?php
$logo = get_field('logo', 'option');
$button_1 = get_field('button_1', 'option');
$button_2 = get_field('button_2', 'option'); ?>
<div id="site-page">
    <header id="site-header" js-site-header="container" class="<?= headerTransparencyClass() ?>">
        <div class="content">
            <div class="col col-left">
                <?php if( $logo ): ?>
                    <a href="<?= get_site_url() ?>" class="logo-holder">
                        <?= wp_get_attachment_image($logo['id'], 'large') ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="col col-middle">
                <?php $link = $button_1;
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <div class="link-holder">
                        <a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                            <?= esc_html( $link_title ); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if( has_nav_menu('menu-1') ): ?>
                    <nav>
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'container' => false,
                            )
                        ); ?>
                    </nav>
                <?php endif; ?>
            </div>

            <div class="col col-right">
                <button class="hamburger" js-site-nav-mobile="opener">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <?php $link = $button_2;
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <div class="button-holder">
                        <a class="gl-button gl-button--orange gl-button--small" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                            <?= esc_html( $link_title ); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php $link = $button_1;
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <div class="button-holder">
                        <a class="gl-button gl-button--blue gl-button--small" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                            <?= esc_html( $link_title ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div id="site-mobile-nav" js-site-nav-mobile="container">
        <div class="content">
            <?php if( has_nav_menu('menu-4') ): ?>
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'menu-4',
                            'container' => false,
                        )
                    ); ?>
                </nav>
            <?php endif; ?>
        </div>
    </div>

    <main id="site-page-content">
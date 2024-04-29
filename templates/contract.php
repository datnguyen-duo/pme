<?php
/* Template Name: Contract */
get_header(); ?>
    <div class="template-contract-page-container">
        <?php $hero_s = get_field('hero_section'); ?>
        <section class="hero-section">
            <?php if( $hero_s['image'] ): ?>
                <div class="background" js-animation-zoom-in-image="container" data-js-animation-zoom-in-image-scroller-start="top">
                    <?php desktop_mobile_images($hero_s['image'], $hero_s['image_2']) ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <?php
                $title = get_the_title();

                if( $hero_s['title'] ) {
                    $title = $hero_s['title'];
                } ?>

                <div class="group">
                    <?php if( $title ): ?>
                        <h1 class="title"><?= $title ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php $blocks = get_field('blocks');
        if( $blocks ): ?>
            <section class="blocks-section">
                <div class="content">
                    <div class="blocks">
                        <?php foreach ( $blocks as $index => $block ): ?>
                            <div class="block-holder">
                                <div class="block">
                                    <div class="block-col">
                                        <div class="block-col-content">
                                            <?php if( $block['title'] ): ?>
                                                <h2 class="block-title"><?= $block['title'] ?></h2>
                                            <?php endif; ?>

                                            <?php $link = $block['button'];
                                            if( $link ):
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a class="gl-button <?= ( $index %2 == 0 ) ? ' gl-button--orange' : null ?>" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                                    <?= esc_html( $link_title ); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="block-col">
                                        <div class="description gl-text-editor"><?= $block['description'] ?></div>

                                        <?php if( $block['banner_title'] || $block['banner_description'] ): ?>
                                            <div class="banner">
                                                <div class="banner-col">
                                                    <?php if( $block['banner_title'] ): ?>
                                                        <h2 class="banner-title"><?= $block['banner_title'] ?></h2>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="banner-col">
                                                    <?php if( $block['banner_description'] ): ?>
                                                        <div class="banner-description gl-text-editor"><?= $block['banner_description'] ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>
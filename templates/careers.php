<?php get_header();
/* Template Name: Careers */ ?>
<div class="template-careers-page-container">
    <?php $hero_s = get_field('hero_section'); ?>
    <section class="hero-section">
        <?php if( $hero_s['image'] ): ?>
            <div class="background" js-animation-zoom-in-image="container" data-js-animation-zoom-in-image-scroller-start="top">
                <?php desktop_mobile_images($hero_s['image'], $hero_s['image_2']) ?>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php if( $hero_s['title'] ): ?>
                <div class="group" js-animation="fade-up">
                    <?php if( $hero_s['title'] ): ?>
                        <h1 class="title"><?= $hero_s['title'] ?></h1>
                    <?php endif; ?>

                    <?php if( $hero_s['description'] ): ?>
                        <div class="description">
                            <p><?= $hero_s['description'] ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php $intro_s = get_field('intro_section');
    if( $intro_s['description'] || $intro_s['button'] || $intro_s['video'] ): ?>
        <section class="intro-section">
            <div class="content">
                <div class="col">
                    <div class="col-content" js-animation="fade-up">
                        <?php if( $intro_s['description'] ): ?>
                            <div class="description">
                                <p><?= $intro_s['description'] ?></p>
                            </div>
                        <?php endif;

                        $link = $intro_s['button'];
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <div class="button-holder">
                                <a class="gl-button gl-button--orange" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col">
                    <?php if( $intro_s['video'] ): ?>
                        <div class="media-holder" js-animation-parallax="container" js-html-video="container" data-video="<?= $intro_s['video']['url'] ?>" data-video-type="video/mp4"></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $gallery_s = get_field('gallery_section');
    if( $gallery_s['title'] || $gallery_s['description'] || $gallery_s['button'] || $gallery_s['gallery'] ): ?>
        <section class="gallery-section">
            <div class="content">
                <div class="header" js-animation="fade-up">
                    <?php if( $gallery_s['title'] ): ?>
                        <h2 class="title"><?= $gallery_s['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $gallery_s['description'] ): ?>
                        <div class="description">
                            <p><?= $gallery_s['description'] ?></p>
                        </div>
                    <?php endif; ?>

                    <?php
                    $link = $gallery_s['button'];
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <div class="button-holder">
                            <a class="gl-button gl-button--orange" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                <?= esc_html( $link_title ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if( $gallery_s['gallery'] ): ?>
                    <div js-gallery-slider="container">
                        <div class="mobile-gallery">
                            <div class="slider-controls-container">
                                <div class="gl-slider-controls">
                                    <div class="gl-slider-controls--col">
                                        <button js-gallery-slider="prev" class="gl-slider-button prev">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                    <div class="gl-slider-controls--col gl-slider-controls--col-middle">
                                        <div js-gallery-slider="pagination" class="gl-slider-pagination"></div>
                                    </div>
                                    <div class="gl-slider-controls--col">
                                        <button js-gallery-slider="next" class="gl-slider-button next">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="gallery">
                                <div class="swiper" js-gallery-slider="mobile-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ( $gallery_s['gallery'] as $item ): ?>
                                            <div class="swiper-slide">
                                                <?= wp_get_attachment_image($item['image']['id'], 'large') ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="desktop-gallery">
                            <div class="gallery" js-animation-move-left-right="container">
                                <div class="splide" js-gallery-slider="slider">
                                    <div class="splide__track">
                                        <div class="splide__list">
                                            <?php for( $i=0; $i<2; $i++ ): ?>
                                                <?php foreach ( $gallery_s['gallery'] as $item ): ?>
                                                    <div class="splide__slide">
                                                        <?= wp_get_attachment_image($item['image']['id'], 'large') ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $desc_s = get_field('description_section_2');
    if( $desc_s['title'] || $desc_s['accordions'] ): ?>
        <section class="two-col-2-section">
            <div class="content">
                <div class="col">
                    <?php if( $desc_s['title'] ): ?>
                        <h2 class="title" js-animation="fade-up"><?= $desc_s['title'] ?></h2>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <?php get_template_part('template-parts/accordions', '', array(
                        'accordions' => $desc_s['accordions']
                    )) ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $desc_s = get_field('description_section');
    if( $desc_s['title'] || $desc_s['description'] || $desc_s['button'] || $desc_s['description_2'] || $desc_s['small_description'] || $desc_s['image'] ): ?>
        <section class="two-col-section">
            <div class="content">
                <div class="col">
                    <div js-animation="fade-up">
                        <?php if( $desc_s['title'] ): ?>
                            <h2 class="title"><?= $desc_s['title'] ?></h2>
                        <?php endif; ?>

                        <?php if( $desc_s['description'] ): ?>
                            <div class="description">
                                <p><?= $desc_s['description'] ?></p>
                            </div>
                        <?php endif; ?>

                        <?php
                        $link = $desc_s['button'];
                        if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <div class="button-holder">
                                <a class="gl-button" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                    <?= esc_html( $link_title ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col">
                    <?php if( $desc_s['image'] ): ?>
                        <div class="image-holder">
                            <?= wp_get_attachment_image($desc_s['image'], 'large') ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $desc_s['description_2'] ): ?>
                        <div class="image-description">
                            <p><?= $desc_s['description_2'] ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if( $desc_s['small_description'] ): ?>
                        <div class="image-sub-description"><p><?= $desc_s['small_description'] ?></p></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
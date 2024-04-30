<?php
/* Template Name: Service */
get_header(); ?>
    <div class="template-service-page-container">
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

                <div class="group" js-animation="fade-up">
                    <p class="title">Services</p>

                    <?php if( $title ): ?>
                        <h1 class="description"><?= $title ?></h1>
                    <?php endif; ?>
                </div>
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
                        <?php elseif( $intro_s['image'] ): ?>
                            <div class="media-holder" js-animation-parallax="container">
                                <?= wp_get_attachment_image($intro_s['image'], 'large') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php $list = get_field('list_section');
        if( $list['title'] || $list['list'] ): ?>
            <section class="list-section">
                <div class="content">
                    <?php if( $list['title'] ): ?>
                        <h2 class="title" js-animation="fade-up"><?= $list['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $list['list'] ): ?>
                        <div class="slider-holder">
                            <div class="slider" js-cards-slider="container">
                                <div class="swiper-holder">
                                    <div class="swiper" js-cards-slider="slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach( $list['list'] as $item ): ?>
                                                <div class="swiper-slide">
                                                    <div class="item">
                                                        <div class="item-icon"><?= wp_get_attachment_image($item['icon'], 'large') ?></div>

                                                        <div class="item-info">
                                                            <?php if( $item['title'] ): ?>
                                                                <h3 class="item-title"><?= $item['title'] ?></h3>
                                                            <?php endif; ?>

                                                            <?php if( $item['description'] ): ?>
                                                                <div class="item-description">
                                                                    <p><?= $item['description'] ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="slider-controls-container">
                                        <div class="gl-slider-controls">
                                            <div class="gl-slider-controls--col">
                                                <button js-cards-slider="prev" class="gl-slider-button prev">
                                                    <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                                                </button>
                                            </div>
                                            <div class="gl-slider-controls--col gl-slider-controls--col-middle">
                                                <div js-cards-slider="pagination" class="gl-slider-pagination-progressbar"></div>
                                            </div>
                                            <div class="gl-slider-controls--col">
                                                <button js-cards-slider="next" class="gl-slider-button next">
                                                    <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                                                </button>
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

        <?php get_template_part('template-parts/logos'); ?>

        <?php $description_s = get_field('description_section');
        if( $description_s['title'] || $description_s['title_2'] || $description_s['description'] || $description_s['image'] ): ?>
            <section class="two-col-section">
                <div class="content">
                    <div class="cols">
                        <div class="col">
                            <?php if( $description_s['title'] ): ?>
                                <h2 class="title" js-animation="fade-up"><?= $description_s['title'] ?></h2>
                            <?php endif; ?>

                            <?php if( $description_s['image'] ): ?>
                                <div class="media-holder">
                                    <?= wp_get_attachment_image($description_s['image'], 'large') ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $description_s['title_2'] ): ?>
                                <h3 class="sub-title"><?= $description_s['title_2'] ?></h3>
                            <?php endif; ?>

                            <?php if( $description_s['description'] ): ?>
                                <div class="description">
                                    <p><?= $description_s['description'] ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col">
                            <div class="col-content">
                                <div class="media-holder">
                                    <?= wp_get_attachment_image($description_s['image'], 'large') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>
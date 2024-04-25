<?php get_header(); ?>
    <div class="template-home-page-container">
        <?php $hero_s = get_field('hero_section'); ?>
        <section class="hero-section">
            <div class="content">
                <?php if( $hero_s['image'] || $hero_s['image_2'] ): ?>
                    <div class="background" js-animation-zoom-in-image="container" data-js-animation-zoom-in-image-scroller-start="top">
                        <?php desktop_mobile_images(@$hero_s['image'], @$hero_s['image_2']) ?>
                    </div>
                <?php endif; ?>

                <div class="group">
                    <h1 class="title">
                        <span class="part"><?= $hero_s['title_part_1'] ?></span>
                        <span class="part">
                            <?= $hero_s['title_part_2'] ?>

                            <?php if( $hero_s['video_1'] ): ?>
                                <div class="video-holder" js-html-video="container" data-video="<?= $hero_s['video_1']['url'] ?>" data-video-type="video/mp4"></div>
                            <?php endif; ?>
                        </span>
                        <span class="part">
                            <?php if( $hero_s['video_2'] ): ?>
                                <div class="video-holder" js-html-video="container" data-video="<?= $hero_s['video_2']['url'] ?>" data-video-type="video/mp4"></div>
                            <?php endif; ?>

                            <?= $hero_s['title_part_3'] ?>
                        </span>
                    </h1>

                    <?php $link = $hero_s['button'];
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
        </section>

        <?php $intro_s = get_field('intro_section');
        if( $intro_s['image'] || $intro_s['image_2'] || $intro_s['title'] || $intro_s['description'] || $intro_s['button'] ): ?>
            <section class="intro-section">
                <div class="content">
                    <div class="col">
                        <?php if( $intro_s['image'] ): ?>
                            <div class="image-holder">
                                <?= wp_get_attachment_image($intro_s['image'], 'large') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <div class="group" data-aos-easing="ease-out" data-aos="fade-up">
                            <?php if( $intro_s['title'] ): ?>
                                <h2 class="title"><?= $intro_s['title'] ?></h2>
                            <?php endif; ?>

                            <?php if( $intro_s['description'] ): ?>
                                <div class="description">
                                    <p><?= $intro_s['description'] ?></p>
                                </div>
                            <?php endif; ?>

                            <?php
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
                        <?php if( $intro_s['image_2'] ): ?>
                            <div class="image-holder">
                                <?= wp_get_attachment_image($intro_s['image_2'], 'large') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php $list_section = get_field('list_section');
        if( $list_section['title'] || $list_section['list'] ): ?>
            <section class="list-2-section" js-list-slider="container">
                <div class="content">
                    <?php if( $list_section['title'] ): ?>
                        <h2 class="title"><?= $list_section['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $list_section['list'] ): ?>
                        <div class="slider">
                            <div class="swiper" js-list-slider="slider">
                                <div class="swiper-wrapper">
                                    <?php foreach( $list_section['list'] as $list ): ?>
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <?php if( $list['title'] ): ?>
                                                    <div class="item-title"><?= $list['title'] ?></div>
                                                <?php endif; ?>

                                                <?php if( $list['description'] ): ?>
                                                    <div class="item-description">
                                                        <p><?= $list['description'] ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="slider-controls-container">
                                <div class="gl-slider-controls">
                                    <div class="gl-slider-controls--col button-col">
                                        <button js-list-slider="prev" class="gl-slider-button prev">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                    <div class="gl-slider-controls--col gl-slider-controls--col-middle">
                                        <div js-list-slider="pagination" class="gl-slider-pagination"></div>
                                    </div>
                                    <div class="gl-slider-controls--col button-col">
                                        <button js-list-slider="next" class="gl-slider-button next">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php $blocks_s = get_field('blocks_section_2');
        if( $blocks_s['title'] ): ?>
            <section class="two-col-list-section">
                <div class="content">
                    <div class="col">
                        <?php if( $blocks_s['title'] ): ?>
                            <h2 class="title"><?= $blocks_s['title'] ?></h2>
                        <?php endif; ?>
                    </div>

                    <div class="col">
                        <?php if( $blocks_s['blocks'] ): ?>
                            <div class="list">
                                <?php foreach( $blocks_s['blocks'] as $block ): ?>
                                    <div class="item">
                                        <a href="<?= get_the_permalink($block['page_link']) ?>" class="item-image">
                                            <?= wp_get_attachment_image($block['image'], 'large', '', array('class' => 'item-img')) ?>

                                            <div class="item-img-overlay"></div>

                                            <div class="item-overlay-content">
                                                <?php if( $block['icon'] ): ?>
                                                    <div class="item-icon">
                                                        <?= wp_get_attachment_image($block['icon'], 'large', '') ?>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="button-holder">
                                                    <div class="gl-button">Learn More</div>
                                                </div>
                                            </div>
                                        </a>

                                        <?php if( $block['title'] ): ?>
                                            <h3 class="item-title"><a href=""><?= $block['title'] ?></a></h3>
                                        <?php endif; ?>

                                        <?php if( $block['description'] ): ?>
                                            <p class="item-description"><?= $block['description'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php $blocks_s = get_field('blocks_section');
        if( $blocks_s ): ?>
            <section class="blocks-section">
                <div class="content">
                    <div class="blocks">
                        <?php foreach ( $blocks_s['blocks'] as $block ): ?>
                            <div class="block-holder">
                                <div class="block">
                                    <div class="col">
                                        <div class="block-image">
                                            <?= wp_get_attachment_image($block['image'], 'large') ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="block-info">
                                            <p class="block-title">
                                                <?= $block['stat_before_text'] ?><span js-counter="container" data-js-counter-stop="<?= $block['stat_number'] ?>">0</span><?= $block['stat_after_text'] ?>
                                            </p>
                                            <p class="block-description">Employee Engagement</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php $slider_s = get_field('slider_section');
        if( $slider_s['title'] || $slider_s['slider'] ): ?>
            <section class="testimonials-section" js-testimonial-slider="container">
                <div class="content">
                    <?php if( $slider_s['title'] ): ?>
                        <h2 class="title"><?= $slider_s['title']  ?></h2>
                    <?php endif; ?>

                    <?php if( $slider_s['slider'] ): ?>
                        <div class="slider">
                            <div class="swiper" js-testimonial-slider="slider">
                                <div class="swiper-wrapper">
                                    <?php foreach( $slider_s['slider'] as $slide ): ?>
                                        <div class="swiper-slide">
                                            <?php if( $slide['description'] ): ?>
                                                <p class="testimonial-description">
                                                    <?= $slide['description'] ?>
                                                </p>
                                            <?php endif; ?>

                                            <?php if( $slide['small_description'] ): ?>
                                                <p class="testimonial-author"><?= $slide['small_description'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="slider-controls-container">
                                <div class="gl-slider-controls">
                                    <div class="gl-slider-controls--col">
                                        <button js-testimonial-slider="prev" class="gl-slider-button prev">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                    <div class="gl-slider-controls--col gl-slider-controls--col-middle">
                                        <div js-testimonial-slider="pagination" class="gl-slider-pagination"></div>
                                    </div>
                                    <div class="gl-slider-controls--col">
                                        <button js-testimonial-slider="next" class="gl-slider-button next">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                                        </button>
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
        if( $description_s['title'] || $description_s['button'] || $description_s['accordions'] || $description_s['image'] || $description_s['image_description'] || $description_s['link'] ): ?>
            <section class="two-col-section">
                <div class="content">
                    <div class="cols">
                        <div class="col">
                            <?php if( $description_s['title'] ): ?>
                                <h2 class="title"><?= $description_s['title'] ?></h2>
                            <?php endif; ?>

                            <?php
                            $link = $description_s['button'];
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

                            <?php if( $description_s['image'] ): ?>
                                <div class="media-holder">
                                    <?= wp_get_attachment_image($description_s['image'], 'large') ?>
                                </div>
                            <?php endif; ?>

                            <?php get_template_part('template-parts/accordions', '', array(
                                'autoplay' => true,
                                'accordions' => $description_s['accordions']
                            )); ?>
                        </div>
                        <div class="col">
                            <div class="col-content">
                                <div class="media-holder">
                                    <?= wp_get_attachment_image($description_s['image'], 'large') ?>
                                </div>
                                <div class="media-description">
                                    <div class="desc-col">
                                        <?php if( $description_s['image_description'] ): ?>
                                            <p><?= $description_s['image_description'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="desc-col">
                                        <?php
                                        $link = $description_s['link'];
                                        if( $link ):
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a class="gl-link" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                                    <?= esc_html( $link_title ); ?>
                                                </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>
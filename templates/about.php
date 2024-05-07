<?php get_header();
/* Template Name: About */ ?>
<div class="template-about-page-container">
    <?php $hero_s = get_field('hero_section'); ?>
    <section class="intro-section">
        <div class="content">
            <div class="col">
                <div class="image-holder">
                    <?= wp_get_attachment_image($hero_s['image_1'], 'large') ?>
                </div>
            </div>
            <div class="col" js-animation="fade-up">
                <?php if( $hero_s['title'] ): ?>
                    <h1 class="title"><?= $hero_s['title'] ?></h1>
                <?php endif; ?>

                <?php
                $link = $hero_s['button'];
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
            <div class="col">
                <div class="image-holder">
                    <?= wp_get_attachment_image($hero_s['image_3'], 'large') ?>
                </div>
            </div>
            <div class="col">
                <div class="image-container">
                    <div class="image-holder">
                        <?= wp_get_attachment_image($hero_s['image_2'], 'large') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $description_s = get_field('description_section');
    if( $description_s['title'] || $description_s['list'] ): ?>
        <section class="list-section">
            <div class="content">
                <div class="col">
                    <?php if( $description_s['title'] ): ?>
                        <h2 class="title" js-animation="fade-up"><?= $description_s['title'] ?></h2>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <?php if( $description_s['description'] ): ?>
                        <div class="list-description">
                            <p><?= $description_s['description'] ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if( $description_s['list'] ): ?>
                        <div class="list">
                            <?php foreach( $description_s['list'] as $item ): ?>
                                <div class="list-item">
                                    <h3 class="list-item-title"><?= $item['title'] ?></h3>
                                    <div class="list-item-description">
                                        <p><?= $item['description'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="slider" js-list-slider="container">
                            <div class="swiper" js-list-slider="slider">
                                <div class="swiper-wrapper">
                                    <?php foreach( $description_s['list'] as $list ): ?>
                                        <div class="swiper-slide">
                                            <div class="list-item">
                                                <?php if( $list['title'] ): ?>
                                                    <div class="list-item-title"><?= $list['title'] ?></div>
                                                <?php endif; ?>

                                                <?php if( $list['description'] ): ?>
                                                    <div class="list-item-description">
                                                        <p><?= $list['description'] ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="slider-controls-container">
                                <div class="slider-controls">
                                    <div class="controls-col button-col">
                                        <button js-list-slider="prev" class="gl-slider-button prev">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                    <div class="controls-col">
                                        <div js-list-slider="pagination" class="gl-slider-pagination"></div>
                                    </div>
                                    <div class="controls-col button-col">
                                        <button js-list-slider="next" class="gl-slider-button next">
                                            <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $history_section = get_field('history_section'); ?>
    <section class="history-section" js-history-slider="container">
        <div class="content">
            <div class="header">
                <div js-animation="fade-up">
                    <?php if( $history_section['title'] ): ?>
                        <h2 class="title"><?= $history_section['title'] ?></h2>
                    <?php endif; ?>

                    <?php if( $history_section['subtitle'] ): ?>
                        <h3 class="sub-title"><?= $history_section['subtitle'] ?></h3>
                    <?php endif; ?>
                </div>

                <?php if( $history_section['image'] ): ?>
                    <div class="background" js-animation-zoom-in-image="container">
                        <?= wp_get_attachment_image($history_section['image'], 'full') ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if( $history_section['slider'] ): ?>
                <div class="slider">
                    <div class="swiper" js-history-slider="slider">
                        <div class="swiper-wrapper">
                            <?php foreach( $history_section['slider'] as $slide ): ?>
                                <div class="swiper-slide">
                                    <?php if( $slide['title_2'] ): ?>
                                        <p class="history-date"><?= $slide['title_2'] ?></p>
                                    <?php endif; ?>

                                    <?php if( $slide['title'] ): ?>
                                        <p class="history-title"><?= $slide['title'] ?></p>
                                    <?php endif; ?>

                                    <?php if( $slide['description'] ): ?>
                                        <p class="history-description"><?= $slide['description'] ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="slider-controls">
                        <div class="col">
                            <button js-history-slider="prev" class="gl-slider-button">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                            </button>
                        </div>
                        <div class="col">
                            <div js-history-slider="pagination" class="slider-pagination"></div>
                        </div>
                        <div class="col">
                            <button js-history-slider="next" class="gl-slider-button">
                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php $members_s = get_field('members_section');
    if( $members_s['title'] || $members_s['members'] ): ?>
        <section class="two-col-list-section">
            <div class="content">
                <div class="col">
                    <?php if( $members_s['title'] ): ?>
                        <h2 class="title" js-animation="fade-up"><?= $members_s['title'] ?></h2>
                    <?php endif; ?>
                </div>

                <div class="col">
                    <div class="list">
                        <?php foreach( $members_s['members'] as $index => $post ): setup_postdata($post);
                            $position = get_field('position'); ?>
                            <div class="item">
                                <div class="item-image" js-modal="open" data-js-modal="#modal-member-<?= $index ?>">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                                    <span class="icon"></span>
                                </div>

                                <div class="item-title"><a href=""><?php the_title() ?></a></div>

                                <?php if( $position ): ?>
                                    <p class="item-description"><?= $position ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php foreach( $members_s['members'] as $index => $post ): setup_postdata($post);
            $position = get_field('position');
            $description = get_field('description'); ?>
            <div class="gl-modal" id="modal-member-<?= $index ?>" js-modal="container">
                <div class="gl-modal--close-btn" js-modal="close"></div>
                <div class="gl-modal--content">
                    <section class="member-section">
                        <div class="col">
                            <?php if( $members_s['title'] ): ?>
                                <h2 class="title"><?= $members_s['title'] ?></h2>
                            <?php endif; ?>
                        </div>

                        <div class="col">
                            <div class="col-content">
                                <div class="header">
                                    <div class="image-holder">
                                        <div class="image">
                                            <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="member-title"><?php the_title() ?></div>

                                        <?php if( $position ): ?>
                                            <div class="member-small-description"><?= $position ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if( $description ): ?>
                                    <div class="description"><?= $description ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php $description_s = get_field('description_section_2');
    if( $description_s['title'] || $description_s['accordions'] || $description_s['slider'] ): ?>
        <section class="two-col-section">
            <div class="content">
                <?php if( $description_s['title'] ): ?>
                    <div class="header">
                        <div class="title" js-animation="fade-up"><?= $description_s['title'] ?></div>
                    </div>
                <?php endif; ?>

                <div class="cols">
                    <div class="col">
                        <?php get_template_part('template-parts/accordions', '', array(
                            'id' => 'accordions-1',
                            'autoplay' => true,
                            'accordions' => $description_s['accordions']
                        )); ?>
                    </div>
                    <div class="col">
                        <div class="col-content">
                            <?php if( $description_s['accordions'] ): ?>
                                <div class="slider" js-slider="container" data-js-slider-accordions="#accordions-1">
                                    <div class="swiper" js-slider="slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach( $description_s['accordions'] as $item ): ?>
                                                <div class="swiper-slide">
                                                    <div class="media-holder">
                                                        <?= wp_get_attachment_image($item['image'], 'large') ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="slider-controls">
                                        <div class="control-col">
                                            <button js-slider="prev" class="gl-slider-button">
                                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-left-blue.svg' ?>" alt="">
                                            </button>
                                        </div>
                                        <div class="control-col">
                                            <div js-slider="pagination" class="gl-slider-pagination"></div>
                                        </div>
                                        <div class="control-col">
                                            <button js-slider="next" class="gl-slider-button">
                                                <img src="<?= get_template_directory_uri().'/src/images/icons/arrow-right-blue.svg' ?>" alt="">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
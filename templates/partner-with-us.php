<?php
/* Template Name: Partner With Us */
get_header(); ?>
<div class="template-partner-with-us-page-container">
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
                <?php if( $title ): ?>
                    <h1 class="title"><?= $title ?></h1>
                <?php endif; ?>

                <?php if( $hero_s['description'] ): ?>
                    <div class="description">
                        <p><?= $hero_s['description'] ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php $intro_s = get_field('description_section_2');
    if( $intro_s['title'] || $intro_s['button'] || $intro_s['accordions'] ): ?>
        <section class="intro-section">
            <div class="content">
                <div class="col">
                    <div js-animation="fade-up">
                        <?php if( $intro_s['title'] ): ?>
                            <h2 class="title"><?= $intro_s['title'] ?></h2>
                        <?php endif; ?>

                        <?php
                        $link =$intro_s['button'];
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
                    <?php get_template_part('template-parts/accordions', '', array(
                        'accordions' => $intro_s['accordions']
                    )); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $blocks_s = get_field('blocks_section');
    if( $blocks_s['title'] || $blocks_s['blocks'] ): ?>
        <section class="grid-section">
            <div class="content">
                <?php if( $blocks_s['title'] ): ?>
                    <h2 class="title" js-animation="fade-up"><?= $blocks_s['title'] ?></h2>
                <?php endif; ?>

                <?php if( $blocks_s['blocks'] ):  ?>
                    <div class="grid">
                        <?php foreach( $blocks_s['blocks'] as $item ): ?>
                            <div class="item">
                                <div class="item-image">
                                    <?= wp_get_attachment_image($item['image'], 'large') ?>
                                </div>
                                <div class="item-info">
                                    <div class="item-stat">
                                        <?= $item['stat_before_text'] ?><?php if( $item['stat_number'] ): ?>
                                            <span js-counter="container" data-js-counter-stop="<?= $item['stat_number'] ?>">0</span>
                                        <?php endif; ?><?= $item['stat_after_text'] ?>
                                    </div>

                                    <?php if( $item['description'] ): ?>
                                        <div class="item-description">
                                            <p><?= $item['description'] ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if( $item['description_2'] ): ?>
                                        <div class="hidden-item-description-holder">
                                            <div class="hidden-item-description">
                                                <p><?= $item['description_2'] ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/logos'); ?>

    <?php $map_s = get_field('map'); 
    if( $map_s['center_point']['name'] ): ?>
    <div class="map">
        <div class="map__container">
            <div id="map-sidebar">
                <div id="map-sidebar-title">
                    <?php echo $map_s['title']; ?>
                </div>
                <div id="map-items-container">
                <div id="map-items"></div>
                </div>
            </div>
            <div id="map">
                <div id="map-popup">
                    <h3 id="map-popup-title"></h3>
                    <p id="map-popup-type-1"></p>
                    <p id="map-popup-type-2"></p>
                    <p id="map-popup-expiration-1"></p>
                    <p id="map-popup-expiration-2"></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php $desc_s = get_field('description_section');
    if( $desc_s['image'] || $desc_s['image_2'] || $desc_s['title'] || $desc_s['description'] ): ?>
        <section class="description-section">
            <div class="content">
                <div class="col">
                    <div class="image-holder">
                        <?= wp_get_attachment_image($desc_s['image'], 'large') ?>
                    </div>
                </div>
                <div class="col">
                    <div class="col-content" js-animation="fade-up">
                        <?php if( $desc_s['title'] ): ?>
                            <h2 class="title"><?= $desc_s['title'] ?></h2>
                        <?php endif; ?>

                        <?php if( $desc_s['description'] ): ?>
                            <div class="description">
                                <p><?= $desc_s['description'] ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="image-holder">
                        <?= wp_get_attachment_image($desc_s['image_2'], 'large') ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

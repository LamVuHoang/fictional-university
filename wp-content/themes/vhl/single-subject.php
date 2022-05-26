<?php
get_header();

$banner_image = get_field('banner_image');
bannerImage(array(
    'title' => get_the_title(),
    'intro' => 'This is a Single Subject Post',
    'image' => $banner_image['url']
));
?>

<div class="container container--narrow page-section">

    <?php get_template_part('template-parts/breadcrumb', 'posttype') ?>

    <div class="generic-content">
        <?php the_content() ?>
    </div>
</div>

<?php $relatedMember = get_field('teacher'); ?>

<div class="page-section page-section--white">
    <div class="container container--narrow">
        <h2 class="headline headline--medium"><?php the_title() ?> Member: </h2>

        <ul class="professor-cards">
            <?php
            if (count($relatedMember) > 0) :
                foreach ($relatedMember as $item) :
            ?>
                    <li class="professor-card__list-item">
                        <a href="<?php echo $item->guid ?>" class="professor-card">
                            <img class="professor-card__image" src="<?php echo get_the_post_thumbnail_url($item->ID) ?>" />
                            <span class="professor-card__name"><?php echo $item->post_title ?></span>
                        </a>
                    </li>
                <?php
                endforeach;
            else :
                ?>
                <li class="professor-card__list-item">
                    Sorry, no Member in <?php the_title() ?> Subject
                </li>
            <?php endif; ?>
        </ul>
        <hr class="section-break" />
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Past Events</h2>

            <?php
            $args1 = [
                'post_type' => 'event',
                'meta_query' => [
                    [
                        'key' => 'occur',
                        'value' => date('Y-m-d'),
                        'compare' => '<',
                    ],
                    [
                        'key' => 'related_subject',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE',
                    ]
                ],
                'meta_key' => 'occur',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $the_query1 = new WP_Query($args1);

            if ($the_query1->have_posts()) :
                while ($the_query1->have_posts()) :
                    $the_query1->the_post();

                    $the_occurrance1 = new DateTime(get_post_meta(get_the_ID(), 'occur', true));
            ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="#" style="background-color: gray;">
                            <span class="event-summary__month"><?= $the_occurrance1->format('M') ?></span>
                            <span class="event-summary__day"><?= $the_occurrance1->format('d') ?></span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h5>
                            <p><?php the_excerpt() ?>
                                <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
                            </p>
                        </div>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <p>Sorry, no Past Events here</p>
            <?php
            endif;

            // ================ RESET POST DATA FOR THE NEXT QUERY ==================== 
            wp_reset_postdata();
            // ================ RESET POST DATA FOR THE NEXT QUERY ==================== 
            ?>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
            <?php
            $args2 = [
                'post_type' => 'event',
                'meta_query' => [
                    [
                        'key' => 'occur',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                    ],
                    [
                        'key' => 'related_subject',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE',
                    ]
                ],
                'meta_key' => 'occur',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $the_query2 = new WP_Query($args2);

            if ($the_query2->have_posts()) :
                while ($the_query2->have_posts()) :
                    $the_query2->the_post();

                    $the_occurrance2 = new DateTime(get_post_meta(get_the_ID(), 'occur', true));
            ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="#" style="background-color: red;">
                            <span class="event-summary__month"><?= $the_occurrance2->format('M') ?></span>
                            <span class="event-summary__day"><?= $the_occurrance2->format('d') ?></span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </h5>
                            <p><?php the_excerpt() ?>
                                <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
                            </p>
                        </div>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <p>Sorry, no Upcoming Events here</p>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
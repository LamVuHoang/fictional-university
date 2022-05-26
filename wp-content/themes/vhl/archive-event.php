<?php 
get_header();

$banner_image = get_field('banner_image');
bannerImage(array(
    'title' => 'The Event Archive',
    'intro' => 'I\'ll fill it later',
    'image' => $banner_image['url']
));
?>

<div class="full-width-split group">
    <div class="full-width-split__one">

        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Old Events</h2>

            <?php
            $args1 = [
                'post_type' => 'event',
                'meta_query' => [
                    [
                        'key' => 'occur',
                        'value' => date('Y-m-d'),
                        'compare' => '<',
                    ],
                ],
                'meta_key' => 'occur',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $new_events = new WP_Query($args1);

            if ($new_events->have_posts()) :
                while ($new_events->have_posts()) :
                    $new_events->the_post();
            ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="<?php the_permalink() ?>" style="background-color: grey;">
                            <span class="event-summary__month">
                                <?= get_the_date('M') ?>
                            </span>
                            <span class="event-summary__day">
                                <?= get_the_date('d') ?>
                            </span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </h5>
                            <p><?php the_excerpt() ?></p>
                        </div>
                    </div>

            <?php
                endwhile;
            else :
                _e('Sorry, no post here');
            endif;

            ?>
        </div>
    </div>
    <div class="full-width-split__two">

        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">New Events</h2>

            <?php
            $args1 = [
                'post_type' => 'event',
                'meta_query' => [
                    [
                        'key' => 'occur',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                    ],
                ],
                'meta_key' => 'occur',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $new_events = new WP_Query($args1);

            if ($new_events->have_posts()) :
                while ($new_events->have_posts()) :
                    $new_events->the_post();
            ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="<?php the_permalink() ?>" style="background-color: red;">
                            <span class="event-summary__month">
                                <?= get_the_date('M') ?>
                            </span>
                            <span class="event-summary__day">
                                <?= get_the_date('d') ?>
                            </span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </h5>
                            <p><?php the_excerpt() ?></p>
                        </div>
                    </div>

            <?php
                endwhile;
            else :
                _e('Sorry, no post here');
            endif;

            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>
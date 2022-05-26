<?php 
get_header();

$banner_image = get_field('banner_image');
bannerImage(array(
    'title' => 'The Subject Archive',
    'intro' => 'I\'ll fill it later',
    'image' => $banner_image['url']
));
?>

<div class="full-width-split group">
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">All Subjects</h2>

            <?php
            $args = [
                'post_type' => 'subject'
            ];

            $post_query = new WP_Query($args);

            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) :
                    $post_query->the_post();
            ?>
                    <div class="event-summary">
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </h5>
                        </div>
                    </div>

            <?php
                endwhile;
            else :
                _e('Sorry, no subject here');
            endif;

            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>
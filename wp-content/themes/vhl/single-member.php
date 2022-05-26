<?php
get_header();

$banner_image = get_field('banner_image');
bannerImage(array(
    'title' => get_the_title(),
    'intro' => 'This is a Single Member Post',
    'image' => $banner_image['url']
));
?>

<div class="container container--narrow page-section">

    <?php get_template_part('template-parts/breadcrumb', 'posttype') ?>

    <div class="generic-content">
        <div class="row group">
            <div class="one-third">
                <?php echo the_post_thumbnail() ?>
            </div>
            <div class="two-thirds">
                <?php the_content() ?>
            </div>
        </div>
    </div>

    <hr class="section-break" />

    <div class="generic-content">
        <h4 class="headline headline--medium">Related Subject</h4>
        <?php
        $subjectArgs = [
            'post_type'  => 'subject',
            'meta_query' => array(
                array(
                    'key'     => 'teacher',
                    'value'   => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE',
                ),
            ),
        ];

        $related_subject = new WP_Query($subjectArgs);
        if ($related_subject->have_posts()) :
            while ($related_subject->have_posts()) :
                $related_subject->the_post();
        ?>
                <div class="one-third">
                    <a href="<?php the_permalink() ?>">
                        <p><?php the_title() ?></p>
                    </a>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>


<?php get_footer() ?>
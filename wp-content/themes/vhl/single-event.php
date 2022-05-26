<?php get_header();

$the_occurrance = new DateTime(get_post_meta(get_the_ID(), 'occur', true));

$banner_image = get_field('banner_image');
bannerImage(array(
    'title' => get_the_title(),
    'intro' => 'This is a Single Event Post',
    'image' => $banner_image['url']
));
?>



<div class="container container--narrow page-section">

    <?php get_template_part('template-parts/breadcrumb', 'posttype') ?>


    <div class="generic-content">
        <?php the_content() ?>
    </div>
</div>

<div class="page-section page-section--beige">
    <div class="container container--narrow generic-content">
        <p>Ngày tổ chức tiệc: <?= $the_occurrance->format('M d, Y') ?></p>

        <p>Giờ tổ chức tiệc: <?= $the_occurrance->format('h:m a') ?></p>
    </div>
</div>

<div class="page-section page-section--white">
    <div class="container container--narrow">
        <div class="row group generic-content">
            <h4 class="headline headline--medium">Related Subject</h4>
            <?php
            $related_subject = get_field('related_subject');

            foreach ($related_subject as $item) :
            ?>
                <div class="one-third">
                    <a href="<?= $item->guid ?>">
                        <p><?= $item->post_title; ?></p>
                    </a>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
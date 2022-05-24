<?php get_header();

$the_occurrance = new DateTime(get_post_meta(get_the_ID(), 'occur', true));
?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/ocean.jpg)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?= the_title() ?></h1>
        <div class="page-banner__intro">
            <p>This is Event Single Page</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Back to About Us</a> <span class="metabox__main">Our History</span>
        </p>
    </div>

    <div class="generic-content">
        <?= the_content() ?>
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
        <h2 class="headline headline--medium">Biology Professors:</h2>

        <ul class="professor-cards">
            <li class="professor-card__list-item">
                <a href="#" class="professor-card">
                    <img class="professor-card__image" src="<?php echo get_template_directory_uri() ?>/assets/images/barksalot.jpg" />
                    <span class="professor-card__name">Dr. Barksalot</span>
                </a>
            </li>
            <li class="professor-card__list-item">
                <a href="#" class="professor-card">
                    <img class="professor-card__image" src="<?php echo get_template_directory_uri() ?>/assets/images/meowsalot.jpg" />
                    <span class="professor-card__name">Dr. Meowsalot</span>
                </a>
            </li>
        </ul>
        <hr class="section-break" />

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

            <?php endforeach; ?>
            
            <!-- <div class="one-third">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
            </div>

            <div class="one-third">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
            </div>

            <div class="one-third">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
            </div> -->
        </div>
    </div>
</div>

<?php get_footer() ?>
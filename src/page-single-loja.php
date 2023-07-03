<?php
/* Template Name: Loja */
get_header();
global $wq_lojas;

$args = array(
    'posts_per_page' => 10,
    'post__not_in' => array($post->ID),
    'post_status' => 'publish',
    'post_type' => 'lojas',
    'orderby' => 'date',
    'order' => 'DESC'
);

$wq_lojas = new WP_Query($args);

?>
<div class="row other-directors">
<div class="wrapper" style="width: 100%">
<?php  if ($wq_lojas->have_posts()) :
                        while ($wq_lojas->have_posts()) :
                            $wq_lojas->the_post(); ?>
    <h6 class="title">
        Conheça outros lojas
    </h6>
    <?php endwhile;?>
    <?php endif;?>
</div>
</div>

<?php get_footer();?>
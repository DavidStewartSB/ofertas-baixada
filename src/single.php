<?php get_header(); ?>

	<section class="container my-8 mx-auto ">
	<?php if ( have_posts()) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			
			?>
			
			<?php if ( is_singular( 'lojas' ) ) {
    get_template_part( 'template/template-lojas' ); 
} else {
	get_template_part( 'template/template-produtos' ); 
}
?> 

		<?php endwhile; ?>
	<?php else : ?>
			<?php get_template_part( 'content-single' ); ?>
	<?php endif;?>
	</section>

<?php
get_footer();


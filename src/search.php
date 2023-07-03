<?php

/**
 * Search result page.
 */
get_header();
$s = get_search_query();
$args_s = array(
	's' => $s,
	"post_type" => "post",
	"post_status" => "publish",
);

$wq = new WP_Query($args_s);
?>
<div id="search">
	<main id="main" class="container mx-auto mt-5" role="main">
		<section class="flex gap-5">
			<aside class="border border-gray-300 bg-gray-100 shadow px-4 py-2 w-[300px]">
				<h2>Algo aqui</h2>
			</aside>

			<article>
				<header class="mb-5 border border-gray-300 bg-gray-100 px-4 py-2">
					<div class="border-b border-white">
						<?php get_template_part('template/partials/search-form')?>
					</div>
					<div class="py-3">
						<h5 class="page-title text-xl font-semibold">
							<?php _e('Encontrados '. $wp_query->found_posts .  ' para esta pesquisa', 'locale'); ?><!-- <span style="text-decoration: underline;" class="font-bold"><?php the_search_query(); ?></span> -->
						</h5>
					</div>
				</header>
				<div class="">
					<?php if (have_posts()) { ?>
						<div>
							<?php while (have_posts()) {
								the_post(); ?>
								<div class="card flex px-5 py-2 border border-gray-300 bg-gray-100 shadow mb-5">
									<div class="card-body flex">

									<div class="bg-white">
										<img  src="<?= get_the_post_thumbnail_url(); ?>" alt="" width="176" height="176">
									</div>
										<h3 class="card-title">
											<a href="<?php echo esc_url(get_the_permalink()); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<div class="search-card-container">
											<?php if (is_search() || is_archive()) : ?>
												<div class="entry-summary">
													<?php the_excerpt(); ?>
												</div>
											<?php else : ?>
												<div class="entry-content">
													<?php
													/* translators: %s: Name of current post */
													the_content(
														sprintf(
															__('Continue reading %s', 'tailpress'),
															the_title('<span class="screen-reader-text">"', '"</span>', false)
														)
													);
													wp_link_pages(
														array(
															'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'tailpress') . '</span>',
															'after'       => '</div>',
															'link_before' => '<span>',
															'link_after'  => '</span>',
															'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'tailpress') . ' </span>%',
															'separator'   => '<span class="screen-reader-text">, </span>',
														)
													);
													?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } else {
						get_search_form();
					} ?>
				</div>
			</article>
		</section>
	</main>
</div>
<?php get_footer(); ?>
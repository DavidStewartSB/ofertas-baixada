<div class="grid grid-cols-1 md:grid-cols-2 border-b pb-10 border-gray-300 border px-5 py-8 shadow bg-gray-100" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="flex justify-center items-center">
		<picture>
			<source media="(min-width: 668px)" srcset="<?= the_field('imagem_produto') ?>">
			<img class="object-cover-thumb mx-auto" src="<?= the_field('imagem_produto') ?>" alt="">
		</picture>
	</div>
	<div>
		<div class="flex w-full flex-col pr-20">
			<?php the_title(sprintf('<h1 class="text-lg lg:text-2xl font-extrabold mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
			<div class="flex justify-between">
				<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
				<?php
				$tags = get_the_tags();
				if ($tags) :
					foreach ($tags as $tag) :
				?>
						<div class="pills text-white">
							<span class="<?php $tag->color ?> bg-blue-500 py-1 px-1 text-sm"><?= $tag->name ?></span>
						</div>
					<? endforeach; ?>
				<? endif; ?>
			</div>

			<div class="mt-5">
				<?php the_content() ?>

			</div>

			<div class="flex mt-10 ">
				<span class="font-bold text-4xl text-green-800"><?= the_field('valor') ?></span>

			</div>
			<div class="mt-10 flex justify-between items-center">
				<a href="<?= the_field('link_afiliado') ?>">
					<button class="flex justify-center items-center  bg-[#6366F1] text-white uppercase font-extrabold text-2xl w-[300px]  rounded-full  px-3 py-2">Compre agora! <img width="28" height="28" src='<?= get_template_directory_uri() ?>/assets/icons/cart.svg' alt="cart logo" class="ml-3">
					</button>
				</a>
				<div>
					<?php
					$related_posts = get_field('e-commerce_afiliado');
					$first_image_displayed = false;

					if ($related_posts) {
						foreach ($related_posts as $related_post) {
							$related_post_id = $related_post;
							$related_post_title = get_the_title($related_post_id);
							$related_post_image = get_the_post_thumbnail_url($related_post_id);

							if ($related_post_image && !$first_image_displayed) {
								$first_image_displayed = true; // Marcar a primeira imagem como exibida
					?>
								<img src="<?php echo $related_post_image; ?>" alt="<?php echo $related_post_title; ?>" width="100" height="100" class="object-cover border border-gray-400 rounded-sm">

					<?php
								break; // Sair do loop após exibir a primeira imagem correta
							}
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>


<div class=" space-y-5 mt-5" >
	
<div class="accordion mb-5 border-gray-300 border px-5 py-2  bg-gray-100 hover:shadow-lg">
    <div class="title cursor-pointer px-4 flex justify-between items-center">
		<h2 class="font-bold text-2xl">Ficha técnica:</h2>
		<img class="icon-rotate" width="20" height="20" src="<?= get_template_directory_uri(); ?>/assets/icons/arrow-up.svg" alt="Seta Y">
    </div>
    <div class="section-content hidden py-2 px-4 border-t">
		<?= the_field('descricao_produto') ?>
    </div>
</div>

<div class="accordion border-gray-300 border px-5 py-2  bg-gray-100 hover:shadow-lg">
<div class="title cursor-pointer px-4 flex justify-between items-center">
		<h2 class="font-bold text-2xl">Comentários:</h2>
		<img class="icon-rotate" width="20" height="20" src="<?= get_template_directory_uri(); ?>/assets/icons/arrow-up.svg" alt="Seta Y">
    </div>
    <div class="section-content hidden py-2 px-4 border-t">
	<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
    </div>
</div>

</div>

<div class="space-y-5 mt-5">
	<?php get_template_part('template/partials/related-posts'); ?>
</div>



<!-- <nav >
	<div class="entry-content border">
		<?php
		wp_link_pages(
			array(
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'tailpress') . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
	</div>
</nav> -->
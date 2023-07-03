<?php
// Template Name: home
get_header(); ?>

<div class="container mx-auto">

	<div class="text-center mt-10">
		<h1 class="text-3xl font-extrabold">Descubra as melhores promoções!</h1>
		<p class="text-xl font-bold">Tenha acesso a uma vasta gama de produtos incríveis para atender a todas as suas necessidades.</p>
	</div>


	<div class="space-y-5 my-10">
		<div>
			<h2 class="font-bold text-2xl">Categorias</h2>
			<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-4 h-[300px]">
				<?php
				$parent_categories = get_categories(array(
					'parent' => 0
				));

				foreach ($parent_categories as $parent_category) {
					$parent_category_name = $parent_category->name;
					$parent_category_link = get_category_link($parent_category->term_id);

					// Obtém a URL da imagem em destaque da categoria usando ACF
					$parent_category_image_url = get_field('imagem_categoria', $parent_category);

					if ($parent_category_image_url) {
				?>
						<div class="group relative overflow-hidden rounded h-full">
							<div class="absolute inset-0 z-10 bg-black/60 transition-colors group-hover:bg-black/70"></div>
							<div style="aspect-ratio: 4 / 5;">
								<img width="350" height="300" class="object-cover transition-transform group-hover:scale-105 h-[300px]" src="<?= $parent_category_image_url; ?>" alt="<?= $parent_category_name; ?>">
							</div>
							<div class="absolute inset-0 z-[20] flex items-center justify-center">
								<h3 class="text-2xl font-bold capitalize text-white text-center">
									<a href="<?php echo $parent_category_link; ?>" class="text-white"><?php echo $parent_category_name; ?></a>
								</h3>
							</div>
						</div>
				<?php
					}
				}
				?>
			</div>
		</div>

	</div>

	<div class="space-y-5 my-10">
		<div class="flex justify-between items-center">
			<h2 class="font-bold text-2xl">Produtos em Destaque</h2>
			<button class="border p-3 rounded-lg text-sm font-semibold bg-slate-500 text-white hover:bg-slate-400">Veja mais</button>
		</div>

		<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
			<?php
			global $wp;
			$args = array(
				'posts_per_page' => 6,
				'post__not_in' => array($post->id),
				"post_status" => "publish",
				"post_type" => "post",
				"orderby" => "date",
				"order" => 'DESc'
			);

			$wp = new WP_Query($args);

			if ($wp->have_posts()) :
				while ($wp->have_posts()) :
					$wp->the_post();
					$url = get_permalink();
			?>
					<div class="h-full overflow-hidden bg-white text-dark border border-gray-500 rounded-md hover:shadow-lg">
						<div class="border-b border-gray-700 p-0">
							<div style="aspect-ratio: 4 / 3;">
								<img src="<?php the_field('imagem_produto') ?>" alt="" width="340" height="340" class="object-cover-card">
							</div>
						</div> <!--card-header-->
						<div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-4 pt-4 ">
							<div class="col-span-10 md:col-span-10 ">
								<h4 class="font-bold line-clamp-1"><?= the_field('nome_do_produto') ?></h4>
								<p class="line-clamp-2"><?= the_field('valor'); ?></p>
							</div>
							<div class="col-span-2 md:col-span-2 grid justify-end">
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
											<img src="<?php echo $related_post_image; ?>" alt="<?php echo $related_post_title; ?>" width="50" height="50" class="object-cover border border-gray-400 rounded-sm w-10 h-10">
								<?php
											break; // Sair do loop após exibir a primeira imagem correta
										}
									}
								}
								?>
							</div>
						</div> <!--card-content-->
						<div class="p-4">
							<div class="flex w-full flex-col items-center gap-2 sm:flex-row sm:justify-between">
								<a href="<?= $url ?>" class="h-8 rounded-md px-3 text-xs w-full  border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground text-center pt-[.4rem]">Ver detalhes</a>
								<a target="_blank" href="<?= the_field('link_afiliado'); ?>" class="h-8 rounded-md px-3 text-xs w-full border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground text-center pt-[.4rem] bg-slate-300 text-dark font-bold">Acessar o site</a>
							</div>
						</div> <!--card-footer-->
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<!-- 		<div class="px-12 py-16 my-12 rounded-xl bg-gradient-to-r from-blue-50 from-10% via-sky-100 via-30% to-blue-200 to-90%">
                    <div class="mx-auto max-w-screen-md">
                        <h1 class="text-3xl lg:text-6xl tracking-tight font-extrabold text-gray-800 mb-6">Start building your next <a href="https://tailwindcss.com" class="text-secondary">Tailwind CSS</a> flavoured WordPress theme
                            with <a href="https://tailpress.io" class="text-primary">TailPress</a>.</h1>
                        <p class="text-gray-600 text-xl font-medium mb-10">TailPress is your go-to starting
                            point for developing WordPress themes with Tailwind CSS and comes with basic block-editor support out
                            of the box.</p>
                        <a href="https://github.com/jeffreyvr/tailpress"
                            class="w-full sm:w-auto flex-none bg-gray-900 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200">View
                            on GitHub</a>
                    </div>
                </div> -->
</div>
<!-- End introduction -->






<? get_footer() ?>
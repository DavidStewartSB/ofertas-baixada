<div>
	<div class="mb-5">
		<h1 class="font-bold text-3xl">Melhores descontos da <span class="capitalize"><?= get_the_title() ?></span></h1>
		<p></p>
	</div>
	<div class="flex gap-5">
		<div class="flex flex-col gap-5">
			<div class="border p-2 px-5 border-gray-300 rounded-sm shadow-sm bg-gray-100">
				<div class="w-[250px]">
					<h3 class="font-bold text-md pb-2 capitalize">Informações sobre <?= get_the_title(); ?></h3>
					<div class="relative w-full">
						<a href="https://www.americanas.com.br" target="_blank">
							<div class="image-container">
								<img class="h-[200px] object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>" width="100%" height="100%">
								<p class="hover-text p-2 font-bold text-2xl capitalize">
									<?= get_the_content() ?>
								</p>
							</div>
						</a>
					</div>

					<ul class="my-5 font-bold text-sm">
						<li class="flex gap-5 mb-3">
							<img width="20" height="20" src="<?= get_template_directory_uri(); ?>/assets/icons/tel.svg" alt="cart logo">
							<span><?= get_field('telefone'); ?></span>
						</li>
						<li class="flex gap-5">
							<img width="20" height="20" src="<?= get_template_directory_uri(); ?>/assets/icons/map.svg">
							<span><?= get_field('endereco'); ?></span>
						</li>
					</ul>
				</div>
			</div>

			<div class="border p-2 px-5 border-gray-300 rounded-sm shadow-sm bg-gray-100">
				<div class="w-[250px]">
					<h4 class="font-bold text-sm pb-2">Categorias em destaque</h4>

					<div class="grid grid-cols-2 gap-2">
						<?php
						$args_cat = array(
							'taxonomy' => 'category',
							'hide_empty' => false
						);
						$wp_cats = get_categories($args_cat);
						
						if ($wp_cats) :
							foreach ($wp_cats as $category) :
								$category_link = get_category_link($category->term_id);
						?>
								<a href="<?= $category_link ; ?>">
									<div class="text-center py-1 border border-gray-300 rounded-md px-2 bg-white ">
										<?= $category->name; ?>
									</div>
								</a>
						<?php
							endforeach;
						endif;
						?>
					</div>
				</div>

			</div>
			<div class="border p-2 px-5 border-gray-300 rounded-sm shadow-sm bg-gray-100">
				<div class="w-[250px]">
					<h4 class="font-bold text-sm pb-2">Ofertas em outros sites <span><?= get_the_title() ?></h4>


					<?php
					$args = array(
						'post_status' => 'publish',
						'post_type' => 'lojas',
						'orderby' => 'title',
						'order' => 'ASC'
					);
					$wp_lojas = new WP_Query($args);

					if ($wp_lojas->have_posts()) :
						while ($wp_lojas->have_posts()) : $wp_lojas->the_post();
					?>
							<a href="<?= get_permalink() ?>">
								<div class="flex items-center w-full border-y border-gray-300 p-3">
									<div>
										<img width="80" height="80" class="object-cover w-20 h-20" src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title(); ?>">
									</div>
									<p class="ml-5"><?= get_the_title(); ?><br>69 ofertas</p>
									<div class="ml-auto">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
										</svg>
									</div>
								</div>
							</a>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="flex flex-col gap-5">
			<?php
			$args_post = array(
				'status' => 'publish',
				'orderby' => 'title',
				'post_type' => 'post',
				'order' => 'DESC'
			);

			$wp_posts = new WP_Query($args_post);

			$slug = get_query_var('lojas');

			if ($wp_posts->have_posts()) :
				while ($wp_posts->have_posts()) : $wp_posts->the_post();
					$field_value = get_field('e-commerce_afiliado');
					if ($field_value && isset($field_value->post_title)) :
						$post_title = $field_value->post_title;

						if ($post_title === $slug) {
			?>
							<div class="border border-gray-300 bg-gray-100 shadow-sm p-4 grid grid-cols-12 gap-5 rounded-sm">
								<div class="col-span-3 bg-white border border-gray-300"><img class="h-[200px] object-contain px-2" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>" width="100%" height="100%"></div>

								<div class="col-span-6 flex flex-col">
									<a href="<?= get_permalink() ?>">
										<h2 class="font-bold text-2xl mb-8">
											<?= truncate(get_the_title(), 80) ?>
										</h2>
										<p>
											<?php if (get_the_content()) : ?>
												<?= truncate(get_the_content(), 200) ?>
											<?php else : ?>
												Produto sem Descrição
											<?php endif; ?>
										</p>
									</a>
								</div>

								<div class="col-span-3 self-center"> <a href="<?= the_field('link_afiliado') ?>">
										<button class="flex justify-center items-center bg-[#6366F1] text-white uppercase font-bold text-lg w-full  rounded-full  px-3 py-2">Compre agora! <img width="28" height="28" src='<?= get_template_directory_uri() ?>/assets/icons/cart.svg' alt="cart logo" class="ml-3">
										</button>
									</a></div>
							</div>
			<?php
						}
					endif;
				endwhile;
				wp_reset_postdata();
			else :
				echo 'Nenhum post encontrado.';
			endif;
			?>
		</div>

	</div>
</div>
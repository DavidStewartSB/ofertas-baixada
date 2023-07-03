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
								$related_posts = get_field('lojas');
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
                    
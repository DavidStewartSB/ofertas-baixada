<div class="related-posts rounded-sm shadow bg-gray-100 border border-gray-300  p-4">
    <h2 class="font-bold text-2xl ml-9 mb-5">Produtos Relacionados</h2>

<!-- Estrutura HTML para o Swiper -->
<div class="swiper-container overflow-hidden relative">
  <div class="swiper-wrapper">
    <?php
    // Obtém as categorias do post atual
    $categories = get_the_category();

    if ($categories) {
      $category_ids = array();
      foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
      }

      // Argumentos para a consulta dos posts relacionados
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10, // Defina o número de posts relacionados a exibir
        'post__not_in' => array($post->ID), // Exclui o post atual da lista de posts relacionados
        'category__in' => $category_ids, // Filtra por categorias do post atual
        'orderby' => 'rand', // Ordena aleatoriamente os posts relacionados
      );

      $related_posts = new WP_Query($args);

      if ($related_posts->have_posts()) {
        while ($related_posts->have_posts()) {
          $related_posts->the_post();
    ?>
          <div class="swiper-slide">
          <div class=" h-full overflow-hidden bg-white text-dark border border-gray-500 rounded-md hover:shadow-lg">
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
						</div> <!--card-content-->
						<div class="p-4">
							<div class="flex w-full flex-col items-center gap-2 sm:flex-row sm:justify-between">
								<a href="<?= $url ?>" class="h-8 rounded-md px-3 text-xs w-full  border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground text-center pt-[.4rem]">Ver detalhes</a>
								<a target="_blank" href="<?= the_field('link_afiliado'); ?>" class="h-8 rounded-md px-3 text-xs w-full border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground text-center pt-[.4rem] bg-slate-300 text-dark font-bold">Acessar o site</a>
							</div>
						</div> <!--card-footer-->
					</div>
          </div>
    <?php
        }
        wp_reset_postdata();
      } else {
        echo 'Nenhum post relacionado encontrado.';
      }
    }
    ?>
  </div>

  <!-- Adicione as setas de navegação -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

<!-- Importe o Swiper JS -->

<!-- Inicialize o Swiper -->
</div>
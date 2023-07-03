<form role="search" method="get" class="search-form flex w-full" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="flex-[1] w-full">
        <span class="screen-reader-text"><?php _e('Search for:', 'textdomain'); ?></span>
        <input type="search" class="px-2 py-2 flex-grow rounded-md w-full" placeholder="<?php echo esc_attr_x('Pesquisar', 'placeholder', 'textdomain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="ml-3 bg-[#6366F1] rounded-full h-10 w-10 flex justify-center items-center"><?php _e('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
</svg>', 'textdomain'); ?></button>
</form>
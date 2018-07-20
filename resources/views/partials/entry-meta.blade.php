<div class="meta-wp"><span class="categories">{!! get_the_category_list(', ') !!}</span> |
  <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time> |
  <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
      {{ get_the_author() }}
    </a>
  </div>

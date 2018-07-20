<article @php post_class() @endphp>
  @if(has_post_thumbnail())
    <a href="{{ get_the_permalink() }}" class="flex sm:max-w-full sm:w-full items-start">
      <img src="{{ the_post_thumbnail_url( 'full' ) }}" class="min-w-full object-fit-cover">
    </a>
  @endif
  <header>
    @include('partials/entry-meta')
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="article-content">
  <div class="entry-content pb-20">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  </div>
</article>

<h3 class='text-grey mt-10'>Postari asemanatoare</h3>
@php
if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
    echo do_shortcode( '[jetpack-related-posts]' );
}
@endphp

@php comments_template('/partials/comments.blade.php') @endphp

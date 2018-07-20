<article @php post_class('bg-white mt-12 flex flex-col') @endphp>
  @if(has_post_thumbnail())
    <div class="overflow-hidden">
      <a href="{{ get_the_permalink() }}"><img src="{{ the_post_thumbnail_url( 'full' ) }}" alt="" style="object-fit:cover;"></a>
    </div>
  @endif
  <div class="p-10">
    <header>
      @include('partials/entry-meta')
    <h2 class="entry-title text-post-title"><a href="{{ get_permalink() }}" class='text-black'>{!! get_the_title() !!}</a></h2>
  </header>
  <div class="entry-summary mt-4">
    @php echo App\get_better_excerpt(['words' => 70]) @endphp
  </div>
  </div>
  <a href="{{ get_the_permalink() }}" class="read-more-btn mt-12">Citeste tot articolul</a>
</article>

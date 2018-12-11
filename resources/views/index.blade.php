@extends('layouts.app')

@section('content')
@php global $wp_query; $rest = ''; $first = ''; $count = 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
@endphp

@while (have_posts()) @php the_post() @endphp
        @php ob_start(); @endphp
        @if($count === 0 && $wp_query->found_posts > 1)
        <div class="container mx-auto -mt-32 bg-white max-h-70 border-1 border-grey flex flex-1 sm:flex-col sm:min-w-full sm:max-h-full sm:mt-8 main-box-shadow">
            @if(has_post_thumbnail())
            <a href="{{ get_the_permalink() }}" class="featured-image flex sm:max-h-sm sm:max-w-full sm:w-full"><img src="{{ the_post_thumbnail_url( 'full' ) }}" class="featured-image  sm:max-w-full sm:w-full"></a>
          @endif
            <div class='flex flex-1 flex-col antialiased'>
                <div class='pt-12 pl-6'>
                    @include('partials/entry-meta')
                  <h2 class='text-5xl'><a href="{{ get_the_permalink() }}" class="text-black hover:text-black focus:text-black focus:no-underline hover:no-underline">{!! the_title() !!}</a></h2>
                  <p class="text-3xl mr-8 font-medium">@php echo App\get_better_excerpt(['words' => 40]) @endphp</p>
                </div>
                <a href="{{ get_the_permalink() }}" class="read-more-btn" style="">Citeste tot articolul</a>
            </div>
        </div>
        @php $first = ob_get_clean() @endphp
        @else
          @include('partials.content-'.get_post_type())
          @if($paged == 1 && is_home() && $count == 1)
            <article class="bg-white mt-12 flex flex-row sm:flex-col min-h-0 podcast-div sm:p-6" style="background-image: url('@asset('images/bg_podcast.jpg')');     background-size: cover;">
                <img src="@asset('images/cover_podcast.jpg')" alt="Podcast Catalina si Filip Pacurar - Cu de toate" class="podcast-image  sm:max-w-full sm:w-full" />
                <div class="pl-4 pt-4 sm:pl-0">
                    <a href="https://anchor.fm/cudetoate" target="_blank"><h1 class="text-white">Cu de toate - Podcast-ul nostru</h1></a>
                    <div class="text-grey text-base ml-1">By Filip si Catalina Pacurar</div>
                    <div class="text-white ml-1 mt-4">Cu de toate... exact ca o shaorma! Podcastul unui programator in care voi vorbi despre orice imi trece prin minte! Absolut orice... deci nu doare de programare :D</div>
                    <div id="putiframehere">

                    </div>
                    @if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false)
                    <script>
                    jQuery(document).load(function() {
                      jQuery('#putiframehere').html('<iframe src="https://anchor.fm/cudetoate/embed" height="102px" width="325px" frameborder="0" scrolling="no"></iframe>');
                    })
                    </script>
                    @endif
                    <div class="mt-2 flex flex-row">
                        <div><a href="https://anchor.fm/cudetoate" target="_blank"><img src="@asset('images/anchor.png')" style="width: 200px" alt=""></a></div>
                        <div class="ml-2"><a href="https://open.spotify.com/show/7ykNr0Vn7ffsmCY8hMRm0b?si=AS9X_MOHSSmgv6N9dKW0dQ" target="_blank"><img src="@asset('images/spotify.png')" style="width: 200px" alt=""></a></div>
                        <div class="ml-2"><img src="@asset('images/soon_itunes.png')" style="width: 150px" alt=""></div>
                    </div>
                </div>
            </article>
          @endif
          @php $rest .= ob_get_clean() @endphp
        @endif
        @php $count++ @endphp
      @endwhile

      @if($count > 1)
      {!! $first !!}
      @endif
  {{-- @while($latest->have_posts()) @php $latest->the_post() @endphp

  @endwhile
  @php wp_reset_query() @endphp --}}
  {{-- @include('partials.page-header') --}}

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @if(is_home())
  @include('partials.consultanta')
  @endif

  <div class="container mx-auto flex sm:flex-col md:flex-col lg:flex-row">
      <div class="w-3/4 lg:w-3/4 md:w-full md:min-w-full lg:min-w-0 sm:w-full sm:min-w-full">
        {!! $rest !!}
      </div>
      <div class="w-1/4 lg:w-1/4 pl-8 lg:pl-8 mt-12 sm:w-full sm:max-w-full md:w-full md:max-w-full flex-1 sm:pl-0 md:pl-0">
          @php if ( is_active_sidebar( 'sidebar-primary' ) ) : @endphp

          <aside class="main-sidebar">
              @php dynamic_sidebar( 'sidebar-primary' ); @endphp
          </aside>

          <?php endif; ?>
      </div>
  </div>

  <div class="container pagination-container flex">
    <div class="w-full sm:pl-10">
      {!! wp_pagenavi() !!}
    </div>
  </div>
@endsection

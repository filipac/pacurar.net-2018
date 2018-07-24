@extends('layouts.app')

@section('content')
@php global $wp_query; $rest = ''; $first = ''; $count = 0; @endphp

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

  <div class="container mx-auto flex">
      <div class="w-3/4 lg:w-3/4 md:w-full md:min-w-full lg:min-w-0 sm:w-full sm:min-w-full">
        {!! $rest !!}
      </div>
      <div class="w-1/4 lg:w-1/4 pl-8 mt-12 sm:w-full sm:max-w-full flex-1">
          @php if ( is_active_sidebar( 'sidebar-primary' ) ) : @endphp

          <aside class="main-sidebar">
              @php dynamic_sidebar( 'sidebar-primary' ); @endphp
          </aside>

          <?php endif; ?>
      </div>
  </div>

  <div class="container pagination-container flex">
    <div class="w-full">
      {!! wp_pagenavi() !!}
    </div>
  </div>
@endsection

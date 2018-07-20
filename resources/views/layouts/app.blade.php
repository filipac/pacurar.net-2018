<!doctype html>
<html @php language_attributes() @endphp>
  @include('partials.head')
  <body @php body_class('bg-body') @endphp>
    <div class="site-canvas overflow-hidden">
        <div id="site-menu" class=" md:hidden lg:hidden">
       <a href="#" class="toggle-nav" style="color: pink; font-size: 20px;"><i class="fa fa-times"></i></a>

{!! wp_nav_menu(['menu' => 'Principal', 'walker' => new \App\Classes\NavWalker, 'items_wrap' => '<div class="mobile-menu"><form><select onchange="if (this.value) window.location.href=this.value">%3$s</select></form></div>']) !!}
     </div>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="container mx-auto" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </div>
  </body>
</html>

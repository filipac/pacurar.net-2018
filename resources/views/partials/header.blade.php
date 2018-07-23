{{-- <header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header> --}}
{{-- <p>test</p> --}}
<header class="bg-black pb-32 w-full bg-cover min-h-header sm:min-h-header-mobile" style='background-image: url("{{ header_image() }}"); background-position-y: 35%;'>
  <div class="container mx-auto pb-4 flex sm:justify-between sm:pt-4">
      <div style="width: 270px;" class="flex flex-col justify-end">
        <a href="{{ bloginfo('siteurl') }}"><img src="@asset('images/logo_nume.png')" alt="Filip Pacurar"></a>
      </div>
      <div style="" class="navigatie bg-red w-full sm:w-1/4 ml-8 sm:ml-auto sm:flex">
        <div class='md:hidden sm:block sm:flex sm:flex-col sm:justify-center sm:align-center sm:items-center sm:flex-1 cursor-pointer toggle-nav'>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve" width="50px" height="50px">
              <g>
                <path d="M28,0C12.561,0,0,12.561,0,28s12.561,28,28,28s28-12.561,28-28S43.439,0,28,0z M28,54C13.663,54,2,42.336,2,28   S13.663,2,28,2s26,11.664,26,26S42.337,54,28,54z" fill="#FFFFFF"></path>
                <path d="M15,17h26c0.553,0,1-0.448,1-1s-0.447-1-1-1H15c-0.553,0-1,0.448-1,1S14.447,17,15,17z" fill="#FFFFFF"></path>
                <path d="M45,31H11c-0.553,0-1,0.448-1,1s0.447,1,1,1h34c0.553,0,1-0.448,1-1S45.553,31,45,31z" fill="#FFFFFF"></path>
                <path d="M45,23H11c-0.553,0-1,0.448-1,1s0.447,1,1,1h34c0.553,0,1-0.448,1-1S45.553,23,45,23z" fill="#FFFFFF"></path>
                <path d="M41,39H15c-0.553,0-1,0.448-1,1s0.447,1,1,1h26c0.553,0,1-0.448,1-1S41.553,39,41,39z" fill="#FFFFFF"></path>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              </svg>
        </div>
        {!! wp_nav_menu(['menu' => 'Principal', 'menu_class' => 'mainnav sm:hidden', 'container' => false]) !!}
        {{-- <ul class="mainnav">
            <li class='menu-item'><a href="#">Home</a></li>
            <li class='menu-item'><a href="#">About</a></li>
            <li class="hassubs menu-item"><a href="#">Services</a>
                <ul class="dropdown">
                    <li class="subs menu-item"><a href="#">Web Development</a></li>
                    <li class="subs menu-item"><a href="#">Mobile Apps</a></li>
                    <li class="subs menu-item hassubs"><a href="#">Designing</a>
                        <ul class="dropdown">
                            <li class="subs menu-item"><a href="#">Web Design</a></li>
                            <li class="subs menu-item"><a href="#">Graphic Design</a></li>
                            <li class="subs menu-item"><a href="#">Logo Design</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class='menu-item'><a href="#">Gallery</a></li>
            <li class="hassubs menu-item"><a href="#">Contact</a>
                <ul class="dropdown">
                    <li class="subs menu-item"><a href="#">Email</a></li>
                    <li class="subs menu-item hassubs"><a href="#">Address</a>
                        <ul class="dropdown">
                            <li class="subs menu-item"><a href="#">Head Office</a></li>
                            <li class="subs menu-item"><a href="#">Registered Office</a></li>
                            <li class="subs menu-item"><a href="#">Locate us</a></li>
                        </ul>
                    </li>
                    <li class="subs menu-item"><a href="#">Phone</a></li>
                </ul>
            </li>
        </ul> --}}
        {{-- <ul class="list-reset flex justify-around align-center items-center h-full sm:hidden"> --}}
          {{-- <li class="menu-item md:text-3xl lg:text-4p2xl"><a href="/">Acasa</a></li> --}}
          {{-- <li class="menu-item md:text-3xl lg:text-4p2xl"><a href="/">Poze</a></li> --}}
          {{-- <li class="menu-item md:text-3xl lg:text-4p2xl"><a href="/">Despre mine</a></li> --}}
          {{-- <li class="menu-item md:text-3xl lg:text-4p2xl"><a href="/">Arhiva</a></li> --}}
          {{-- <li class="menu-item md:text-3xl lg:text-4p2xl"><a href="/">Random din trecut</a></li> --}}
        {{-- </ul> --}}
      </div>
  </div>
</header>
<div class="main">
</div>

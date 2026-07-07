<div class="top-ribbon text-sm">
  <div class="container-main flex flex-col md:flex-row gap-2 md:items-center md:justify-between py-2">
    <div class="flex items-center gap-4 flex-wrap">
      <span><i class="fa-solid fa-location-dot mr-2"></i>{{ $siteSettings->top_address ?? 'Pallotti Bhawan, Seminary Hills, Nagpur' }}</span>
      <span><i class="fa-solid fa-envelope mr-2"></i>{{ $siteSettings->top_email ?? 'napallottines@gmail.com' }}</span>
    </div>
    <div class="flex items-center gap-4 flex-wrap">
      <span><i class="fa-solid fa-phone mr-2"></i>{{ $siteSettings->top_phone ?? '+91 9503505802' }}</span>
      <span><i class="fa-solid fa-globe mr-2"></i>{{ $siteSettings->top_website ?? 'www.napallottines.org' }}</span>
    </div>
  </div>
</div>
<header class="main-header bg-white/92 backdrop-blur-xl border-b border-amber-100">
  <div class="container-main py-4">
    <div class="brand-center">
      <a href="{{ route('site.home') }}" class="brand-lockup flex items-center gap-4">
        <img src="{{ \App\Support\SiteAsset::url($siteSettings->logo ?? 'site/assets/img/crest.png') }}" class="brand-logo w-14 h-14 rounded-full border border-amber-200 p-1 bg-white" alt="Province logo">
        <div class="brand-title text-center">
          <p>{{ $siteSettings->brand_prefix ?? 'Society of Catholic Apostolate' }}</p>
          <h1>{{ $siteSettings->site_name ?? 'Prabhu Prakash Province, Nagpur' }}</h1>
        </div>
      </a>
      <button id="mobileBtn" class="mobile-toggle lg:hidden"><i class="fa-solid fa-bars"></i></button>
    </div>
    <nav class="desktop-nav mt-4 flex items-center justify-center gap-1 border-t border-amber-100 pt-2">
      @foreach($headerMenu as $item)
        @if($item->children->isNotEmpty())
          <div class="dropdown relative">
            <button class="nav-link flex items-center gap-1 {{ request()->is(trim($item->url, '/')) ? 'active' : '' }}">{{ $item->title }}<i class="fa-solid fa-chevron-down text-xs"></i></button>
            <div class="dropdown-menu absolute left-0 top-full w-72 bg-white rounded-2xl border border-amber-100 p-2 z-50">
              @foreach($item->children as $child)
                <a class="block px-5 py-3 hover:bg-amber-50 hover:text-[var(--wine)] rounded-xl" href="{{ url($child->url) }}">{{ $child->title }}</a>
              @endforeach
            </div>
          </div>
        @else
          <a class="nav-link {{ url()->current() === url($item->url) ? 'active' : '' }}" href="{{ url($item->url) }}">{{ $item->title }}</a>
        @endif
      @endforeach
    </nav>
    <div id="mobilePanel" class="mobile-panel lg:hidden mt-4 border-t border-amber-100 pt-3">
      @foreach($headerMenu as $item)
        @if($item->children->isNotEmpty())
          <p class="font-black text-[var(--wine)] mt-2">{{ $item->title }}</p>
          @foreach($item->children as $child)
            <a class="block py-2 pl-3" href="{{ url($child->url) }}">{{ $child->title }}</a>
          @endforeach
        @else
          <a class="block py-2 font-bold" href="{{ url($item->url) }}">{{ $item->title }}</a>
        @endif
      @endforeach
    </div>
  </div>
</header>
<section class="{{ $page->hero_style }} text-white py-24 md:py-28">
  <div class="container-main">
    <div class="max-w-3xl reveal">
      @if($page->hero_eyebrow)
        <span class="eyebrow bg-white/15 border-white/20 text-amber-100">{{ $page->hero_eyebrow }}</span>
      @endif
      <h1 class="font-serif text-4xl md:text-6xl font-black mt-5 text-balance">{{ $page->hero_title ?: $page->title }}</h1>
      @if($page->hero_subtitle)
        <p class="text-lg md:text-xl text-white/85 leading-8 mt-5">{{ $page->hero_subtitle }}</p>
      @endif
    </div>
  </div>
</section>
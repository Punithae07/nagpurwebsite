@extends('site.layouts.app')

@section('content')
  @php($intro = $sections['intro'] ?? null)
  @php($sidebar = $sections['sidebar'] ?? null)
  @php($centres = $sections['centres'] ?? null)
  @php($note = $sections['note'] ?? null)
  <section class="formation-hero">
    <div class="container-main">
      <div class="formation-hero-shell reveal">
        <div class="formation-hero-copy"><span class="eyebrow">{{ $page->hero_eyebrow }}</span><h1 class="section-title text-4xl md:text-6xl mt-5">{{ $page->hero_title }}</h1><p class="formation-lead">{{ $page->hero_subtitle }}</p></div>
        <div class="formation-hero-media"><img src="{{ \App\Support\SiteAsset::url($page->hero_image, 'site/assets/img/pallottine-75-years.webp') }}" alt="{{ $page->hero_title }}"></div>
      </div>
    </div>
  </section>
  <section class="section-tight"><div class="container-main"><div class="formation-intro reveal"><span class="eyebrow">{{ $intro->eyebrow ?? 'Overview' }}</span><h2 class="section-title text-3xl md:text-5xl mt-4">{{ $intro->title ?? 'A formation journey rooted in faith and mission' }}</h2><div class="cms-content prose prose-slate max-w-none">{!! $intro->content ?? '' !!}</div></div></div></section>
  <section class="section formation-layout-section"><div class="container-main"><div class="formation-layout"><aside class="formation-sidebar reveal"><div class="formation-sidebar-card"><span class="eyebrow">{{ $sidebar->eyebrow ?? 'Formation Contact' }}</span><h2 class="section-title text-3xl mt-4">{{ $sidebar->title ?? 'Formation Centres' }}</h2><p class="formation-sidebar-text">{{ $sidebar->subtitle }}</p><div class="formation-address-list">@foreach(($sidebar->items ?? []) as $item)<article class="formation-address-item"><div class="formation-address-icon"><i class="{{ $item['icon'] ?? 'fa-solid fa-location-dot' }}"></i></div><div><h3>{{ $item['title'] }}</h3><p>{!! nl2br(e($item['text'])) !!}</p></div></article>@endforeach</div><a href="{{ url('/contact') }}" class="btn-primary formation-sidebar-btn">Contact Province <i class="fa-solid fa-arrow-right"></i></a></div></aside><div class="formation-content"><div class="formation-section-head reveal"><span class="eyebrow">{{ $centres->eyebrow ?? 'List of Formation Centres' }}</span><h2 class="section-title text-3xl md:text-5xl mt-4">{{ $centres->title ?? 'Formation houses and study centres' }}</h2></div><div class="formation-cards">@foreach(($centres->items ?? []) as $item)<article class="formation-centre-card reveal"><div class="formation-centre-image"><img src="{{ \App\Support\SiteAsset::url($item['image'] ?? null, 'site/assets/img/event-jubilee.webp') }}" alt="{{ $item['title'] }}"></div><div class="formation-centre-body"><h3>{{ $item['title'] }}</h3><p>{{ $item['text'] }}</p></div></article>@endforeach</div></div></div></div></section>
  <section class="section-tight"><div class="container-main"><div class="formation-note reveal"><div class="icon-badge"><i class="{{ $note->settings['icon'] ?? 'fa-solid fa-cross' }}"></i></div><div><span class="eyebrow">{{ $note->eyebrow ?? 'Pallottine Spirit' }}</span><h2 class="section-title text-2xl md:text-4xl mt-4">{{ $note->title ?? 'The love of Christ urges us on' }}</h2><p>{{ $note->content }}</p></div></div></div></section>
@endsection

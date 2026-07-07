@extends('site.layouts.app')

@section('content')
  @include('site.partials.page-hero')
  @php($overview = $sections['overview'] ?? null)
  @php($highlights = $sections['highlights'] ?? null)
  <section class="section">
    <div class="container-main">
      <div class="reveal max-w-4xl">
        <span class="eyebrow">{{ $overview->eyebrow ?? 'Overview' }}</span>
        <h2 class="section-title text-3xl md:text-5xl mt-4 mb-6">{{ $overview->title ?? $page->title }}</h2>
        <div class="cms-content prose prose-slate max-w-none">{!! $overview->content ?? '' !!}</div>
      </div>
    </div>
  </section>
  @if($highlights)
    <section class="section-tight soft-bg">
      <div class="container-main">
        <div class="max-w-2xl mb-10 reveal"><span class="eyebrow">{{ $highlights->eyebrow ?? 'Highlights' }}</span><h2 class="section-title text-3xl md:text-5xl mt-4">{{ $highlights->title ?? 'Key Details' }}</h2></div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach(($highlights->items ?? []) as $item)
            <div class="card-premium p-7 reveal"><div class="icon-badge mb-5"><i class="{{ $item['icon'] ?? 'fa-solid fa-star' }}"></i></div><h3 class="font-serif text-2xl font-black mb-3 text-[var(--navy)]">{{ $item['title'] }}</h3><p class="text-slate-600 leading-7">{{ $item['text'] }}</p></div>
          @endforeach
        </div>
      </div>
    </section>
  @endif
  @include('site.partials.cta', ['section' => $sections['cta'] ?? null])
@endsection

@extends('site.layouts.app')

@section('content')
  <section class="page-hero text-white py-24 md:py-28">
    <div class="container-main">
      <div class="max-w-3xl reveal">
        <span class="eyebrow bg-white/15 border-white/20 text-amber-100">{{ $page->hero_eyebrow }}</span>
        <h1 class="font-serif text-4xl md:text-6xl font-black mt-5 text-balance">{{ $page->hero_title }}</h1>
        <p class="text-lg md:text-xl text-white/85 leading-8 mt-5">{{ $page->hero_subtitle }}</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container-main">
      <div class="grid gap-6">
        @forelse($updates as $item)
          @php
            $itemUrl = filled($item->link)
              ? ((str_starts_with($item->link, 'http://') || str_starts_with($item->link, 'https://')) ? $item->link : url($item->link))
              : null;
            $category = trim((string) ($item->category ?? ''));
            $hasNumberBadge = preg_match('/^\d+/', $category) === 1;
          @endphp
          <article class="card-premium p-8 reveal">
            <div class="flex items-start gap-5">
              @if($hasNumberBadge)
                @php
                  preg_match('/^\d+/', $category, $numberMatch);
                  $eventNumber = $numberMatch[0] ?? '75';
                  $eventHeading = trim((string) preg_replace('/^\d+\w*\s*/', '', $category));
                  if ($eventHeading === '') {
                      $eventHeading = $item->title ?: 'Recent Update';
                  }
                @endphp
                <div class="event-date shrink-0"><strong>{{ $eventNumber }}</strong><span>{{ $item->title ?: 'Years' }}</span></div>
                <div class="flex-1">
                  <h2 class="font-serif text-2xl md:text-3xl font-black text-[var(--navy)] mb-3">{{ $eventHeading }}</h2>
                  <p class="text-slate-600 leading-8">{{ $item->description ?: 'Celebrating faith, mission and service across communities.' }}</p>
                </div>
              @else
                <div class="event-icon shrink-0"><i class="fa-solid fa-calendar-days"></i></div>
                <div class="flex-1">
                  <h2 class="font-serif text-2xl md:text-3xl font-black text-[var(--navy)] mb-3">{{ $item->title ?: 'Recent Update' }}</h2>
                  @if(filled($category))
                    <p class="text-[var(--wine)] font-bold mb-2">{{ $category }}</p>
                  @endif
                  <p class="text-slate-600 leading-8">{{ $item->description ?: 'Stay connected with the latest community updates.' }}</p>
                </div>
              @endif
            </div>
            @if($itemUrl)
              <div class="mt-6">
                <a href="{{ $itemUrl }}" class="btn-soft" @if(str_starts_with($itemUrl, 'http://') || str_starts_with($itemUrl, 'https://')) target="_blank" rel="noopener" @endif>Open update <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            @endif
          </article>
        @empty
          <div class="card-premium p-8 text-center reveal">
            <h2 class="section-title text-3xl mb-4">No recent updates yet</h2>
            <p class="text-slate-600 leading-8">Add recent updates from the admin panel and they will appear here automatically.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection

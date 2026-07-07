@extends('site.layouts.app')

@section('content')
  @include('site.partials.page-hero')
  @php($timeline = $sections['timeline'] ?? null)
  <section class="section">
    <div class="container-main">
      <div class="max-w-3xl mb-10 reveal"><span class="eyebrow">{{ $timeline->eyebrow ?? 'Timeline' }}</span><h2 class="section-title text-4xl md:text-5xl mt-4">{{ $timeline->title ?? 'Milestones' }}</h2></div>
      <div class="timeline max-w-4xl">
        @foreach(($timeline->items ?? []) as $item)
          <div class="timeline-item reveal"><span class="timeline-dot"></span><div class="card-premium p-6"><h3 class="font-serif text-3xl font-black text-[var(--wine)]">{{ $item['year'] }}</h3><p class="text-slate-600 leading-7 mt-2">{{ $item['text'] }}</p></div></div>
        @endforeach
      </div>
    </div>
  </section>
  @include('site.partials.cta', ['section' => $sections['cta'] ?? null])
@endsection
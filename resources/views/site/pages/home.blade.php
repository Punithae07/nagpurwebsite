@extends('site.layouts.app')

@section('content')
  <section class="designed-hero">
    <div class="hero-pattern"></div>
    <div class="container-main hero-layout">
      <div class="hero-gallery reveal">
        <div class="founder-showcase founder-slider">
          <div class="founder-frame">
            <div class="founder-slides">
              @forelse($heroSlides as $index => $slide)
                <div class="founder-slide {{ $index === 0 ? 'active' : '' }}">
                  <img src="{{ \App\Support\SiteAsset::url($slide->image, 'site/assets/img/st-vincent-pallotti.webp') }}" alt="{{ $slide->title }}">
                  <div class="founder-caption"><span>{{ $slide->category }}</span><strong>{{ $slide->title }}</strong></div>
                </div>
              @empty
                <div class="founder-slide active"><img src="{{ asset('site/assets/img/st-vincent-pallotti.webp') }}" alt="St. Vincent Pallotti"><div class="founder-caption"><span>Founder</span><strong>St. Vincent Pallotti</strong></div></div>
              @endforelse
            </div>
          </div>
          <div class="mini-gallery founder-thumbs">
            @foreach($heroSlides as $index => $slide)
              <button type="button" class="founder-thumb {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                <img src="{{ \App\Support\SiteAsset::url($slide->image, 'site/assets/img/st-vincent-pallotti.webp') }}" alt="{{ $slide->title }} thumbnail">
              </button>
            @endforeach
          </div>
        </div>
      </div>
      <aside class="event-panel reveal">
        <div class="panel-head">
          <span>{{ $sections['recent_updates']->eyebrow ?? 'Updates' }}</span>
          <h3>{{ $sections['recent_updates']->title ?? 'Recent Events' }}</h3>
        </div>
        @php
          $displayUpdates = collect($recentUpdates)->take(3)->values();
        @endphp
        @forelse($displayUpdates as $index => $item)
          @php
            $category = trim((string) ($item->category ?? ''));
            $hasNumberBadge = $index === 0 && preg_match('/^\d+/', $category) === 1;
          @endphp
          <article class="event-card {{ $hasNumberBadge ? 'live' : '' }}">
            @if($hasNumberBadge)
              @php
                preg_match('/^\d+/', $category, $numberMatch);
                $eventNumber = $numberMatch[0] ?? '75';
                $eventHeading = trim((string) preg_replace('/^\d+\w*\s*/', '', $category));
                if ($eventHeading === '') {
                    $eventHeading = $item->title ?: 'Pallottine Presence in India';
                }
              @endphp
              <div class="event-date"><strong>{{ $eventNumber }}</strong><span>{{ $item->title ?: 'Years' }}</span></div>
              <div><h4>{{ $eventHeading }}</h4><p>{{ $item->description ?: 'Celebrating faith, mission and service across communities.' }}</p></div>
            @else
              <div class="event-icon"><i class="fa-solid fa-calendar-days"></i></div>
              <div><h4>{{ $item->title ?: 'Recent Update' }}</h4><p>{{ $item->description ?: ($category ?: 'Stay connected with the latest community updates.') }}</p></div>
            @endif
          </article>
        @empty
          <article class="event-card live"><div class="event-date"><strong>75</strong><span>Years</span></div><div><h4>Pallottine Presence in India</h4><p>Celebrating faith, mission and service across communities.</p></div></article>
        @endforelse
        <a class="read-more-link" href="{{ route('site.recent-updates') }}">Read more <i class="fa-solid fa-arrow-right"></i></a>
      </aside>
    </div>
    <div class="container-main">
      @php
        $announcementHtml = $sections['welcome_strip']->content ?? 'Welcome to Prabhu Prakash Province, Nagpur. Birthdays, feast days and upcoming events will be updated here.';
        $announcementItems = [];

        preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $announcementHtml, $matches);

        if (! empty($matches[1])) {
            foreach ($matches[1] as $item) {
                $text = trim(html_entity_decode(strip_tags($item), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                if ($text !== '') {
                    $announcementItems[] = $text;
                }
            }
        }

        if (empty($announcementItems)) {
            $plainAnnouncements = preg_split('/(<br\s*\/?>|\r\n|\r|\n)+/i', $announcementHtml);
            foreach ($plainAnnouncements as $item) {
                $text = trim(html_entity_decode(strip_tags($item), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                if ($text !== '') {
                    $announcementItems[] = $text;
                }
            }
        }

        if (empty($announcementItems)) {
            $announcementItems[] = 'Welcome to Prabhu Prakash Province, Nagpur. Birthdays, feast days and upcoming events will be updated here.';
        }

        $announcementText = implode('   •   ', $announcementItems);
      @endphp
      <div class="welcome-strip reveal">
        <i class="fa-solid fa-bell"></i>
        <marquee behavior="scroll" direction="left">{{ $announcementText }}</marquee>
      </div>
    </div>
  </section>

  <section class="vision-designed section-tight">
    <div class="container-main">
      <div class="text-center reveal"><span class="eyebrow">{{ $sections['vision_mission']->eyebrow ?? 'Vision & Mission' }}</span><h2 class="section-title text-4xl md:text-5xl mt-4">{{ $sections['vision_mission']->title ?? 'Revive faith and enkindle charity' }}</h2></div>
      <div class="vision-row reveal">
        @php($visionItems = $sections['vision_mission']->items ?? [])
        <div class="vision-card left-card"><div class="vision-icon"><i class="fa-solid fa-eye"></i></div><h3>{{ $visionItems[0]['title'] ?? 'Vision' }}</h3><p>{{ $visionItems[0]['text'] ?? 'To revive faith and enkindle charity in the entire world.' }}</p></div>
        <div class="vision-image float-y"><img src="{{ \App\Support\SiteAsset::url($sections['vision_mission']->image, 'site/assets/img/mary-queen-apostles.webp') }}" alt="{{ $sections['vision_mission']->image_alt ?? 'Mary Queen of Apostles' }}"></div>
        <div class="vision-card right-card"><div class="vision-icon"><i class="fa-solid fa-hands-praying"></i></div><h3>{{ $visionItems[1]['title'] ?? 'Mission' }}</h3><p>{{ $visionItems[1]['text'] ?? 'To empower every member of the Church to become an apostle.' }}</p></div>
      </div>
    </div>
  </section>

  <section class="jubilee-section section-tight">
    <div class="container-main">
      <div class="section-heading-row reveal"><div><span class="eyebrow">{{ $sections['milestone']->eyebrow ?? 'Milestone' }}</span><h2 class="section-title text-3xl md:text-5xl mt-4">{{ $sections['milestone']->title ?? '75 years of Pallottine Presence in India' }}</h2></div><a href="{{ url('/milestones') }}" class="btn-soft">Explore Milestones</a></div>
      <div class="jubilee-card reveal"><img src="{{ \App\Support\SiteAsset::url($sections['milestone']->image, 'site/assets/img/pallottine-75-years.webp') }}" alt="{{ $sections['milestone']->image_alt ?? '75 years of Pallottine Presence in India' }}"></div>
    </div>
  </section>

  <section class="administration-designed section">
    <div class="container-main">
      <div class="text-center max-w-3xl mx-auto reveal"><span class="eyebrow">{{ $sections['leadership']->eyebrow ?? 'Provincial Administration' }}</span><h2 class="section-title text-4xl md:text-5xl mt-4">{{ $sections['leadership']->title ?? 'Guided by dedicated leadership' }}</h2></div>
      <div class="admin-grid reveal">
        @foreach($leaders as $index => $leader)
          <article class="admin-card {{ $index === 0 ? 'featured' : '' }}"><img src="{{ \App\Support\SiteAsset::url($leader->image, 'site/assets/img/fr-antony-herald-roswan.webp') }}" alt="{{ $leader->name }}"><h3>{{ $leader->name }}</h3><p>{{ $leader->designation }}</p></article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="glance-designed section-tight">
    <div class="container-main">
      <div class="text-center max-w-3xl mx-auto reveal"><span class="eyebrow">{{ $sections['stats']->eyebrow ?? 'Province at a Glance' }}</span><h2 class="section-title text-4xl md:text-5xl mt-4">{{ $sections['stats']->title ?? 'Members and formation' }}</h2></div>
      <div class="glance-stats-grid reveal">
        @foreach(($sections['stats']->items ?? []) as $stat)
          <article class="stat-card"><i class="{{ $stat['icon'] ?? 'fa-solid fa-cross' }}"></i><span>{{ $stat['label'] }}</span><strong data-count="{{ $stat['count'] }}">0</strong></article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="youtube-section section-tight">
    <div class="container-main">
      <div class="section-heading-row reveal"><div><span class="eyebrow"><i class="fa-brands fa-youtube"></i> {{ $sections['videos']->eyebrow ?? 'Pallotti Media Vision' }}</span><h2 class="section-title text-3xl md:text-5xl mt-4">{{ $sections['videos']->title ?? 'Watch, reflect and stay connected' }}</h2></div><a href="{{ $sections['videos']->settings['button_url'] ?? 'https://www.youtube.com/' }}" target="_blank" class="btn-soft">{{ $sections['videos']->settings['button_label'] ?? 'More Videos' }} <i class="fa-solid fa-arrow-right"></i></a></div>
      <div class="youtube-grid reveal">
        @foreach($videos as $video)
          <a class="youtube-card" href="{{ $video->link }}" target="_blank"><div class="youtube-thumb"><img src="{{ \App\Support\SiteAsset::url($video->image, 'site/assets/img/event-pallotti-media.webp') }}" alt="{{ $video->title }}"><span class="play-btn"><i class="fa-solid fa-play"></i></span></div><div class="youtube-content"><span>{{ $video->category }}</span><h3>{{ $video->title }}</h3></div></a>
        @endforeach
      </div>
    </div>
  </section>

  @include('site.partials.cta', ['section' => $sections['cta'] ?? null])
@endsection



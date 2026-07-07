@extends('site.layouts.app')

@section('content')
  @include('site.partials.page-hero')
  @php($details = $sections['contact_details'] ?? null)
  <section class="section">
    <div class="container-main grid lg:grid-cols-3 gap-8">
      <div class="lg:col-span-2 card-premium p-8 reveal">
        <span class="eyebrow">{{ $details->eyebrow ?? 'Province Office' }}</span>
        <h2 class="section-title text-4xl mt-4 mb-6">{{ $details->title ?? 'Pallotti Bhawan' }}</h2>
        <div class="grid md:grid-cols-2 gap-5">
          @foreach(($details->items ?? []) as $item)
            <div class="p-5 rounded-2xl bg-amber-50"><i class="{{ $item['icon'] ?? 'fa-solid fa-location-dot' }} text-[var(--wine)] text-2xl mb-3"></i><h3 class="font-black">{{ $item['title'] }}</h3><p class="text-slate-600 mt-2">{!! nl2br(e($item['text'])) !!}</p></div>
          @endforeach
        </div>
        @if($siteSettings?->google_map_iframe)
          <div class="mt-8 overflow-hidden rounded-[26px]">{!! $siteSettings->google_map_iframe !!}</div>
        @endif
      </div>
      <div class="card-premium p-8 reveal">
        <h3 class="font-serif text-3xl font-black mb-4">Quick Message</h3>
        @if(session('status'))<div class="mb-4 rounded-2xl bg-amber-50 p-4 text-sm text-[var(--wine)]">{{ session('status') }}</div>@endif
        <form class="grid gap-4" method="post" action="{{ route('site.contact.store') }}">
          @csrf
          <input name="name" value="{{ old('name') }}" class="border border-amber-200 rounded-2xl p-4" placeholder="Your Name">
          <input name="email" value="{{ old('email') }}" class="border border-amber-200 rounded-2xl p-4" placeholder="Email">
          <input name="phone" value="{{ old('phone') }}" class="border border-amber-200 rounded-2xl p-4" placeholder="Phone">
          <input name="subject" value="{{ old('subject') }}" class="border border-amber-200 rounded-2xl p-4" placeholder="Subject">
          <textarea name="message" rows="5" class="border border-amber-200 rounded-2xl p-4" placeholder="Message">{{ old('message') }}</textarea>
          <button type="submit" class="btn-primary justify-center">Send Message</button>
        </form>
      </div>
    </div>
  </section>
@endsection
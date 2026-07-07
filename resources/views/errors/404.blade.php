@php
    $page = (object) [
        'title' => 'Page Not Found',
        'meta_title' => '404 Error',
        'meta_description' => 'The page you are looking for could not be found.',
        'hero_image' => null,
    ];
@endphp

@extends('site.layouts.app')

@section('content')
  <section class="section page-hero text-white py-24 md:py-28">
    <div class="container-main">
      <div class="max-w-3xl reveal">
        <span class="eyebrow bg-white/15 border-white/20 text-amber-100">404 Error</span>
        <h1 class="font-serif text-4xl md:text-6xl font-black mt-5 text-balance">Oops! Page not found</h1>
        <p class="text-lg md:text-xl text-white/85 leading-8 mt-5">The page you requested does not exist or may have been moved.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container-main">
      <div class="card-premium p-8 md:p-12 max-w-3xl mx-auto text-center reveal">
        <div class="icon-badge mx-auto mb-6">
          <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <h2 class="section-title text-3xl md:text-5xl mb-4">404</h2>
        <p class="text-slate-600 leading-8 mb-8">We are sorry, but the page you were trying to open could not be found.</p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <a href="{{ url('/') }}" class="btn-primary">Go to Home</a>
          <button type="button" onclick="window.history.back()" class="btn-soft">Go Back</button>
        </div>
      </div>
    </div>
  </section>
@endsection

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $page->meta_title ?: $page->title }} | {{ $siteSettings->site_name ?? 'Prabhu Prakash Province, Nagpur' }}</title>
  <meta name="description" content="{{ $page->meta_description ?: 'Prabhu Prakash Province, Nagpur website.' }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  @vite(['resources/css/site.css', 'resources/js/site.js'])
</head>
<body @if($page->hero_image) style="--hero-img:url('{{ \App\Support\SiteAsset::url($page->hero_image) }}')" @endif>
  <div class="site-bg"></div>
  @include('site.partials.header')
  <main>
    @yield('content')
  </main>
  @include('site.partials.footer')
  <button id="toTop" class="fixed right-5 bottom-5 z-40 w-12 h-12 rounded-full bg-[var(--wine)] text-white shadow-xl opacity-0 transition"><i class="fa-solid fa-arrow-up"></i></button>
</body>
</html>
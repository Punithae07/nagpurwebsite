<section class="section">
  <div class="container-main">
    <div class="rounded-[34px] p-8 md:p-12 bg-gradient-to-br from-[#fff7df] to-white border border-amber-100 shadow-xl relative overflow-hidden">
      <div class="blob w-56 h-56 bg-amber-200 -right-20 -top-20"></div>
      <div class="grid md:grid-cols-3 gap-8 items-center relative">
        <div class="md:col-span-2"><span class="eyebrow">{{ $section->eyebrow ?? 'Stay Connected' }}</span><h2 class="section-title text-3xl md:text-5xl mt-4 mb-4">{{ $section->title ?? 'Join the mission of faith, service and communion.' }}</h2><div class="text-slate-600 leading-8 prose prose-slate max-w-none">{!! $section->content ?? '<p>Explore our communities, apostolic works and provincial initiatives through this complete responsive website template.</p>' !!}</div></div>
        <div class="flex md:justify-end"><a href="{{ $section->settings['button_url'] ?? url('/contact') }}" class="btn-primary">{{ $section->settings['button_label'] ?? 'Contact Province' }} <i class="fa-solid fa-arrow-right"></i></a></div>
      </div>
    </div>
  </div>
</section>

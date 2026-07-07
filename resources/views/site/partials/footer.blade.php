<footer class="footer footer-home pt-20 pb-8">
  <div class="container-main">
    <div class="footer-home-card">
      <div class="footer-home-top">
        <div class="footer-brand-block">
          <div class="footer-brand-row">
            <img src="{{ \App\Support\SiteAsset::url($siteSettings->footer_logo ?? $siteSettings->logo ?? 'site/assets/img/crest.png') }}" class="footer-home-logo" alt="Province logo">
            <div>
              <span class="footer-kicker">{{ $siteSettings->site_tagline ?? 'Pallottine Province' }}</span>
              <h3>{{ $siteSettings->site_name ?? 'Prabhu Prakash Province, Nagpur' }}</h3>
            </div>
          </div>
          <p>{{ $siteSettings->footer_about ?? 'Reviving faith and enkindling charity through prayer, formation, education, pastoral care and social apostolate.' }}</p>
          <div class="footer-mini-contact">
            <a href="tel:{{ preg_replace('/\s+/', '', $siteSettings->phone_primary ?? '+919503505802') }}"><i class="fa-solid fa-phone"></i> {{ $siteSettings->phone_primary ?? '+91 9503505802' }}</a>
            <a href="mailto:{{ $siteSettings->email_primary ?? 'napallottines@gmail.com' }}"><i class="fa-solid fa-envelope"></i> {{ $siteSettings->email_primary ?? 'napallottines@gmail.com' }}</a>
          </div>
        </div>
        <div class="footer-link-grid">
          <div class="footer-link-col">
            <h4>Quick Links</h4>
            @foreach($footerQuickLinks as $item)
              <a href="{{ url($item->url) }}">{{ $item->title }}</a>
            @endforeach
          </div>
          <div class="footer-link-col">
            <h4>Explore</h4>
            @foreach($footerExploreLinks as $item)
              <a href="{{ url($item->url) }}">{{ $item->title }}</a>
            @endforeach
          </div>
          <div class="footer-link-col footer-contact-col">
            <h4>Contact</h4>
            <div class="footer-contact-item"><i class="fa-solid fa-location-dot"></i><span>{{ $siteSettings->address ?? 'Pallotti Bhawan, Seminary Hills, Nagpur, Maharashtra, India' }}</span></div>
            <div class="footer-contact-item"><i class="fa-solid fa-phone"></i><span>{{ trim(($siteSettings->phone_primary ?? '+91 9503505802') . ' / ' . ($siteSettings->phone_secondary ?? '+91 9074515998'), ' /') }}</span></div>
            <div class="footer-contact-item"><i class="fa-solid fa-globe"></i><span>{{ $siteSettings->website ?? 'www.napallottines.org' }}</span></div>
          </div>
        </div>
      </div>
      <div class="footer-home-bottom">
        <p>{{ $siteSettings->footer_copyright ?? '© 2026 Prabhu Prakash Province, Nagpur. Designed as a responsive HTML template.' }}</p>
        <div class="footer-socials">
          @foreach(($siteSettings->social_links ?? []) as $social)
            <a href="{{ $social['url'] ?? '#' }}" @if(($social['target'] ?? '_self') === '_blank') target="_blank" rel="noopener" @endif aria-label="{{ $social['label'] ?? 'Social link' }}"><i class="{{ $social['icon'] ?? 'fa-brands fa-facebook-f' }}"></i></a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</footer>
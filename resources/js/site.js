document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('#mobileBtn');
  const panel = document.querySelector('#mobilePanel');
  if (btn && panel) {
    btn.addEventListener('click', () => panel.classList.toggle('open'));
  }

  if (panel) {
    const headings = [...panel.querySelectorAll('p')];
    headings.forEach((heading) => {
      const group = document.createElement('div');
      group.className = 'mobile-submenu';
      heading.parentNode.insertBefore(group, heading);
      group.appendChild(heading);

      const toggle = document.createElement('button');
      toggle.type = 'button';
      toggle.className = 'mobile-submenu-toggle';
      toggle.setAttribute('aria-expanded', 'false');
      toggle.innerHTML = `<span>${heading.textContent.trim()}</span><i class="fa-solid fa-chevron-down"></i>`;
      heading.replaceWith(toggle);

      const content = document.createElement('div');
      content.className = 'mobile-submenu-content';
      group.appendChild(content);

      let next = group.nextSibling;
      while (next) {
        const current = next;
        next = next.nextSibling;
        if (current.nodeType === 1 && current.tagName === 'P') break;
        if (current.nodeType === 1) content.appendChild(current);
      }

      toggle.addEventListener('click', () => {
        const isOpen = group.classList.toggle('open');
        toggle.setAttribute('aria-expanded', String(isOpen));
      });
    });
  }

  const founderSlider = document.querySelector('.founder-slider');
  if (founderSlider) {
    const slides = [...founderSlider.querySelectorAll('.founder-slide')];
    const thumbs = [...founderSlider.querySelectorAll('.founder-thumb')];
    let currentIndex = 0;
    let timer = null;

    const showSlide = (index) => {
      currentIndex = (index + slides.length) % slides.length;
      slides.forEach((slide, i) => slide.classList.toggle('active', i === currentIndex));
      thumbs.forEach((thumb, i) => thumb.classList.toggle('active', i === currentIndex));
    };

    const startSlider = () => {
      if (timer) clearInterval(timer);
      timer = setInterval(() => showSlide(currentIndex + 1), 4000);
    };

    thumbs.forEach((thumb, index) => {
      thumb.addEventListener('click', () => {
        showSlide(index);
        startSlider();
      });
    });

    showSlide(0);
    startSlider();
  }

  const io = new IntersectionObserver((entries) => entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
      io.unobserve(entry.target);
    }
  }), { threshold: 0.13 });
  document.querySelectorAll('.reveal').forEach((el) => io.observe(el));

  document.querySelectorAll('[data-count]').forEach((el) => {
    let done = false;
    const obs = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting && !done) {
        done = true;
        const target = parseInt(el.dataset.count, 10);
        let n = 0;
        const step = Math.max(1, Math.ceil(target / 60));
        const timer = setInterval(() => {
          n += step;
          if (n >= target) {
            n = target;
            clearInterval(timer);
          }
          el.textContent = n;
        }, 22);
      }
    });
    obs.observe(el);
  });

  const top = document.querySelector('#toTop');
  if (top) {
    window.addEventListener('scroll', () => top.classList.toggle('opacity-100', scrollY > 500));
    top.addEventListener('click', () => scrollTo({ top: 0, behavior: 'smooth' }));
  }
});

window.addEventListener('scroll', () => {
  document.body.classList.toggle('nav-only-sticky', window.scrollY > 135);
});
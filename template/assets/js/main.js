document.addEventListener('DOMContentLoaded',()=>{
  const btn=document.querySelector('#mobileBtn'),panel=document.querySelector('#mobilePanel');
  if(btn&&panel){btn.addEventListener('click',()=>panel.classList.toggle('open'))}

  if(panel){
    const headings=[...panel.querySelectorAll('p')];
    headings.forEach((heading,index)=>{
      const group=document.createElement('div');
      group.className='mobile-submenu';
      heading.parentNode.insertBefore(group,heading);
      group.appendChild(heading);

      const toggle=document.createElement('button');
      toggle.type='button';
      toggle.className='mobile-submenu-toggle';
      toggle.setAttribute('aria-expanded','false');
      toggle.innerHTML=`<span>${heading.textContent.trim()}</span><i class="fa-solid fa-chevron-down"></i>`;
      heading.replaceWith(toggle);

      const content=document.createElement('div');
      content.className='mobile-submenu-content';
      group.appendChild(content);

      let next=group.nextSibling;
      while(next){
        const current=next;
        next=next.nextSibling;
        if(current.nodeType===1 && current.tagName==='P') break;
        if(current.nodeType===1){
          content.appendChild(current);
        }
      }

      toggle.addEventListener('click',()=>{
        const isOpen=group.classList.toggle('open');
        toggle.setAttribute('aria-expanded',String(isOpen));
      });
    });
  }

  const founderSlider=document.querySelector('.founder-slider');
  if(founderSlider){
    const slides=[...founderSlider.querySelectorAll('.founder-slide')];
    const thumbs=[...founderSlider.querySelectorAll('.founder-thumb')];
    let currentIndex=0;
    let timer=null;

    const showSlide=(index)=>{
      currentIndex=(index+slides.length)%slides.length;
      slides.forEach((slide,i)=>slide.classList.toggle('active',i===currentIndex));
      thumbs.forEach((thumb,i)=>thumb.classList.toggle('active',i===currentIndex));
    };

    const startSlider=()=>{
      if(timer) clearInterval(timer);
      timer=setInterval(()=>showSlide(currentIndex+1),4000);
    };

    thumbs.forEach((thumb,index)=>{
      thumb.addEventListener('click',()=>{
        showSlide(index);
        startSlider();
      });
    });

    showSlide(0);
    startSlider();
  }
  const io=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('show');io.unobserve(e.target)}}),{threshold:.13});
  document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

  document.querySelectorAll('[data-count]').forEach(el=>{
    let done=false;
    const obs=new IntersectionObserver(entries=>{
      if(entries[0].isIntersecting&&!done){
        done=true;
        let target=parseInt(el.dataset.count,10),n=0,step=Math.max(1,Math.ceil(target/60));
        let timer=setInterval(()=>{
          n+=step;
          if(n>=target){n=target;clearInterval(timer)}
          el.textContent=n
        },22)
      }
    });
    obs.observe(el)
  });

  const top=document.querySelector('#toTop');
  if(top){
    window.addEventListener('scroll',()=>top.classList.toggle('opacity-100',scrollY>500));
    top.addEventListener('click',()=>scrollTo({top:0,behavior:'smooth'}));
  }

  const footerTemplate=`
    <div class="container-main">
      <div class="footer-home-card">
        <div class="footer-home-top">
          <div class="footer-brand-block">
            <div class="footer-brand-row">
              <img src="assets/img/crest.png" class="footer-home-logo" alt="Province logo">
              <div>
                <span class="footer-kicker">Pallottine Province</span>
                <h3>Prabhu Prakash Province, Nagpur</h3>
              </div>
            </div>
            <p>Reviving faith and enkindling charity through prayer, formation, education, pastoral care and social apostolate.</p>
            <div class="footer-mini-contact">
              <a href="tel:+919503505802"><i class="fa-solid fa-phone"></i><span>+91 9503505802</span></a>
              <a href="mailto:napallottines@gmail.com"><i class="fa-solid fa-envelope"></i><span>napallottines@gmail.com</span></a>
            </div>
          </div>
          <div class="footer-link-grid">
            <div class="footer-link-col">
              <h4>Quick Links</h4>
              <a href="index.html">Home</a>
              <a href="st-vincent-pallotti.html">About Us</a>
              <a href="local-communities.html">Administration</a>
              <a href="formation.html">Apostolic Works</a>
              <a href="contact.html">Contact Us</a>
            </div>
            <div class="footer-link-col">
              <h4>Explore</h4>
              <a href="milestones.html">Milestones</a>
              <a href="parishes.html">Mission Stations</a>
              <a href="boys-homes.html">Boys Homes</a>
              <a href="social-apostolate.html">Social Apostolate</a>
              <a href="milestones.html">Family Tree</a>
            </div>
            <div class="footer-link-col footer-contact-col">
              <h4>Contact</h4>
              <div class="footer-contact-item">
                <i class="fa-solid fa-location-dot"></i>
                <span>Pallotti Bhawan, Seminary Hills, Nagpur, Maharashtra, India</span>
              </div>
              <div class="footer-contact-item">
                <i class="fa-solid fa-phone"></i>
                <span>+91 9503505802 / +91 9074515998</span>
              </div>
              <div class="footer-contact-item">
                <i class="fa-solid fa-globe"></i>
                <span>www.napallottines.org</span>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-home-bottom">
          <p>&copy; 2026 Prabhu Prakash Province, Nagpur. Designed as a responsive HTML template.</p>
          <div class="footer-socials">
            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>`;

  const homeFooter=document.querySelector('.footer-home');
  if(homeFooter){
    document.querySelectorAll('.footer:not(.footer-home)').forEach(el=>el.remove());
    homeFooter.classList.add('footer','pt-20','pb-8');
    homeFooter.innerHTML=footerTemplate;
  }else{
    const footer=document.querySelector('.footer');
    if(footer){
      footer.classList.add('footer-home','pt-20','pb-8');
      footer.innerHTML=footerTemplate;
    }
  }
});

window.addEventListener('scroll',()=>{document.body.classList.toggle('nav-only-sticky', window.scrollY>135)});


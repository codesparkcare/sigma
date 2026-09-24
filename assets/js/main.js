/**
 * SIGMA HEIGHT ELEVATORS L.L.C - DUBAI
 * Core Interactive Experience, Elevator Simulation & Animations
 */

document.addEventListener('DOMContentLoaded', () => {
  initElevatorPreloader();
  initSoundToggle();
  initHeroParticles();
  initHeroSlider();
  initHeroFloorSelector();
  initLiveTelemetryTicker();
  initElevatorScrollShaft();
  initBlueprintHotspots();
  initCard3DTilt();
  initNavbar();
  initMobileMenu();
  initCounters();
  initElevatorToTop();
  initEnquiryForm();
  initQuoteModal();
  initThankYouModal();
  initProcessFlow();
  initProjectsGallery();
  initSectionEntranceAnimations();
});

/* ==========================================================================
   ELEVATOR CHIME AUDIO GENERATOR (Web Audio API)
   ========================================================================== */
let isSoundMuted = localStorage.getItem('sigma_sound_muted') === 'true';

function playElevatorChime() {
  if (isSoundMuted) return;
  try {
    const AudioContext = window.AudioContext || window.webkitAudioContext;
    if (!AudioContext) return;
    const ctx = new AudioContext();

    // High clear chime bell tone (E5 ~659.25 Hz followed by C5 ~523.25 Hz)
    const playTone = (freq, startTime, duration) => {
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();

      osc.type = 'sine';
      osc.frequency.setValueAtTime(freq, startTime);

      // Bell envelope
      gain.gain.setValueAtTime(0.001, startTime);
      gain.gain.exponentialRampToValueAtTime(0.22, startTime + 0.04);
      gain.gain.exponentialRampToValueAtTime(0.0001, startTime + duration);

      osc.connect(gain);
      gain.connect(ctx.destination);

      osc.start(startTime);
      osc.stop(startTime + duration);
    };

    const now = ctx.currentTime;
    playTone(784, now, 0.8);           // G5
    playTone(659.25, now + 0.2, 1.2);  // E5 luxury elevator harmonic
  } catch (e) {
    // Audio context not allowed or supported
  }
}

/* ==========================================================================
   SOUND TOGGLE CONTROL
   ========================================================================== */
function initSoundToggle() {
  const btn = document.getElementById('soundToggleBtn');
  const label = document.getElementById('soundToggleLabel');
  if (!btn) return;

  function updateBtn() {
    if (isSoundMuted) {
      btn.classList.add('sound-muted');
      if (label) label.textContent = 'SOUND: OFF';
    } else {
      btn.classList.remove('sound-muted');
      if (label) label.textContent = 'SOUND: ON';
    }
  }

  updateBtn();

  btn.addEventListener('click', (e) => {
    e.preventDefault();
    isSoundMuted = !isSoundMuted;
    localStorage.setItem('sigma_sound_muted', isSoundMuted ? 'true' : 'false');
    updateBtn();
    if (!isSoundMuted) {
      playElevatorChime();
    }
  });
}

/* ==========================================================================
   HERO SLIDER
   ========================================================================== */
function initHeroSlider() {
  const slides = document.querySelectorAll('.hero-slide');
  const dots = document.querySelectorAll('.slider-dot');
  const prevBtn = document.querySelector('.slider-prev');
  const nextBtn = document.querySelector('.slider-next');

  if (!slides.length) return;

  let currentSlide = 0;
  let slideTimer = null;
  const slideInterval = 6000; // 6 seconds per slide

  function goToSlide(index, playSound = false) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    currentSlide = (index + slides.length) % slides.length;

    slides[currentSlide].classList.add('active');
    if (dots[currentSlide]) {
      dots[currentSlide].classList.add('active');
    }

    // Sync Hero Floor Dispatch HUD
    const hudBtns = document.querySelectorAll('.hud-btn');
    hudBtns.forEach(btn => {
      const bIdx = parseInt(btn.getAttribute('data-slide'), 10);
      if (bIdx === currentSlide) {
        btn.classList.add('active');
        const floorCode = btn.querySelector('.hud-btn-code');
        const hudScreenFloor = document.getElementById('hudScreenFloor');
        if (hudScreenFloor && floorCode) {
          hudScreenFloor.textContent = floorCode.textContent.trim();
        }
      } else {
        btn.classList.remove('active');
      }
    });

    if (playSound) {
      playElevatorChime();
    }
  }

  window.goToHeroSlide = (idx, sound = true) => {
    goToSlide(idx, sound);
    startAutoplay();
  };

  function nextSlide() {
    goToSlide(currentSlide + 1);
  }

  function prevSlide() {
    goToSlide(currentSlide - 1);
  }

  function startAutoplay() {
    stopAutoplay();
    slideTimer = setInterval(nextSlide, slideInterval);
  }

  function stopAutoplay() {
    if (slideTimer) clearInterval(slideTimer);
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      nextSlide();
      startAutoplay();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      prevSlide();
      startAutoplay();
    });
  }

  dots.forEach((dot, idx) => {
    dot.addEventListener('click', () => {
      goToSlide(idx);
      startAutoplay();
    });
  });

  // Touch Swipe on mobile
  const sliderWrapper = document.querySelector('.hero-slider-wrapper');
  if (sliderWrapper) {
    let touchStartX = 0;
    let touchEndX = 0;

    sliderWrapper.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoplay();
    }, { passive: true });

    sliderWrapper.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      if (touchStartX - touchEndX > 50) {
        nextSlide();
      } else if (touchEndX - touchStartX > 50) {
        prevSlide();
      }
      startAutoplay();
    }, { passive: true });

    sliderWrapper.addEventListener('mouseenter', stopAutoplay);
    sliderWrapper.addEventListener('mouseleave', startAutoplay);
  }

  // Trigger smooth entrance animation for initial slide on page load
  slides.forEach(s => s.classList.remove('active'));
  setTimeout(() => {
    goToSlide(0);
    startAutoplay();
  }, 100);
}

/* ==========================================================================
   STICKY NAVBAR & ACTIVE NAV LINK
   ========================================================================== */
function initNavbar() {
  const header = document.querySelector('.site-header');
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-menu .nav-link, .mobile-menu-links a');

  window.addEventListener('scroll', () => {
    const scrollY = window.pageYOffset;

    // Header background elevation
    if (header) {
      if (scrollY > 60) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }

    // ScrollSpy active link
    sections.forEach(sec => {
      const top = sec.offsetTop - 120;
      const height = sec.offsetHeight;
      const id = sec.getAttribute('id');

      if (scrollY >= top && scrollY < top + height) {
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${id}`) {
            link.classList.add('active');
          }
        });
      }
    });
  }, { passive: true });
}

/* ==========================================================================
   MOBILE MENU DRAWER
   ========================================================================== */
function initMobileMenu() {
  const toggleBtn = document.getElementById('mobileToggleBtn');
  const drawer = document.getElementById('mobileDrawer');
  const backdrop = document.getElementById('mobileBackdrop');
  const links = document.querySelectorAll('.mobile-menu-links a');

  if (!toggleBtn || !drawer) return;

  function toggleMenu() {
    toggleBtn.classList.toggle('open');
    drawer.classList.toggle('open');
    if (backdrop) backdrop.classList.toggle('open');
    document.body.style.overflow = drawer.classList.contains('open') ? 'hidden' : '';
  }

  function closeMenu() {
    toggleBtn.classList.remove('open');
    drawer.classList.remove('open');
    if (backdrop) backdrop.classList.remove('open');
    document.body.style.overflow = '';
  }

  toggleBtn.addEventListener('click', toggleMenu);
  if (backdrop) backdrop.addEventListener('click', closeMenu);

  links.forEach(link => {
    link.addEventListener('click', closeMenu);
  });
}

/* ==========================================================================
   ANIMATED STATS COUNTER
   ========================================================================== */
function initCounters() {
  const counters = document.querySelectorAll('.counter-val');
  if (!counters.length) return;

  function runCounterAnimation() {
    counters.forEach(counter => {
      const target = parseFloat(counter.getAttribute('data-target'));
      const isDecimal = target % 1 !== 0;
      const duration = 2400; // ms - slower, clearly visible counting
      const startTime = performance.now();

      function updateNumber(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Ease-out expo
        const easeProgress = 1 - Math.pow(2, -10 * progress);
        const current = target * easeProgress;

        counter.textContent = isDecimal ? current.toFixed(1) : Math.floor(current);

        if (progress < 1) {
          requestAnimationFrame(updateNumber);
        } else {
          counter.textContent = isDecimal ? target.toFixed(1) : target;
        }
      }

      requestAnimationFrame(updateNumber);
    });
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        runCounterAnimation();
      } else {
        // Reset when out of view so it counts up again when user scrolls back
        counters.forEach(counter => {
          counter.textContent = '0';
        });
      }
    });
  }, { threshold: 0.25 });

  const metricsSection = document.querySelector('.trust-metrics-strip');
  if (metricsSection) {
    observer.observe(metricsSection);
  }
}

/* ==========================================================================
   ELEVATOR "BACK TO TOP" BUTTON
   ========================================================================== */
function initElevatorToTop() {
  const toTopBtns = document.querySelectorAll('.elevator-to-top-btn, #backToTopBtn');

  toTopBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      // Play a high tone
      try {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (AudioContext) {
          const ctx = new AudioContext();
          const osc = ctx.createOscillator();
          const gain = ctx.createGain();
          osc.type = 'sine';
          osc.frequency.setValueAtTime(880, ctx.currentTime);
          gain.gain.setValueAtTime(0.15, ctx.currentTime);
          gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.3);
          osc.connect(gain);
          gain.connect(ctx.destination);
          osc.start();
          osc.stop(ctx.currentTime + 0.3);
        }
      } catch (err) { }

      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  });
}

/* ==========================================================================
   ENQUIRY FORM SUBMISSION (AJAX WITH VALIDATION & THANK YOU POPUP)
   ========================================================================== */
function initEnquiryForm() {
  const form = document.getElementById('enquiryForm');
  const alertBox = document.getElementById('formAlert');
  const phoneField = document.getElementById('clientPhone');

  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Phone Validation: require at least 7 to 15 digits
    const phoneVal = phoneField ? phoneField.value.trim() : '';
    const digits = phoneVal.replace(/\D/g, '');

    if (digits.length < 7) {
      const wrap = phoneField.closest('.phone-input-wrap') || phoneField;
      wrap.classList.add('input-invalid');
      setTimeout(() => wrap.classList.remove('input-invalid'), 600);
      phoneField.focus();
      alert('Please enter a valid phone number with at least 7 to 9 digits (e.g. 50 123 4567).');
      return;
    }

    const submitBtn = form.querySelector('.form-submit-btn');
    const originalText = submitBtn ? submitBtn.innerHTML : 'Submit';
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span>Submitting Enquiry...</span>';
    }

    const formData = new FormData(form);
    // Prepend +971 if not already present
    if (!phoneVal.startsWith('+')) {
      formData.set('phone', '+971 ' + phoneVal);
    }

    const clientName = document.getElementById('clientName') ? document.getElementById('clientName').value.trim() : '';

    fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
      .then(res => res.text())
      .then(data => {
        if (alertBox) {
          alertBox.style.display = 'none';
        }
        form.reset();
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        }

        // Trigger luxury thank you popup modal
        if (typeof window.showThankYouModal === 'function') {
          window.showThankYouModal(clientName);
        } else {
          alert('Thank you! Your inquiry has been sent to Sigma Height Elevators LLC.');
        }
      })
      .catch(err => {
        form.reset();
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        }
        if (typeof window.showThankYouModal === 'function') {
          window.showThankYouModal(clientName);
        }
      });
  });
}

/* ==========================================================================
   7-STEP PROCESS FLOW INTERACTION
   ========================================================================== */
function initProcessFlow() {
  const steps = document.querySelectorAll('.process-step-node');
  if (!steps.length) return;

  steps.forEach((step) => {
    step.addEventListener('mouseenter', () => {
      steps.forEach(s => s.classList.remove('active'));
      step.classList.add('active');
    });

    step.addEventListener('click', () => {
      steps.forEach(s => s.classList.remove('active'));
      step.classList.add('active');
      playElevatorChime();
    });
  });
}

/* ==========================================================================
   ENTRANCE SCROLL REVEAL ANIMATIONS (MINIMAL & SMOOTH ACROSS ALL PAGES)
   ========================================================================== */
function initSectionEntranceAnimations() {
  const animatedTargets = document.querySelectorAll(
    '.section-header-center, .section-header-wrap, .about-grid, .services-grid, .services-action-bottom, .customizer-grid, .why-grid, .why-choose-grid, .glass-lifts-grid, .blueprint-layout, .process-flow-container, .projects-expand-gallery, .projects-action-center, .reviews-slider-container, .contact-grid, .trust-metrics-strip, .site-footer, .section-wrapper, .reveal-on-scroll, .reveal-fade-left, .reveal-fade-right, .reveal-scale-up, .reveal-from-down, .reveal-fade-up, .reveal-subtle, .about-story-grid, .about-stat-strip, .mv-card, .dedicated-service-card, .filter-bar, .project-card, .contact-info-card, .contact-form-box, .contact-map-box'
  );

  if (!animatedTargets.length) return;

  // If IntersectionObserver is not supported, reveal everything immediately
  if (!('IntersectionObserver' in window)) {
    animatedTargets.forEach(el => {
      el.classList.add('revealed', 'is-revealed');
    });
    return;
  }

  // Require element to be safely inside the viewport before triggering
  const isMobile = window.innerHeight < 700;
  const observerOptions = {
    threshold: 0.06,
    rootMargin: isMobile ? '0px 0px -15px 0px' : '0px 0px -40px 0px'
  };

  const entranceObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-revealed', 'revealed');
      } else {
        // Remove classes when scrolled away so the entrance animation plays again upon return!
        entry.target.classList.remove('is-revealed', 'revealed');
      }
    });
  }, observerOptions);

  animatedTargets.forEach(target => {
    entranceObserver.observe(target);
  });

  // Ensure anchor clicks, floor selectors, or elevator shaft clicks trigger fresh entrance animation
  document.querySelectorAll('a[href^="#"], .shaft-floor-stop, .hud-btn').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const targetId = trigger.getAttribute('href') || trigger.getAttribute('data-target');
      if (targetId && targetId !== '#') {
        const dest = document.querySelector(targetId);
        if (dest) {
          const subTargets = dest.querySelectorAll(
            '.section-header-center, .section-header-wrap, .about-grid, .services-grid, .customizer-grid, .why-grid, .why-choose-grid, .glass-lifts-grid, .blueprint-layout, .process-flow-container, .projects-expand-gallery, .projects-action-center, .reviews-slider-container, .contact-grid, .about-story-grid, .about-stat-strip, .mv-card, .dedicated-service-card, .filter-bar, .project-card, .contact-info-card, .contact-form-box, .contact-map-box'
          );
          subTargets.forEach(el => el.classList.remove('is-revealed', 'revealed'));
          dest.classList.remove('revealed', 'is-revealed');
          setTimeout(() => {
            dest.classList.add('revealed', 'is-revealed');
            subTargets.forEach(el => el.classList.add('is-revealed', 'revealed'));
          }, 320);
        }
      }
    });
  });
}

/* ==========================================================================
   PROJECTS SHOWCASE: 5-COLUMN PURE IMAGE SHOWCASE & LIGHTBOX MODAL
   ========================================================================== */
function initProjectsGallery() {
  const cards = document.querySelectorAll('.project-expand-card');
  const modal = document.getElementById('projectLightboxModal');
  const modalImg = document.getElementById('modalFullImage');
  const closeBtn = document.getElementById('modalCloseBtn');
  const backdrop = document.getElementById('modalBackdrop');
  const prevBtn = document.getElementById('modalPrevBtn');
  const nextBtn = document.getElementById('modalNextBtn');
  const moreBtn = document.getElementById('projectsMoreBtn');

  if (!cards.length) return;

  let currentModalIndex = 0;

  cards.forEach((card, index) => {
    // Hover: expand the column to show full image
    card.addEventListener('mouseenter', () => {
      if (!card.classList.contains('active')) {
        cards.forEach(c => c.classList.remove('active'));
        card.classList.add('active');
      }
    });

    // Click: open full high-resolution modal image view
    card.addEventListener('click', () => {
      openModal(index);
    });
  });

  function openModal(index) {
    currentModalIndex = (index + cards.length) % cards.length;
    const activeCard = cards[currentModalIndex];
    if (!activeCard) return;

    // Synchronize active card in 5 columns as well
    cards.forEach(c => c.classList.remove('active'));
    activeCard.classList.add('active');

    const imgSrc = activeCard.getAttribute('data-img');

    if (modalImg) {
      modalImg.src = imgSrc;
      modalImg.alt = `Iconic Installation ${currentModalIndex + 1}`;
    }

    if (modal) {
      modal.classList.add('active');
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  function showPrev() {
    openModal(currentModalIndex - 1);
  }

  function showNext() {
    openModal(currentModalIndex + 1);
  }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  if (backdrop) backdrop.addEventListener('click', closeModal);
  if (prevBtn) prevBtn.addEventListener('click', (e) => { e.stopPropagation(); showPrev(); });
  if (nextBtn) nextBtn.addEventListener('click', (e) => { e.stopPropagation(); showNext(); });

  // Keyboard controls
  window.addEventListener('keydown', (e) => {
    if (!modal || !modal.classList.contains('active')) return;
    if (e.key === 'Escape') closeModal();
    if (e.key === 'ArrowLeft') showPrev();
    if (e.key === 'ArrowRight') showNext();
  });
}

/* ==========================================================================
   HERO ASCENDING PARTICLES SIMULATION (HTML5 CANVAS)
   ========================================================================== */
function initHeroParticles() {
  const canvas = document.getElementById('heroParticles');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let width = (canvas.width = canvas.offsetWidth);
  let height = (canvas.height = canvas.offsetHeight);

  const particles = [];
  const particleCount = 45;

  class Particle {
    constructor() {
      this.reset(true);
    }
    reset(initial = false) {
      this.x = Math.random() * width;
      this.y = initial ? Math.random() * height : height + 10;
      this.size = Math.random() * 2.2 + 0.8;
      this.speedY = -(Math.random() * 0.7 + 0.25);
      this.speedX = (Math.random() - 0.5) * 0.35;
      this.opacity = Math.random() * 0.55 + 0.25;
      const colors = ['245, 158, 11', '255, 42, 42', '255, 255, 255', '56, 189, 248'];
      this.color = colors[Math.floor(Math.random() * colors.length)];
    }
    update() {
      this.y += this.speedY;
      this.x += this.speedX;
      if (this.y < -10 || this.x < -10 || this.x > width + 10) {
        this.reset();
      }
    }
    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(${this.color}, ${this.opacity})`;
      ctx.shadowBlur = 8;
      ctx.shadowColor = `rgba(${this.color}, 0.8)`;
      ctx.fill();
    }
  }

  for (let i = 0; i < particleCount; i++) {
    particles.push(new Particle());
  }

  function resize() {
    if (!canvas) return;
    width = canvas.width = canvas.offsetWidth;
    height = canvas.height = canvas.offsetHeight;
  }

  window.addEventListener('resize', resize, { passive: true });

  function animate() {
    ctx.clearRect(0, 0, width, height);
    particles.forEach(p => {
      p.update();
      p.draw();
    });
    requestAnimationFrame(animate);
  }

  animate();
}

/* ==========================================================================
   HERO FLOOR DISPATCH HUD
   ========================================================================== */
function initHeroFloorSelector() {
  const hudBtns = document.querySelectorAll('.hud-btn');
  hudBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const slideIdx = parseInt(btn.getAttribute('data-slide'), 10);
      if (typeof window.goToHeroSlide === 'function') {
        window.goToHeroSlide(slideIdx, true);
      }
    });
  });
}

/* ==========================================================================
   LIVE SIMULATED TELEMETRY TICKER
   ========================================================================== */
function initLiveTelemetryTicker() {
  const decibelEl = document.getElementById('telemetryDecibels');
  const driveEl = document.getElementById('telemetryDrive');
  if (!decibelEl && !driveEl) return;

  setInterval(() => {
    if (decibelEl) {
      const val = (40.2 + Math.random() * 1.4).toFixed(1);
      decibelEl.textContent = `${val} dB (WHISPER QUIET)`;
    }
    if (driveEl) {
      const val = (98.4 + Math.random() * 0.8).toFixed(1);
      driveEl.textContent = `${val}% VVVF REGENERATIVE`;
    }
  }, 4500);
}

/* ==========================================================================
   SCROLL-LINKED VERTICAL ELEVATOR SHAFT TRACKER
   ========================================================================== */
function initElevatorScrollShaft() {
  const shaftCar = document.getElementById('shaftCarIndicator');
  const shaftContainer = document.getElementById('shaftTrackContainer');
  const floorStops = document.querySelectorAll('.shaft-floor-stop');
  if (!shaftCar || !shaftContainer) return;

  function updateShaft() {
    const scrollY = window.pageYOffset || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = Math.min(Math.max(scrollY / (docHeight || 1), 0), 1);

    const trackHeight = shaftContainer.offsetHeight - 24;
    const carHeight = shaftCar.offsetHeight;
    const maxTop = trackHeight - carHeight;

    shaftCar.style.top = `${progress * maxTop + 12}px`;

    const targetIdx = Math.round(progress * (floorStops.length - 1));
    floorStops.forEach((stop, idx) => {
      if (idx === targetIdx) {
        stop.classList.add('active');
      } else {
        stop.classList.remove('active');
      }
    });
  }

  window.addEventListener('scroll', updateShaft, { passive: true });
  window.addEventListener('resize', updateShaft, { passive: true });
  window.addEventListener('orientationchange', updateShaft, { passive: true });
  updateShaft();

  floorStops.forEach((stop) => {
    stop.addEventListener('click', (e) => {
      e.preventDefault();
      const targetSelector = stop.getAttribute('data-target');
      const targetEl = document.querySelector(targetSelector);
      if (targetEl) {
        playElevatorChime();
        const headerOffset = 70;
        const elementPosition = targetEl.getBoundingClientRect().top;
        const offsetPosition = elementPosition + (window.pageYOffset || document.documentElement.scrollTop) - headerOffset;
        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
}

/* ==========================================================================
   INTERACTIVE 3D ELEVATOR CABIN CUSTOMIZER STUDIO
   ========================================================================== */
function initCabinCustomizer() {
  const wallPills = document.querySelectorAll('[data-opt-group="wall"]');
  const ceilingPills = document.querySelectorAll('[data-opt-group="ceiling"]');
  const floorPills = document.querySelectorAll('[data-opt-group="floor"]');
  const handrailPills = document.querySelectorAll('[data-opt-group="handrail"]');

  const backWall = document.getElementById('cabinBackWall');
  const ceilingPlane = document.getElementById('cabinCeilingPlane');
  const floorPlane = document.getElementById('cabinFloorPlane');
  const handrailBar = document.getElementById('cabinHandrail');

  const wallValLabel = document.getElementById('selectedWallVal');
  const ceilingValLabel = document.getElementById('selectedCeilingVal');
  const floorValLabel = document.getElementById('selectedFloorVal');
  const handrailValLabel = document.getElementById('selectedHandrailVal');
  const specSummaryEl = document.getElementById('cabinSpecSummary');
  const quoteBtn = document.getElementById('cabinCustomizerQuoteBtn');

  let currentConfig = {
    wall: 'Brushed Titanium Gold',
    ceiling: 'Starlight Galaxy (Fiber Optic)',
    floor: 'Bookmatched Calacatta Gold',
    handrail: 'Mirror Chrome'
  };

  function updateSummary() {
    if (specSummaryEl) {
      specSummaryEl.innerHTML = `Active Configuration: <strong>${currentConfig.wall}</strong> walls, <strong>${currentConfig.ceiling}</strong> ceiling illumination, <strong>${currentConfig.floor}</strong> floor, and <strong>${currentConfig.handrail}</strong> handrail.`;
    }
  }

  // Wall Finish
  wallPills.forEach(pill => {
    pill.addEventListener('click', () => {
      wallPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      const finish = pill.getAttribute('data-finish');
      const label = pill.getAttribute('data-label');
      currentConfig.wall = label;
      if (wallValLabel) wallValLabel.textContent = label;

      if (backWall) {
        backWall.className = `cabin-back-wall wall-finish-${finish}`;
      }
      playElevatorChime();
      updateSummary();
    });
  });

  // Ceiling Lighting
  ceilingPills.forEach(pill => {
    pill.addEventListener('click', () => {
      ceilingPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      const mode = pill.getAttribute('data-mode');
      const label = pill.getAttribute('data-label');
      currentConfig.ceiling = label;
      if (ceilingValLabel) ceilingValLabel.textContent = label;

      if (ceilingPlane) {
        ceilingPlane.className = `cabin-ceiling-plane ceiling-mode-${mode}`;
      }
      playElevatorChime();
      updateSummary();
    });
  });

  // Floor Finish
  floorPills.forEach(pill => {
    pill.addEventListener('click', () => {
      floorPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      const floor = pill.getAttribute('data-floor');
      const label = pill.getAttribute('data-label');
      currentConfig.floor = label;
      if (floorValLabel) floorValLabel.textContent = label;

      if (floorPlane) {
        floorPlane.className = `cabin-floor-plane floor-finish-${floor}`;
      }
      playElevatorChime();
      updateSummary();
    });
  });

  // Handrail
  handrailPills.forEach(pill => {
    pill.addEventListener('click', () => {
      handrailPills.forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      const rail = pill.getAttribute('data-rail');
      const label = pill.getAttribute('data-label');
      currentConfig.handrail = label;
      if (handrailValLabel) handrailValLabel.textContent = label;

      if (handrailBar) {
        handrailBar.className = `cabin-handrail handrail-${rail}`;
      }
      playElevatorChime();
      updateSummary();
    });
  });

  // Quote Button Action: opens bespoke quote modal with configured specs pre-filled
  if (quoteBtn) {
    quoteBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const customMessage = `Hello Sigma Height Elevators, I customized a bespoke cabin on your 3D Studio:
- Wall Finish: ${currentConfig.wall}
- Ceiling Lighting: ${currentConfig.ceiling}
- Flooring: ${currentConfig.floor}
- Handrail: ${currentConfig.handrail}

Please provide 3D CAD drawings and a tailored quotation for my property.`;

      if (typeof window.openQuoteModal === 'function') {
        window.openQuoteModal('Home Elevators', customMessage);
      } else {
        const messageField = document.getElementById('clientMessage');
        const serviceField = document.getElementById('serviceType');
        if (serviceField) serviceField.value = 'Home Elevators';
        if (messageField) messageField.value = customMessage;
        const contactSec = document.getElementById('contact');
        if (contactSec) contactSec.scrollIntoView({ behavior: 'smooth' });
      }
    });
  }
}

/* ==========================================================================
   ENGINEERING BLUEPRINT CUTAWAY & INTERACTIVE HOTSPOTS
   ========================================================================== */
function initBlueprintHotspots() {
  const hotspots = document.querySelectorAll('.blueprint-hotspot');
  if (!hotspots.length) return;
  const navPills = document.querySelectorAll('.spec-nav-pill');
  const titleEl = document.getElementById('blueprintSpecTitle');
  const descEl = document.getElementById('blueprintSpecDesc');
  const tagEl = document.getElementById('blueprintSpecTag');
  const m1Label = document.getElementById('specM1Label');
  const m1Val = document.getElementById('specM1Val');
  const m2Label = document.getElementById('specM2Label');
  const m2Val = document.getElementById('specM2Val');

  const specs = {
    '1': {
      tag: 'ADVANCED PMSM DRIVE',
      title: 'Permanent Magnet Synchronous Machine (PMSM)',
      desc: 'Gearless permanent magnet traction motor mounted overhead, delivering 40% energy savings, ultra-smooth acceleration, and whisper-quiet operation under 42 dB with zero oil lubrication needed.',
      m1L: 'Energy Efficiency',
      m1V: 'A+++ Rating (40% Savings)',
      m2L: 'Operating Noise',
      m2V: '< 42 Decibels'
    },
    '2': {
      tag: 'SMART DISPATCH',
      title: 'Biometric Destination Control & Micro-Leveling',
      desc: 'Smart digital controller analyzing traffic flow, optical leveling sensors ensuring exact floor flush alignment (+/- 2mm), and touchless biometric / RFID cabin call access.',
      m1L: 'Leveling Precision',
      m1V: '± 2mm Optical Alignment',
      m2L: 'Dispatch Optimization',
      m2V: '35% Reduced Wait Times'
    },
    '3': {
      tag: 'EUROPEAN SAFETY EN81-20:50',
      title: 'Progressive Safety Gear & Speed Governor',
      desc: 'Centrifugal overspeed governor instantly detects cable velocity anomaly and mechanically wedges the hardened safety brake jaws into the solid steel T-guide rails within milliseconds.',
      m1L: 'Trigger Speed',
      m1V: '115% Rated Velocity Lock',
      m2L: 'Standard Compliance',
      m2V: 'EN81-20:50 European Compliance Standard'
    },
    '4': {
      tag: 'FAILSAFE PROTECTION',
      title: 'Automatic Rescue Device (ARD) Battery Backup',
      desc: 'Microprocessor-controlled emergency power pack that automatically drives the elevator to the nearest landing and opens cabin doors smoothly in the event of a municipal Dubai power outage.',
      m1L: 'Response Time',
      m1V: '< 3 Seconds After Outage',
      m2L: 'Battery Reserve',
      m2V: 'Lithium LiFePO4 Reserve'
    },
    '5': {
      tag: 'ACOUSTIC PANORAMIC',
      title: 'Acoustic Triple-Glazed Glass Panoramic Car',
      desc: '12mm laminated security safety glass with structural acoustic PVB interlayers offering 360-degree panoramic vistas while blocking outside heat and ambient building noise.',
      m1L: 'Glass Strength',
      m1V: '12mm Laminated EN 12600',
      m2L: 'Thermal Isolation',
      m2V: 'Low-E UV Reflective Coating'
    }
  };

  function selectHotspot(id) {
    hotspots.forEach(h => h.classList.toggle('active', h.getAttribute('data-hotspot') === id));
    navPills.forEach(p => p.classList.toggle('active', p.getAttribute('data-hotspot') === id));

    const data = specs[id];
    if (!data) return;

    if (tagEl) tagEl.textContent = data.tag;
    if (titleEl) titleEl.textContent = data.title;
    if (descEl) descEl.textContent = data.desc;
    if (m1Label) m1Label.textContent = data.m1L;
    if (m1Val) m1Val.textContent = data.m1V;
    if (m2Label) m2Label.textContent = data.m2L;
    if (m2Val) m2Val.textContent = data.m2V;

    playElevatorChime();
  }

  hotspots.forEach(h => {
    h.addEventListener('click', () => {
      selectHotspot(h.getAttribute('data-hotspot'));
    });
  });

  navPills.forEach(p => {
    p.addEventListener('click', () => {
      selectHotspot(p.getAttribute('data-hotspot'));
    });
  });
}

/* ==========================================================================
   3D PERSPECTIVE MOUSE TILT ON CARDS
   ========================================================================== */
function initCard3DTilt() {
  const cards = document.querySelectorAll('.has-3d-tilt, .service-card, .why-card');
  if (!cards.length) return;

  cards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateX = ((y - centerY) / centerY) * -5;
      const rotateY = ((x - centerX) / centerX) * 5;

      card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-6px)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });
}

/* ==========================================================================
   GLOBAL PROFESSIONAL QUOTE & CONSULTATION POPUP MODAL
   ========================================================================== */
function initQuoteModal() {
  const backdrop = document.getElementById('quoteModalBackdrop');
  const dialog = document.getElementById('quoteModalDialog');
  const closeBtn = document.getElementById('quoteModalCloseBtn');
  const form = document.getElementById('quoteModalForm');
  const alertBox = document.getElementById('quoteModalAlert');
  const serviceSelect = document.getElementById('modalServiceType');
  const messageInput = document.getElementById('modalClientMessage');
  const nameInput = document.getElementById('modalClientName');
  const submitBtn = document.getElementById('modalSubmitBtn');

  if (!backdrop) return;

  // Global helper to open quote modal
  window.openQuoteModal = function (serviceName = '', customMessage = '') {
    // Reset state & alerts
    if (alertBox) {
      alertBox.style.display = 'none';
      alertBox.className = 'quote-modal-alert';
      alertBox.innerHTML = '';
    }

    // Auto-select service in dropdown if provided
    if (serviceSelect && serviceName) {
      let matched = false;
      const cleanTarget = serviceName.toLowerCase().replace(/[^a-z0-9]/g, '');
      
      for (let i = 0; i < serviceSelect.options.length; i++) {
        const optText = serviceSelect.options[i].text.toLowerCase().replace(/[^a-z0-9]/g, '');
        const optVal = serviceSelect.options[i].value.toLowerCase().replace(/[^a-z0-9]/g, '');
        if (optText.includes(cleanTarget) || cleanTarget.includes(optVal) || optVal.includes(cleanTarget)) {
          serviceSelect.selectedIndex = i;
          matched = true;
          break;
        }
      }

      // If no exact match in default list, create/select dynamic option
      if (!matched) {
        const newOpt = new Option(serviceName, serviceName, true, true);
        serviceSelect.add(newOpt);
      }
    }

    // Auto-fill message if provided
    if (messageInput && customMessage) {
      messageInput.value = customMessage;
    }

    // Display modal
    backdrop.classList.add('active');
    backdrop.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Play elevator chime
    if (typeof playElevatorChime === 'function') {
      playElevatorChime();
    }

    // Focus first input after animation
    setTimeout(() => {
      if (nameInput) nameInput.focus();
    }, 250);
  };

  // Global helper to close quote modal
  window.closeQuoteModal = function () {
    backdrop.classList.remove('active');
    backdrop.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  // Close button click
  if (closeBtn) {
    closeBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.closeQuoteModal();
    });
  }

  // Backdrop click outside dialog to dismiss
  backdrop.addEventListener('click', (e) => {
    if (e.target === backdrop) {
      window.closeQuoteModal();
    }
  });

  // ESC key listener
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && backdrop.classList.contains('active')) {
      window.closeQuoteModal();
    }
  });

  // Global Click Delegator: Catch all "Get A Quote", "Consultation", or Service Card quote triggers
  document.addEventListener('click', (e) => {
    // 1. Direct explicit quote trigger buttons or data attributes
    const quoteTrigger = e.target.closest(
      '.header-cta-btn, .service-footer-cta, .btn-quote, [data-open-quote-modal], .open-quote-modal-btn, .consultation-cta-btn'
    );

    if (quoteTrigger) {
      e.preventDefault();

      // Extract service name from closest service card if present
      let serviceName = quoteTrigger.getAttribute('data-service') || '';
      if (!serviceName) {
        const parentCard = quoteTrigger.closest('.service-card, .service-item, .project-card');
        if (parentCard) {
          const nameEl = parentCard.querySelector('.service-name, .service-title, h3, h2');
          if (nameEl) serviceName = nameEl.textContent.trim();
        }
      }

      window.openQuoteModal(serviceName);
      return;
    }

    // 2. Generic buttons/links pointing to #contact or containing "quote" in text (excluding footer links or standard form anchors)
    const anchorBtn = e.target.closest('a[href*="#contact"], a.btn-primary');
    if (anchorBtn && !anchorBtn.closest('.footer-links, .nav-menu, .site-footer')) {
      const btnText = (anchorBtn.textContent || '').trim().toLowerCase();
      if (
        btnText.includes('quote') ||
        btnText.includes('consultation') ||
        btnText.includes('survey') ||
        btnText.includes('inquire') ||
        btnText.includes('enquire')
      ) {
        e.preventDefault();
        window.openQuoteModal();
      }
    }
  });

  // Form submission via AJAX with professional validation & feedback
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const modalPhone = document.getElementById('modalClientPhone');
      const phoneVal = modalPhone ? modalPhone.value.trim() : '';
      const digits = phoneVal.replace(/\D/g, '');

      if (digits.length < 7) {
        const wrap = modalPhone ? modalPhone.closest('.modal-input-wrap') : null;
        if (wrap) {
          wrap.classList.add('input-invalid');
          setTimeout(() => wrap.classList.remove('input-invalid'), 600);
        }
        if (modalPhone) modalPhone.focus();
        alert('Please enter a valid phone number with at least 7 to 9 digits (e.g. 50 123 4567).');
        return;
      }

      const clientName = document.getElementById('modalClientName') ? document.getElementById('modalClientName').value.trim() : '';
      const originalBtnHtml = submitBtn ? submitBtn.innerHTML : 'Submit Request';
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
          <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
          <span>Transmitting Specifications...</span>
        `;
      }

      const formData = new FormData(form);
      if (!phoneVal.startsWith('+')) {
        formData.set('phone', '+971 ' + phoneVal);
      }

      fetch(form.action, {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.text();
        })
        .then(result => {
          form.reset();
          window.closeQuoteModal();
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnHtml;
          }
          if (typeof window.showThankYouModal === 'function') {
            window.showThankYouModal(clientName);
          }
        })
        .catch(error => {
          form.reset();
          window.closeQuoteModal();
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnHtml;
          }
          if (typeof window.showThankYouModal === 'function') {
            window.showThankYouModal(clientName);
          }
        });
    });
  }
}

/* ==========================================================================
   GLOBAL LUXURY THANK YOU SUCCESS POPUP MODAL
   ========================================================================== */
function initThankYouModal() {
  const backdrop = document.getElementById('thankYouModalBackdrop');
  const closeBtn = document.getElementById('thankYouModalCloseBtn');
  const doneBtn = document.getElementById('thankYouDoneBtn');
  const titleEl = document.getElementById('thankYouModalTitle');
  const descEl = document.getElementById('thankYouModalDesc');

  if (!backdrop) return;

  window.showThankYouModal = function (clientName = '', customMessage = '') {
    if (titleEl) {
      titleEl.textContent = clientName ? `Thank You, ${clientName}!` : 'Thank You!';
    }
    if (descEl && customMessage) {
      descEl.innerHTML = customMessage;
    }

    // Play elevator chime
    if (typeof playElevatorChime === 'function') {
      try {
        playElevatorChime();
      } catch (err) {}
    }

    backdrop.classList.add('active');
    backdrop.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    setTimeout(() => {
      if (doneBtn) doneBtn.focus();
    }, 200);
  };

  window.closeThankYouModal = function () {
    backdrop.classList.remove('active');
    backdrop.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  if (closeBtn) closeBtn.addEventListener('click', window.closeThankYouModal);
  if (doneBtn) doneBtn.addEventListener('click', window.closeThankYouModal);

  backdrop.addEventListener('click', (e) => {
    if (e.target === backdrop) {
      window.closeThankYouModal();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && backdrop.classList.contains('active')) {
      window.closeThankYouModal();
    }
  });
}

/* ==========================================================================
   CINEMATIC ELEVATOR DOOR PRELOADER & LOGO ARRIVAL ANIMATION
   ========================================================================== */
function initElevatorPreloader() {
  const preloader = document.getElementById('elevatorPreloader');
  if (!preloader) return;

  const floorCode = document.getElementById('preloaderFloorCode');
  const progressBar = document.getElementById('preloaderProgressBar');
  const statusCaption = document.getElementById('preloaderStatusCaption');
  const hudArrow = document.getElementById('preloaderHudArrow');
  const pageBadge = document.getElementById('preloaderPageBadge');

  const targetPage = preloader.getAttribute('data-page') || 'HOME';
  const targetFloor = preloader.getAttribute('data-floor') || 'L';
  const targetArrival = preloader.getAttribute('data-arrival') || 'ARRIVED • MAIN LOBBY';

  let isDismissed = false;

  function dismissPreloader() {
    if (isDismissed) return;
    isDismissed = true;
    preloader.classList.add('doors-open');
    if (progressBar) progressBar.style.width = '100%';
    setTimeout(() => {
      preloader.classList.add('fade-out');
      setTimeout(() => {
        preloader.style.display = 'none';
        document.body.classList.add('preloader-done');
      }, 750);
    }, 400);
  }

  // Quick skip on click or keypress
  preloader.addEventListener('click', dismissPreloader);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' || e.code === 'Space') {
      dismissPreloader();
    }
  });

  // Dynamic ascent floors list tailored to target destination
  let floorsList = ['B1', 'G', '01'];
  if (targetFloor === '01') {
    floorsList = ['B2', 'B1', 'G', '01'];
  } else if (targetFloor === '02') {
    floorsList = ['B1', 'G', '01', '02'];
  } else if (targetFloor === '03') {
    floorsList = ['G', '01', '02', '03'];
  } else if (targetFloor === '04') {
    floorsList = ['G', '01', '02', '03', '04'];
  } else {
    floorsList = ['B1', 'G', 'L'];
  }

  // Step 1: Initial rapid ascent simulation (0ms to 480ms)
  let currentStep = 0;
  const stepInterval = Math.max(Math.floor(420 / floorsList.length), 70);

  const floorInterval = setInterval(() => {
    if (isDismissed) {
      clearInterval(floorInterval);
      return;
    }
    if (currentStep < floorsList.length - 1) {
      if (floorCode) floorCode.textContent = floorsList[currentStep];
      if (progressBar) {
        const pct = Math.min(((currentStep + 1) / floorsList.length) * 85, 85);
        progressBar.style.width = `${pct}%`;
      }
      currentStep++;
    } else {
      clearInterval(floorInterval);
    }
  }, stepInterval);

  // Step 2: Elevator Arrival & Doors Open (at 520ms)
  setTimeout(() => {
    if (isDismissed) return;
    if (floorCode) {
      floorCode.textContent = targetFloor;
      floorCode.style.color = '#22c55e';
      floorCode.style.textShadow = '0 0 16px rgba(34, 197, 94, 0.9)';
    }
    if (statusCaption) statusCaption.textContent = targetArrival;
    if (pageBadge) pageBadge.textContent = targetPage;
    if (hudArrow) {
      hudArrow.textContent = '●';
      hudArrow.style.color = '#22c55e';
      hudArrow.style.textShadow = '0 0 12px #22c55e';
    }

    // Play elevator arrival chime
    if (typeof playElevatorChime === 'function') {
      try {
        playElevatorChime();
      } catch (err) {}
    }

    // Slide open doors with authentic mechanical easing
    preloader.classList.add('doors-open');
    if (progressBar) progressBar.style.width = '100%';
  }, 520);

  // Step 3: Logo Spotlight & Site Fadeout (at 2100ms)
  setTimeout(() => {
    if (isDismissed) return;
    preloader.classList.add('fade-out');
    setTimeout(() => {
      preloader.style.display = 'none';
      document.body.classList.add('preloader-done');
    }, 750);
  }, 2100);

  // Safety fallback: maximum 3.8s timeout
  setTimeout(() => {
    dismissPreloader();
  }, 3800);
}




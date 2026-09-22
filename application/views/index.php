<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$this->load->view('includes/header');
?>

  <!-- ==========================================================================
       SCROLL-LINKED VERTICAL ELEVATOR SHAFT TRACKER (PINNED RIGHT VIEWPORT)
       ========================================================================== -->
  <div class="scroll-elevator-shaft" id="scrollElevatorShaft" aria-label="Vertical Section Shaft Tracker">
    <div class="shaft-container" id="shaftTrackContainer">
      <div class="shaft-rail-line"></div>
      <div class="shaft-car-indicator" id="shaftCarIndicator">
        <div class="shaft-car-glow"></div>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="18 15 12 9 6 15" />
        </svg>
      </div>
      <div class="shaft-floor-stop active" data-target="#hero" title="Hero Penthouse">H<span class="shaft-tooltip">Hero Penthouse</span></div>
      <div class="shaft-floor-stop" data-target="#about" title="About Sigma Height">01<span class="shaft-tooltip">About Sigma Height</span></div>
      <div class="shaft-floor-stop" data-target="#services" title="Elevator Services">02<span class="shaft-tooltip">Elevator Services</span></div>
      <div class="shaft-floor-stop" data-target="#why-us" title="Why Choose Us">03<span class="shaft-tooltip">Why Choose Us</span></div>
      <div class="shaft-floor-stop" data-target="#blueprint" title="Shaft Schematic">04<span class="shaft-tooltip">Shaft Schematic</span></div>
      <div class="shaft-floor-stop" data-target="#process" title="7-Step Flow">05<span class="shaft-tooltip">7-Step Flow</span></div>
      <div class="shaft-floor-stop" data-target="#projects" title="Signature Projects">06<span class="shaft-tooltip">Signature Projects</span></div>
      <div class="shaft-floor-stop" data-target="#reviews" title="Client Reviews">07<span class="shaft-tooltip">Client Reviews</span></div>
      <div class="shaft-floor-stop" data-target="#contact" title="Contact Engineers">08<span class="shaft-tooltip">Contact Engineers</span></div>
    </div>
  </div>

  <!-- ==========================================================================
       4. HERO SLIDER SECTION (WITH PARTICLES & FLOOR DISPATCH HUD)
       ========================================================================== -->
  <section class="hero-slider-section" id="hero">
    <!-- Kinetic Rising Particles Canvas -->
    <canvas id="heroParticles"></canvas>

    <div class="hero-slider-wrapper">
      <?php 
        $active_slides = !empty($sliders) ? $sliders : [
          [
            'title' => 'Luxury Home Elevators for',
            'highlight_text' => 'Modern Living',
            'subtitle' => 'Experience smooth, quiet and stylish home elevators designed to complement villas and premium residences across Dubai.',
            'badge_text' => 'Home Elevators',
            'button_text' => 'Explore Home Elevators',
            'button_link' => 'services',
            'image' => 'assets/images/hero_panoramic.jpg'
          ],
          [
            'title' => 'Panoramic Glass Lifts with',
            'highlight_text' => '360° Dubai Views',
            'subtitle' => 'Precision German-engineered structural glass lifts designed for architectural villas, luxury hotels, and commercial atriums.',
            'badge_text' => 'Panoramic Glass',
            'button_text' => 'Explore Panoramic Lifts',
            'button_link' => 'services',
            'image' => 'assets/images/service_panoramic.jpg'
          ],
          [
            'title' => 'High-Speed Commercial',
            'highlight_text' => 'Vertical Mobility',
            'subtitle' => 'Intelligent permanent-magnet gearless traction systems engineered for high-density traffic in business towers and retail hubs.',
            'badge_text' => 'Commercial Lifts',
            'button_text' => 'Commercial Engineering',
            'button_link' => 'services',
            'image' => 'assets/images/hero_commercial.jpg'
          ]
        ];
        foreach ($active_slides as $idx => $slide): 
      ?>
        <div class="hero-slide <?= $idx === 0 ? 'active' : '' ?>">
          <img src="<?= base_url($slide['image']) ?>" alt="<?= htmlspecialchars($slide['title']) ?>" class="hero-slide-bg">
          <div class="hero-overlay"></div>
          <div class="hero-grid-pattern"></div>
          <div class="container hero-container">
            <div class="hero-content">
              <?php if (!empty($slide['badge_text'])): ?>
                <div class="hero-badge">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                  </svg>
                  <?= htmlspecialchars($slide['badge_text']) ?>
                </div>
              <?php endif; ?>
              <h1 class="hero-title">
                <?= htmlspecialchars($slide['title']) ?> 
                <?php if (!empty($slide['highlight_text'])): ?>
                  <span class="highlight"><?= htmlspecialchars($slide['highlight_text']) ?></span>
                <?php endif; ?>
              </h1>
              <p class="hero-subtitle"><?= htmlspecialchars($slide['subtitle']) ?></p>
              <div class="hero-buttons">
                <?php 
                  $btn_link = $slide['button_link'];
                  $href = (strpos($btn_link, 'http') === 0 || strpos($btn_link, '#') === 0) ? $btn_link : site_url($btn_link);
                ?>
                <a href="<?= $href ?>" class="btn-primary">
                  <span><?= htmlspecialchars(!empty($slide['button_text']) ? $slide['button_text'] : 'Explore Services') ?></span>
                  <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                  </svg>
                </a>
                <a href="#contact" class="btn-secondary hero-btn-quote">
                  <i class="fa-solid fa-file-invoice-dollar" style="color: #ff3333;"></i>
                  <span>Get Instant Quote</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Futuristic Interactive Floor Dispatch HUD -->
    <div class="hero-floor-hud" id="heroFloorHud">
      <div class="hud-header">
        <div class="hud-tag">
          <span class="hud-pulse-dot"></span>
          <span>DISPATCH HUD</span>
        </div>
        <div class="hud-digital-screen">
          <span class="hud-screen-arrow">▲</span>
          <span class="hud-screen-floor" id="hudScreenFloor">PH</span>
          <span class="hud-screen-unit">LVL</span>
        </div>
      </div>
      <div class="hud-buttons-stack">
        <?php 
          $floor_codes = ['PH', '04', '03', '02', '01'];
          foreach ($active_slides as $idx => $slide): 
            $code = isset($floor_codes[$idx]) ? $floor_codes[$idx] : sprintf('%02d', $idx + 1);
            $badge = !empty($slide['badge_text']) ? $slide['badge_text'] : 'Elevator System ' . ($idx + 1);
        ?>
          <button type="button" class="hud-btn <?= $idx === 0 ? 'active' : '' ?>" data-slide="<?= $idx ?>">
            <span class="hud-btn-code"><?= $code ?></span>
            <span class="hud-btn-name"><?= htmlspecialchars($badge) ?></span>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Slider Navigation Controls -->
    <div class="slider-nav-arrows">
      <button type="button" class="slider-arrow-btn slider-prev" aria-label="Previous Slide">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path d="M15 18l-6-6 6-6" />
        </svg>
      </button>
      <button type="button" class="slider-arrow-btn slider-next" aria-label="Next Slide">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path d="M9 18l6-6-6-6" />
        </svg>
      </button>
    </div>

    <!-- Slider Progress Indicator Dots -->
    <div class="slider-dots">
      <?php foreach ($active_slides as $idx => $slide): ?>
        <div class="slider-dot <?= $idx === 0 ? 'active' : '' ?>" data-slide="<?= $idx ?>"></div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ==========================================================================
       LIVE ENGINEERING TELEMETRY TICKER BAR
       ========================================================================== -->
  <div class="telemetry-ticker-bar">
    <div class="telemetry-track">
      <div class="telemetry-node">
        <span class="telemetry-beacon"></span>
        <span>SYSTEM STATUS: <strong>100% OPERATIONAL</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon gold"></span>
        <span>ACOUSTIC NOISE: <strong id="telemetryDecibels">40.8 dB (WHISPER QUIET)</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon blue"></span>
        <span>DRIVE EFFICIENCY: <strong id="telemetryDrive">98.6% VVVF REGENERATIVE</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon red"></span>
        <span>CIVIL DEFENSE CODE: <strong>EN 81-20/50 &amp; DCD COMPLIANT</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon"></span>
        <span>DUBAI FLEET: <strong>500+ ACTIVE INSTALLATIONS</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon gold"></span>
        <span>EMERGENCY DISPATCH: <strong>&lt; 15 MIN AVERAGE RESPONSE</strong></span>
      </div>
      <!-- Duplicate nodes for seamless infinite ticker scroll -->
      <div class="telemetry-node">
        <span class="telemetry-beacon"></span>
        <span>SYSTEM STATUS: <strong>100% OPERATIONAL</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon gold"></span>
        <span>ACOUSTIC NOISE: <strong>40.8 dB (WHISPER QUIET)</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon blue"></span>
        <span>DRIVE EFFICIENCY: <strong>98.6% VVVF REGENERATIVE</strong></span>
      </div>
      <div class="telemetry-node">
        <span class="telemetry-beacon red"></span>
        <span>CIVIL DEFENSE CODE: <strong>EN 81-20/50 &amp; DCD COMPLIANT</strong></span>
      </div>
    </div>
  </div>

  <!-- ==========================================================================
       5. TRUST METRICS STRIP (ANIMATED COUNTERS)
       ========================================================================== -->
  <div class="trust-metrics-strip">
    <div class="container">
      <div class="metrics-grid">

        <div class="metric-item">
          <div class="metric-icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
              <polyline points="22 4 12 14.01 9 11.01" />
            </svg>
          </div>
          <div>
            <div class="metric-number"><span class="counter-val" data-target="500">0</span><span class="plus">+</span>
            </div>
            <div class="metric-label">Elevators Commissioned In UAE</div>
          </div>
        </div>

        <div class="metric-item">
          <div class="metric-icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10" />
              <polyline points="12 6 12 12 14 14" />
            </svg>
          </div>
          <div>
            <div class="metric-number"><span class="counter-val" data-target="99.9">0</span><span class="plus">%</span>
            </div>
            <div class="metric-label">Operational Uptime Reliability</div>
          </div>
        </div>

        <div class="metric-item">
          <div class="metric-icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
            </svg>
          </div>
          <div>
            <div class="metric-number"><span class="counter-val" data-target="15">0</span><span class="plus"> Min</span>
            </div>
            <div class="metric-label">Rapid Emergency Dispatch</div>
          </div>
        </div>

        <div class="metric-item">
          <div class="metric-icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
            </svg>
          </div>
          <div>
            <div class="metric-number"><span class="counter-val" data-target="100">0</span><span class="plus">%</span>
            </div>
            <div class="metric-label">Civil Defense & TUV Certified</div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- ==========================================================================
       6. ABOUT US SECTION
       ========================================================================== -->
  <section class="section-wrapper about-section" id="about">
    <div class="container">
      <div class="about-grid">

        <div class="about-img-box">
          <img src="<?= $base_url ?>assets/images/hero_luxury_home.jpg"
            alt="Sigma Height Elevators Engineering Expertise">
          <div class="about-experience-badge">
            <div class="about-badge-num">15+</div>
            <div class="about-badge-text">Years of Engineering<br>Excellence in Dubai</div>
          </div>
        </div>

        <div class="about-content-col">
          <div class="section-tagline">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 8v8M8 12h8" />
            </svg>
            About Sigma Height Elevators L.L.C
          </div>
          <h2 class="section-title">Setting The Benchmark In <span class="accent">Dubai's Vertical Mobility</span></h2>
          <p class="section-desc">
            Headquartered in Dubai, <strong>Sigma Height Elevators L.L.C</strong> is a premier engineering firm
            specializing in the design, supply, installation, modernization, and maintenance of high-performance
            elevator systems. Combining German engineering precision with Italian cabin aesthetics, we serve residential
            palaces, high-rise commercial towers, luxury hotels, healthcare centers, and industrial facilities across
            the UAE.
          </p>

          <div class="about-pillars">
            <div class="about-pillar-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
              </svg>
              <div>
                <div class="about-pillar-title">German Machine Technology</div>
                <div class="about-pillar-desc">Quiet permanent magnet synchronous motors delivering smooth acceleration.
                </div>
              </div>
            </div>

            <div class="about-pillar-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
              <div>
                <div class="about-pillar-title">Dubai Civil Defense Approved</div>
                <div class="about-pillar-desc">100% compliant with EN-81 European codes and statutory UAE civil defense
                  mandates.</div>
              </div>
            </div>

            <div class="about-pillar-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <circle cx="12" cy="12" r="10" />
                <polygon points="12 6 12 12 14 14" />
              </svg>
              <div>
                <div class="about-pillar-title">24/7 Rapid Mobile Support</div>
                <div class="about-pillar-desc">Strategic technician fleet stationed across Dubai for swift emergency
                  dispatch.</div>
              </div>
            </div>

            <div class="about-pillar-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polygon
                  points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
              </svg>
              <div>
                <div class="about-pillar-title">Bespoke Custom Cabins</div>
                <div class="about-pillar-desc">Custom finishes with imported marble, titanium gold accents, and acoustic
                  glass.</div>
              </div>
            </div>
          </div>

          <div>
            <a href="#contact" class="btn-primary">
              <span>Consult With Our Engineers</span>
              <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ==========================================================================
       7. OUR SERVICES SECTION (CARDS & ANIMATIONS)
       ========================================================================== -->
  <section class="section-wrapper services-section" id="services">
    <div class="container">
      <div class="section-header-center">
        <div class="section-tagline">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <rect x="3" y="3" width="7" height="7" />
            <rect x="14" y="3" width="7" height="7" />
            <rect x="14" y="14" width="7" height="7" />
            <rect x="3" y="14" width="7" height="7" />
          </svg>
          Our Services
        </div>
        <h2 class="section-title">Expert Elevator Services <span class="accent">Tailored For You</span></h2>
        <p class="section-desc">From new elevator installation to design, maintenance, and modernization — we deliver
          end-to-end vertical mobility solutions across the UAE.</p>
      </div>

      <div class="services-grid">

        <!-- 1. ELEVATOR INSTALLATION -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
              </svg>
            </div>
            <h3 class="service-name">Elevator Installation</h3>
            <p class="service-specs">Professional elevator installation in Dubai with safe, reliable, and modern lift
              systems for residential and commercial buildings.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Get A Quote</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 2. ELEVATOR MAINTENANCE -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path
                  d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
              </svg>
            </div>
            <h3 class="service-name">Elevator Maintenance</h3>
            <p class="service-specs">Reliable elevator maintenance in Dubai to ensure smooth operation, improved safety,
              and reduced unexpected breakdowns.</p>
            <a href="#contact" class="service-footer-cta">
              <span>View AMC Plans</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 3. ELEVATOR REPAIR -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
              </svg>
            </div>
            <h3 class="service-name">Elevator Repair</h3>
            <p class="service-specs">Fast and professional elevator repair services in Dubai for reliable lift
              performance, safety, and long-lasting operation.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Emergency Support</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 4. ELEVATOR MODERNIZATION -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="23 4 23 10 17 10" />
                <polyline points="1 20 1 14 7 14" />
                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
              </svg>
            </div>
            <h3 class="service-name">Elevator Modernization</h3>
            <p class="service-specs">Upgrade your existing lift with advanced elevator modernization solutions in Dubai
              for better safety, performance, efficiency, and comfort.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Upgrade Now</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 5. HOME ELEVATORS -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
            </div>
            <h3 class="service-name">Home Elevators</h3>
            <p class="service-specs">Elegant and compact home elevators in Dubai designed for villas and residences,
              combining modern technology, safety, and comfort.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Design Your Lift</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 6. COMMERCIAL ELEVATORS -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="4" y="2" width="16" height="20" rx="2" />
                <line x1="12" y1="18" x2="12" y2="18.01" />
                <line x1="12" y1="14" x2="12" y2="14.01" />
                <line x1="12" y1="10" x2="12" y2="10.01" />
                <line x1="12" y1="6" x2="12" y2="6.01" />
              </svg>
            </div>
            <h3 class="service-name">Commercial Elevators</h3>
            <p class="service-specs">High-performance commercial elevators in Dubai built for offices, hotels,
              apartments, malls, and other high-traffic buildings.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Get Engineering Quote</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 7. ELEVATOR INTERIOR DESIGN -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 20h9" />
                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
              </svg>
            </div>
            <h3 class="service-name">Elevator Interior Design</h3>
            <p class="service-specs">Premium elevator interior design in Dubai with customized cabin finishes, lighting,
              flooring, panels, and elegant modern interiors.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Explore Designs</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- 8. CUSTOM ELEVATOR SOLUTIONS -->
        <div class="service-card">
          <div class="service-card-content">
            <div class="service-icon-bubble">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3" />
                <path
                  d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
              </svg>
            </div>
            <h3 class="service-name">Custom Elevator Solutions</h3>
            <p class="service-specs">Create a lift that perfectly matches your building with custom elevator design,
              cabin finishes, layouts, and features tailored to your specific requirements.</p>
            <a href="#contact" class="service-footer-cta">
              <span>Start Customizing</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M5 12h14M12 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

      </div>

      <!-- Mobile swipe hint -->
      <div class="mobile-swipe-hint" style="display:none;">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
        Swipe to explore more
      </div>

      <!-- More Services Action Center -->
      <div class="services-action-bottom">
        <a href="<?= site_url('services') ?>" class="btn-more-services">
          <span>Explore All Elevator Services &amp; Solutions</span>
          <div class="btn-icon-bubble">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </div>
        </a>
      </div>
    </div>
  </section>



  <!-- ==========================================================================
       8. WHY CHOOSE US SECTION
       ========================================================================== -->
  <section class="section-wrapper why-us-section" id="why-us">
    <div class="container">

      <div class="section-header-center">
        <div class="section-tagline">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polygon
              points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
          </svg>
          Why Choose Sigma Height
        </div>
        <h2 class="section-title">Why Clients Trust <span class="accent">Sigma Height Elevators</span></h2>
        <p class="section-desc">We are committed to delivering safe, reliable, and tailored elevator solutions for every
          building and every client across the UAE.</p>
      </div>

      <div class="why-grid">

        <!-- 1. Safety First -->
        <div class="why-card real-glass-lift" data-lift="1">
          <!-- Outer Elevator Shaft Guide Rails & Cables -->
          <div class="lift-shaft-rails">
            <div class="shaft-rail left"></div>
            <div class="shaft-cable left"></div>
            <div class="shaft-cable right"></div>
            <div class="shaft-rail right"></div>
          </div>

          <!-- Ascending Glass Cabin Carriage (Carries the Content) -->
          <div class="lift-cabin-carriage">
            <!-- Roof Canopy & Ceiling Spotlights -->
            <div class="cabin-roof-canopy">
              <div class="roof-steel-header">
                <div class="roof-pulley-bracket"></div>
                <div class="roof-led-trim"></div>
              </div>
              <div class="cabin-ceiling-spots">
                <span class="spotlight"></span>
                <span class="spotlight center"></span>
                <span class="spotlight"></span>
              </div>
            </div>

            <!-- Panoramic Glass Cabin Enclosure -->
            <div class="cabin-glass-enclosure">
              <div class="glass-sheen-layer"></div>
              <div class="cabin-mullion left"></div>
              <div class="cabin-mullion right"></div>

              <!-- Top Bar: Lift Fixture & OLED Floor Display -->
              <div class="cabin-top-fixtures">
                <div class="cabin-call-fixture">
                  <div class="fixture-glow-ring"></div>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                  </svg>
                </div>
                <div class="cabin-oled-display">
                  <span class="oled-arrow">▲</span>
                  <span class="oled-floor-num">01</span>
                  <span class="oled-unit">LVL</span>
                </div>
              </div>

              <!-- Carried Text Content inside the Lift -->
              <div class="cabin-carried-content">
                <h3 class="why-title">Safety First</h3>
                <p class="why-desc">We prioritize passenger safety with quality components, reliable systems, and professional installation and maintenance practices.</p>
              </div>

              <!-- Stainless Steel Cabin Handrail -->
              <div class="cabin-handrail-bar">
                <div class="handrail-tube"></div>
                <div class="handrail-bracket left"></div>
                <div class="handrail-bracket right"></div>
              </div>
            </div>

            <!-- Structural Cabin Floor Base & Threshold -->
            <div class="cabin-floor-base">
              <div class="base-marble-threshold">
                <div class="base-platform-groove"></div>
                <div class="base-sensor-beacon" title="Elevator Online"></div>
              </div>
              <div class="base-chassis-trim"></div>
              <div class="base-ambient-underglow"></div>
            </div>
          </div>
        </div>

        <!-- 2. Advanced Technology -->
        <div class="why-card real-glass-lift" data-lift="2">
          <div class="lift-shaft-rails">
            <div class="shaft-rail left"></div>
            <div class="shaft-cable left"></div>
            <div class="shaft-cable right"></div>
            <div class="shaft-rail right"></div>
          </div>

          <div class="lift-cabin-carriage">
            <div class="cabin-roof-canopy">
              <div class="roof-steel-header">
                <div class="roof-pulley-bracket"></div>
                <div class="roof-led-trim"></div>
              </div>
              <div class="cabin-ceiling-spots">
                <span class="spotlight"></span>
                <span class="spotlight center"></span>
                <span class="spotlight"></span>
              </div>
            </div>

            <div class="cabin-glass-enclosure">
              <div class="glass-sheen-layer"></div>
              <div class="cabin-mullion left"></div>
              <div class="cabin-mullion right"></div>

              <div class="cabin-top-fixtures">
                <div class="cabin-call-fixture">
                  <div class="fixture-glow-ring"></div>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3" />
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                  </svg>
                </div>
                <div class="cabin-oled-display">
                  <span class="oled-arrow">▲</span>
                  <span class="oled-floor-num">02</span>
                  <span class="oled-unit">LVL</span>
                </div>
              </div>

              <div class="cabin-carried-content">
                <h3 class="why-title">Advanced Technology</h3>
                <p class="why-desc">We use modern elevator technologies and efficient systems to deliver smooth, comfortable, and reliable vertical transportation.</p>
              </div>

              <div class="cabin-handrail-bar">
                <div class="handrail-tube"></div>
                <div class="handrail-bracket left"></div>
                <div class="handrail-bracket right"></div>
              </div>
            </div>

            <div class="cabin-floor-base">
              <div class="base-marble-threshold">
                <div class="base-platform-groove"></div>
                <div class="base-sensor-beacon" title="Elevator Online"></div>
              </div>
              <div class="base-chassis-trim"></div>
              <div class="base-ambient-underglow"></div>
            </div>
          </div>
        </div>

        <!-- 3. Customized Solutions -->
        <div class="why-card real-glass-lift" data-lift="3">
          <div class="lift-shaft-rails">
            <div class="shaft-rail left"></div>
            <div class="shaft-cable left"></div>
            <div class="shaft-cable right"></div>
            <div class="shaft-rail right"></div>
          </div>

          <div class="lift-cabin-carriage">
            <div class="cabin-roof-canopy">
              <div class="roof-steel-header">
                <div class="roof-pulley-bracket"></div>
                <div class="roof-led-trim"></div>
              </div>
              <div class="cabin-ceiling-spots">
                <span class="spotlight"></span>
                <span class="spotlight center"></span>
                <span class="spotlight"></span>
              </div>
            </div>

            <div class="cabin-glass-enclosure">
              <div class="glass-sheen-layer"></div>
              <div class="cabin-mullion left"></div>
              <div class="cabin-mullion right"></div>

              <div class="cabin-top-fixtures">
                <div class="cabin-call-fixture">
                  <div class="fixture-glow-ring"></div>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" />
                    <path d="M3 9h18M9 21V9" />
                  </svg>
                </div>
                <div class="cabin-oled-display">
                  <span class="oled-arrow">▲</span>
                  <span class="oled-floor-num">03</span>
                  <span class="oled-unit">LVL</span>
                </div>
              </div>

              <div class="cabin-carried-content">
                <h3 class="why-title">Customized Solutions</h3>
                <p class="why-desc">Every building has different requirements. We provide elevator solutions tailored to your building design, usage, capacity, and space.</p>
              </div>

              <div class="cabin-handrail-bar">
                <div class="handrail-tube"></div>
                <div class="handrail-bracket left"></div>
                <div class="handrail-bracket right"></div>
              </div>
            </div>

            <div class="cabin-floor-base">
              <div class="base-marble-threshold">
                <div class="base-platform-groove"></div>
                <div class="base-sensor-beacon" title="Elevator Online"></div>
              </div>
              <div class="base-chassis-trim"></div>
              <div class="base-ambient-underglow"></div>
            </div>
          </div>
        </div>

        <!-- 4. Professional Installation & Service -->
        <div class="why-card real-glass-lift" data-lift="4">
          <div class="lift-shaft-rails">
            <div class="shaft-rail left"></div>
            <div class="shaft-cable left"></div>
            <div class="shaft-cable right"></div>
            <div class="shaft-rail right"></div>
          </div>

          <div class="lift-cabin-carriage">
            <div class="cabin-roof-canopy">
              <div class="roof-steel-header">
                <div class="roof-pulley-bracket"></div>
                <div class="roof-led-trim"></div>
              </div>
              <div class="cabin-ceiling-spots">
                <span class="spotlight"></span>
                <span class="spotlight center"></span>
                <span class="spotlight"></span>
              </div>
            </div>

            <div class="cabin-glass-enclosure">
              <div class="glass-sheen-layer"></div>
              <div class="cabin-mullion left"></div>
              <div class="cabin-mullion right"></div>

              <div class="cabin-top-fixtures">
                <div class="cabin-call-fixture">
                  <div class="fixture-glow-ring"></div>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                  </svg>
                </div>
                <div class="cabin-oled-display">
                  <span class="oled-arrow">▲</span>
                  <span class="oled-floor-num">04</span>
                  <span class="oled-unit">LVL</span>
                </div>
              </div>

              <div class="cabin-carried-content">
                <h3 class="why-title">Professional Installation &amp; Service</h3>
                <p class="why-desc">Our experienced technical team handles installation, maintenance, repair, and modernization with attention to detail.</p>
              </div>

              <div class="cabin-handrail-bar">
                <div class="handrail-tube"></div>
                <div class="handrail-bracket left"></div>
                <div class="handrail-bracket right"></div>
              </div>
            </div>

            <div class="cabin-floor-base">
              <div class="base-marble-threshold">
                <div class="base-platform-groove"></div>
                <div class="base-sensor-beacon" title="Elevator Online"></div>
              </div>
              <div class="base-chassis-trim"></div>
              <div class="base-ambient-underglow"></div>
            </div>
          </div>
        </div>

        <!-- 5. Reliable Maintenance Support -->
        <div class="why-card real-glass-lift" data-lift="5">
          <div class="lift-shaft-rails">
            <div class="shaft-rail left"></div>
            <div class="shaft-cable left"></div>
            <div class="shaft-cable right"></div>
            <div class="shaft-rail right"></div>
          </div>

          <div class="lift-cabin-carriage">
            <div class="cabin-roof-canopy">
              <div class="roof-steel-header">
                <div class="roof-pulley-bracket"></div>
                <div class="roof-led-trim"></div>
              </div>
              <div class="cabin-ceiling-spots">
                <span class="spotlight"></span>
                <span class="spotlight center"></span>
                <span class="spotlight"></span>
              </div>
            </div>

            <div class="cabin-glass-enclosure">
              <div class="glass-sheen-layer"></div>
              <div class="cabin-mullion left"></div>
              <div class="cabin-mullion right"></div>

              <div class="cabin-top-fixtures">
                <div class="cabin-call-fixture">
                  <div class="fixture-glow-ring"></div>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                  </svg>
                </div>
                <div class="cabin-oled-display">
                  <span class="oled-arrow">▲</span>
                  <span class="oled-floor-num">05</span>
                  <span class="oled-unit">LVL</span>
                </div>
              </div>

              <div class="cabin-carried-content">
                <h3 class="why-title">Reliable Maintenance Support</h3>
                <p class="why-desc">Regular maintenance helps reduce unexpected breakdowns and keeps your elevator operating efficiently and safely at all times.</p>
              </div>

              <div class="cabin-handrail-bar">
                <div class="handrail-tube"></div>
                <div class="handrail-bracket left"></div>
                <div class="handrail-bracket right"></div>
              </div>
            </div>

            <div class="cabin-floor-base">
              <div class="base-marble-threshold">
                <div class="base-platform-groove"></div>
                <div class="base-sensor-beacon" title="Elevator Online"></div>
              </div>
              <div class="base-chassis-trim"></div>
              <div class="base-ambient-underglow"></div>
            </div>
          </div>
        </div>

        <!-- 6. Premium Design & Comfort -->
        <div class="why-card real-glass-lift" data-lift="6">
          <div class="lift-shaft-rails">
            <div class="shaft-rail left"></div>
            <div class="shaft-cable left"></div>
            <div class="shaft-cable right"></div>
            <div class="shaft-rail right"></div>
          </div>

          <div class="lift-cabin-carriage">
            <div class="cabin-roof-canopy">
              <div class="roof-steel-header">
                <div class="roof-pulley-bracket"></div>
                <div class="roof-led-trim"></div>
              </div>
              <div class="cabin-ceiling-spots">
                <span class="spotlight"></span>
                <span class="spotlight center"></span>
                <span class="spotlight"></span>
              </div>
            </div>

            <div class="cabin-glass-enclosure">
              <div class="glass-sheen-layer"></div>
              <div class="cabin-mullion left"></div>
              <div class="cabin-mullion right"></div>

              <div class="cabin-top-fixtures">
                <div class="cabin-call-fixture">
                  <div class="fixture-glow-ring"></div>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 20h9" />
                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                  </svg>
                </div>
                <div class="cabin-oled-display">
                  <span class="oled-arrow">▲</span>
                  <span class="oled-floor-num">06</span>
                  <span class="oled-unit">LVL</span>
                </div>
              </div>

              <div class="cabin-carried-content">
                <h3 class="why-title">Premium Design &amp; Comfort</h3>
                <p class="why-desc">From elegant cabin interiors to modern control panels and lighting, we create elevator solutions that complement contemporary architecture.</p>
              </div>

              <div class="cabin-handrail-bar">
                <div class="handrail-tube"></div>
                <div class="handrail-bracket left"></div>
                <div class="handrail-bracket right"></div>
              </div>
            </div>

            <div class="cabin-floor-base">
              <div class="base-marble-threshold">
                <div class="base-platform-groove"></div>
                <div class="base-sensor-beacon" title="Elevator Online"></div>
              </div>
              <div class="base-chassis-trim"></div>
              <div class="base-ambient-underglow"></div>
            </div>
          </div>
        </div>

      </div>
      <!-- Mobile swipe hint -->
      <div class="mobile-swipe-hint" style="display:none;">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
        Swipe to explore more
      </div>
    </div>
  </section>



  <!-- ==========================================================================
       10. 3) OUR PROCESS SECTION (LIFT FLOW ANIMATION)
       ========================================================================== -->
  <section class="section-wrapper process-section" id="process">
    <div class="container">
      <div class="section-header-center">
        <div class="process-pill-tag">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
          </svg>
          SHORT PROCESS FLOW
        </div>
        <h2 class="section-title">Our Simple <span class="accent">7-Step Lift Process</span></h2>
        <p class="section-desc">A disciplined, high-precision vertical mobility engineering journey from initial architectural consultation to lifetime preventative maintenance.</p>
      </div>

      <!-- Horizontal Flow Track -->
      <div class="process-flow-container">
        <div class="process-flow-track" id="processFlowTrack">
          
          <!-- Dashed connecting timeline line -->
          <div class="flow-dashed-line"></div>

          <!-- Step 1: Consultation -->
          <div class="process-step-node active" data-step="1" data-title="Consultation">
            <span class="step-num-badge">1</span>
            <div class="step-circle">
              <!-- Consultation / speech-bubble icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
              </svg>
            </div>
            <h3 class="step-label">Consultation</h3>
          </div>

          <!-- Step 2: Site Survey -->
          <div class="process-step-node" data-step="2" data-title="Site Survey">
            <span class="step-num-badge">2</span>
            <div class="step-circle">
              <!-- Site Survey / map-pin icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/>
                <circle cx="12" cy="10" r="3"/>
              </svg>
            </div>
            <h3 class="step-label">Site Survey</h3>
          </div>

          <!-- Step 3: Design -->
          <div class="process-step-node" data-step="3" data-title="Design">
            <span class="step-num-badge">3</span>
            <div class="step-circle">
              <!-- Design / pen-tool icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 19l7-7 3 3-7 7-3-3z"/>
                <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/>
                <path d="M2 2l7.586 7.586"/>
                <circle cx="11" cy="11" r="2"/>
              </svg>
            </div>
            <h3 class="step-label">Design</h3>
          </div>

          <!-- Step 4: Preparation -->
          <div class="process-step-node" data-step="4" data-title="Preparation">
            <span class="step-num-badge">4</span>
            <div class="step-circle">
              <!-- Preparation / package / box icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"/>
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                <line x1="12" y1="22.08" x2="12" y2="12"/>
              </svg>
            </div>
            <h3 class="step-label">Preparation</h3>
          </div>

          <!-- Step 5: Installation -->
          <div class="process-step-node" data-step="5" data-title="Installation">
            <span class="step-num-badge">5</span>
            <div class="step-circle">
              <!-- Installation / tool / wrench icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
              </svg>
            </div>
            <h3 class="step-label">Installation</h3>
          </div>

          <!-- Step 6: Testing -->
          <div class="process-step-node" data-step="6" data-title="Testing">
            <span class="step-num-badge">6</span>
            <div class="step-circle">
              <!-- Testing / check-circle / shield-check icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <polyline points="9 12 11 14 15 10"/>
              </svg>
            </div>
            <h3 class="step-label">Testing</h3>
          </div>

          <!-- Step 7: Maintenance -->
          <div class="process-step-node" data-step="7" data-title="Maintenance">
            <span class="step-num-badge">7</span>
            <div class="step-circle">
              <!-- Maintenance / settings / gear icon -->
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
              </svg>
            </div>
            <h3 class="step-label">Maintenance</h3>
          </div>

        </div>
      </div>

      <!-- Mobile swipe hint -->
      <div class="mobile-swipe-hint" style="display:none;">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
        Swipe to view all 7 steps
      </div>

    </div>
  </section>

  <!-- ==========================================================================
       11. SIGNATURE PROJECTS SHOWCASE (5-COLUMN PURE IMAGE EXPANDABLE GALLERY)
       ========================================================================== -->
  <section class="section-wrapper projects-section" id="projects" style="padding: 90px 0; background: #ffffff;">
    <div class="container">
      <div class="section-header-center">
        <div class="section-tagline">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
          </svg>
          Iconic Installations
        </div>
        <h2 class="section-title">Signature <span class="accent">Elevator Projects</span> In Dubai</h2>
        <p class="section-desc">Experience our landmark vertical transportation installations in prestigious villas, hotels, and business towers across the UAE. Hover to expand, click for full view.</p>
      </div>

      <div class="projects-expand-gallery">
        <?php 
          $active_projects = !empty($projects) ? $projects : [
            [
              'title' => 'Signature Villa Panoramic Glass Lift',
              'category' => 'Luxury Villas',
              'location' => 'Palm Jumeirah, Dubai',
              'image' => 'assets/images/hero_panoramic.jpg'
            ],
            [
              'title' => 'Royal Residence Custom MRL Lift',
              'category' => 'Luxury Residences',
              'location' => 'Emirates Hills, Dubai',
              'image' => 'assets/images/hero_luxury_home.jpg'
            ],
            [
              'title' => 'Corporate Tower High-Speed Elevators',
              'category' => 'Commercial',
              'location' => 'Business Bay, Dubai',
              'image' => 'assets/images/hero_commercial.jpg'
            ],
            [
              'title' => 'Five-Star Hotel Atrium Glass Lifts',
              'category' => 'Panoramic Glass',
              'location' => 'Downtown Dubai',
              'image' => 'assets/images/service_panoramic.jpg'
            ],
            [
              'title' => 'Modern Luxury Penthouse Glass Shaft',
              'category' => 'Luxury Villas',
              'location' => 'Dubai Marina',
              'image' => 'assets/images/service_home.jpg'
            ]
          ];
          $showcase_projects = array_slice($active_projects, 0, 5);
          foreach ($showcase_projects as $pIdx => $proj): 
            $isActive = ($pIdx === 0);
            $imgUrl = base_url($proj['image']);
        ?>
          <div class="project-expand-card <?= $isActive ? 'active' : '' ?>" data-img="<?= $imgUrl ?>" data-project="<?= $pIdx ?>" role="button" tabindex="0" aria-label="<?= htmlspecialchars($proj['title']) ?>">
            <img src="<?= $imgUrl ?>" alt="<?= htmlspecialchars($proj['title']) ?>" class="project-card-bg" loading="lazy">
            <div class="project-card-glass-shine"></div>
            <div class="project-card-vignette"></div>
            
            <!-- Floating Project Badge (Visible on hover/active) -->
            <div class="project-card-badge-wrap">
              <span class="project-category-badge">
                <?= htmlspecialchars(!empty($proj['category']) ? $proj['category'] : 'Elevator') ?>
              </span>
            </div>

            <!-- Project Details at Bottom (Visible on hover/active) -->
            <div class="project-card-info-wrap">
              <div class="project-card-location">
                <i class="fa-solid fa-location-dot"></i>
                <span><?= htmlspecialchars(!empty($proj['location']) ? $proj['location'] : 'Dubai, UAE') ?></span>
              </div>
              <h3 class="project-card-heading">
                <?= htmlspecialchars($proj['title']) ?>
              </h3>
              <div class="project-card-cta-hint">
                <span>
                  <i class="fa-solid fa-maximize" style="color: #38bdf8;"></i> Click to Inspect Full Installation
                </span>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Mobile swipe hint -->
      <div class="mobile-swipe-hint" style="display:none;">
        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
        Swipe to see all projects
      </div>

      <div class="projects-action-center">
        <a href="<?= site_url('services') ?>" class="projects-more-btn" id="projectsMoreBtn">
          <span>Explore All Elevator Services</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ==========================================================================
       11.5. CLIENT TESTIMONIALS & REVIEWS SECTION (SIDE SCROLL SLIDER)
       ========================================================================== -->
  <section class="section-wrapper reviews-section" id="reviews" style="background: linear-gradient(180deg, #090d16 0%, #111827 100%); padding: 90px 0; color: #ffffff; border-top: 1px solid rgba(255,255,255,0.06); border-bottom: 1px solid rgba(255,255,255,0.06); position: relative; overflow: hidden;">
    
    <style>
      .reviews-slider-container {
        position: relative;
        margin-top: 40px;
      }
      .reviews-slider-track {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        padding: 10px 4px 20px;
        cursor: grab;
      }
      .reviews-slider-track:active {
        cursor: grabbing;
      }
      .reviews-slider-track::-webkit-scrollbar {
        display: none;
      }
      .review-slide-card {
        flex: 0 0 calc(33.333% - 16px);
        min-width: 320px;
        scroll-snap-align: start;
        background: rgba(255, 255, 255, 0.035);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 32px 28px;
        backdrop-filter: blur(14px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
        user-select: none;
      }
      .review-slide-card:hover {
        transform: translateY(-6px);
        border-color: rgba(230, 0, 0, 0.45);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 24px rgba(230, 0, 0, 0.15);
      }
      @media (max-width: 992px) {
        .review-slide-card {
          flex: 0 0 calc(50% - 12px);
          min-width: 290px;
        }
      }
      @media (max-width: 640px) {
        .review-slide-card {
          flex: 0 0 88%;
          min-width: 270px;
        }
      }
      .reviews-nav-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 24px;
        padding: 0 4px;
      }
      .reviews-nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.25s ease;
        outline: none;
      }
      .reviews-nav-btn:hover {
        background: #e60000;
        border-color: #e60000;
        transform: scale(1.08);
        box-shadow: 0 0 16px rgba(230, 0, 0, 0.5);
      }
      .reviews-status-tag {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #94a3b8;
        font-size: 0.85rem;
      }
      .reviews-status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #22c55e;
        display: inline-block;
        box-shadow: 0 0 8px #22c55e;
      }
    </style>

    <div class="container">
      <div class="section-header-center">
        <div class="section-tagline">
          <svg width="14" height="14" fill="#ff2a2a" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Client Trust & Endorsements
        </div>
        <h2 class="section-title" style="color: #ffffff;">What Property Owners <span class="accent">Say About Us</span></h2>
        <p class="section-desc" style="color: #94a3b8;">Trusted by prestigious villa owners, property developers, and commercial facility managers across Dubai and the UAE.</p>
      </div>

      <div class="reviews-slider-container">
        <div class="reviews-slider-track" id="reviewsTrack">
          <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $rev): ?>
              <div class="review-slide-card">
                <div>
                  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
                    <div style="color: #f59e0b; font-size: 1.15rem; display: flex; gap: 4px;">
                      <?php $rCount = !empty($rev['rating']) ? (int)$rev['rating'] : 5; ?>
                      <?php for ($i = 1; $i <= $rCount; $i++): ?>
                        <span>★</span>
                      <?php endfor; ?>
                    </div>
                    <span style="font-size: 0.72rem; color: #22c55e; background: rgba(34, 197, 94, 0.12); border: 1px solid rgba(34, 197, 94, 0.3); padding: 2px 8px; border-radius: 12px; font-weight: 600;">
                      <i class="fa-solid fa-circle-check" style="font-size: 0.7rem; margin-right: 2px;"></i> Verified Client
                    </span>
                  </div>
                  <p style="color: #cbd5e1; font-size: 0.96rem; line-height: 1.75; font-style: italic; margin-bottom: 24px;">
                    "<?= htmlspecialchars($rev['review_text']) ?>"
                  </p>
                </div>
                <div style="display: flex; align-items: center; gap: 14px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,0.08);">
                  <?php if (!empty($rev['client_avatar'])): ?>
                    <img src="<?= base_url($rev['client_avatar']) ?>" alt="<?= htmlspecialchars($rev['client_name']) ?>" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid #e60000; flex-shrink: 0;">
                  <?php else: ?>
                    <div style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #e60000 0%, #990000 100%); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1rem; flex-shrink: 0;">
                      <?= strtoupper(substr($rev['client_name'], 0, 2)) ?>
                    </div>
                  <?php endif; ?>
                  <div>
                    <div style="font-weight: 700; color: #ffffff; font-size: 1.02rem; line-height: 1.2;"><?= htmlspecialchars($rev['client_name']) ?></div>
                    <div style="color: #94a3b8; font-size: 0.82rem; margin-top: 3px;">
                      <?= htmlspecialchars($rev['client_title']) ?><?= !empty($rev['company']) ? ' &bull; ' . htmlspecialchars($rev['company']) : '' ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <!-- Navigation Controls -->
        <div class="reviews-nav-wrapper">
          <div class="reviews-status-tag">
            <span class="reviews-status-dot"></span>
            <span>Swipe or click arrows to explore client experiences</span>
          </div>
          <div style="display: flex; gap: 10px;">
            <button type="button" class="reviews-nav-btn" id="reviewPrevBtn" aria-label="Previous review">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <button type="button" class="reviews-nav-btn" id="reviewNextBtn" aria-label="Next review">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==========================================================================
       12. CONTACT US & FAST INQUIRY FORM SECTION
       ========================================================================== -->
  <section class="section-wrapper contact-section" id="contact">
    <div class="contact-bg-glow"></div>
    <div class="container">
      <div class="contact-grid">

        <!-- Contact Information Column -->
        <div class="contact-info-panel">
          <div>
            <div class="section-tagline">
              <span class="live-status-dot"></span>
              Connect With Us
            </div>
            <h2 class="section-title">Schedule A <span class="accent">Free Site Survey</span> & Consultation</h2>
            <p class="section-desc">
              Looking to install a bespoke residential villa elevator, commercial high-speed lift, or upgrade your Annual Maintenance Contract? Speak directly with our Dubai engineering specialists today.
            </p>
          </div>

          <div class="contact-cards-stack">
            <div class="contact-info-card">
              <div class="contact-info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                  <circle cx="12" cy="10" r="3" />
                </svg>
              </div>
              <div class="contact-info-text">
                <div class="contact-info-title">Head Office & Showroom</div>
                <div class="contact-info-value">Flat No. 325, Abdul Razak Al zarouni Building(Bldg No. 326), Damascus Street, Al Qusais Industrial Area 2, Dubai, UAE</div>
                <div class="contact-card-badge">Dubai, UAE</div>
              </div>
            </div>

            <div class="contact-info-card">
              <div class="contact-info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
              </div>
              <div class="contact-info-text">
                <div class="contact-info-title">Direct Engineering & 24/7 Helpline</div>
                <div class="contact-info-value">
                  <span>General: <a href="tel:+97142889120">+048858454</a></span>
                  <span class="emergency-tag">24/7 Emergency: <a href="tel:+052-6405622">052-6405622</a></span>
                </div>
                <div class="contact-card-badge active-status">Live Desk</div>
              </div>
            </div>

            <div class="contact-info-card">
              <div class="contact-info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                  <polyline points="22,6 12,13 2,6" />
                </svg>
              </div>
              <div class="contact-info-text">
                <div class="contact-info-title">Email Technical Inquiries</div>
                <div class="contact-info-value">
                  <a href="mailto:sales@sigmaheightelevators.com">sales@sigmaheightelevators.com</a>
                </div>
                <div class="contact-card-badge">Fast Response</div>
              </div>
            </div>
          </div>

          <div class="contact-actions-row">
            <a href="https://wa.me/052-6405622?text=Hello%20Sigma%20Height%20Elevators,%20I%20would%20like%20a%20quotation"
              target="_blank" class="contact-whatsapp-btn">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.127-.521-1.615-.67-2.66-2.316-2.74-2.424-.078-.108-.66-8.79-.66-1.678 0-.799.414-1.192.56-1.35.147-.158.324-.197.433-.197.109 0 .217.001.312.006.101.005.235-.038.368.278.138.329.47 1.15.512 1.233.042.083.07.18.014.29-.055.109-.083.18-.166.276-.083.097-.175.217-.25.291-.083.082-.17.172-.073.339.097.167.431.711.925 1.15.637.568 1.174.743 1.341.826.167.083.264.069.362-.042.097-.111.414-.482.525-.648.111-.166.222-.138.375-.083.153.055.97.457 1.137.54.167.083.278.125.319.194.041.069.041.402-.103.807z" />
              </svg>
              <span>Chat On WhatsApp</span>
            </a>
          </div>

        </div>

        <!-- Inquiry Form Card -->
        <div class="contact-form-card">
          <div class="form-header-badge">
            <span class="badge-icon">⚡</span>
            <span>Complimentary Engineering Assessment</span>
          </div>

          <h3 class="form-heading">Request An Elevator Consultation</h3>
          <p class="form-subheading">Fill in your specifications below. Our senior lift engineers will provide CAD layouts, technical options, and a tailored quote.</p>

          <div id="formAlert" class="form-alert-container" style="display: none;"></div>

          <form id="enquiryForm" action="<?= site_url('welcome/save_enquiry') ?>" method="POST" class="premium-enquiry-form">

            <div class="form-group-row">
              <div class="form-field">
                <label for="clientName">Full Name <span class="required-star">*</span></label>
                <div class="input-icon-wrap">
                  <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                  </svg>
                  <input type="text" id="clientName" name="name" required>
                </div>
              </div>

              <div class="form-field">
                <label for="clientPhone">Phone / Mobile (UAE) <span class="required-star">*</span></label>
                <div class="input-icon-wrap phone-input-wrap">
                  <span class="country-prefix-badge">
                    <span class="flag-icon">🇦🇪</span>
                    <span class="prefix-num">+971</span>
                  </span>
                  <input type="tel" id="clientPhone" name="phone" placeholder="50 123 4567" required>
                </div>
              </div>
            </div>

            <div class="form-group-row">
              <div class="form-field">
                <label for="clientEmail">Email Address <span class="required-star">*</span></label>
                <div class="input-icon-wrap">
                  <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                  </svg>
                  <input type="email" id="clientEmail" name="email" required>
                </div>
              </div>

              <div class="form-field">
                <label for="serviceType">Elevator Service Needed <span class="required-star">*</span></label>
                <div class="input-icon-wrap select-wrap">
                  <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" />
                    <path d="M7 12l5-5 5 5M7 12l5 5 5-5" />
                  </svg>
                  <select id="serviceType" name="service" required>
                    <option value="Home Elevators">Home Elevators (Villas & Mansions)</option>
                    <option value="Passenger Elevators">Passenger Elevators (Commercial / High-Rise)</option>
                    <option value="Panoramic Elevators">Panoramic Glass Elevators</option>
                    <option value="Dumbwaiters">Dumbwaiters (Restaurants / Hotels)</option>
                    <option value="Hospital / Bed Elevators">Hospital / Bed Elevators</option>
                    <option value="Freight Elevators">Freight & Cargo Elevators</option>
                    <option value="Platform Elevators">Platform Elevators (Accessibility)</option>
                    <option value="Escalators and Moving Walker">Escalators and Moving Walker</option>
                    <option value="Annual Maintenance Contract (AMC)">Annual Maintenance Contract (AMC)</option>
                    <option value="Elevator Modernization">Elevator Modernization / Retrofit</option>
                  </select>
                  <div class="select-chevron">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-field">
              <label for="clientMessage">Project Details / Location in UAE <span class="required-star">*</span></label>
              <div class="input-icon-wrap textarea-icon-wrap">
                <svg class="field-icon textarea-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                </svg>
                <textarea id="clientMessage" name="message" required></textarea>
              </div>
            </div>

            <button type="submit" class="form-submit-btn">
              <span class="btn-shimmer"></span>
              <span class="btn-text">Send Project Enquiry</span>
              <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" class="btn-icon">
                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
              </svg>
            </button>

            <div class="form-footer-assurance">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <span>100% Confidential • Direct Engineering Consultation • Free Site Survey</span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Fullscreen Project Lightbox Modal -->
  <div class="project-modal" id="projectLightboxModal" aria-hidden="true" role="dialog" aria-label="Project Full Image View">
    <div class="project-modal-backdrop" id="modalBackdrop"></div>
    <div class="project-modal-container">
      <button type="button" class="project-modal-close" id="modalCloseBtn" aria-label="Close modal">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <button type="button" class="project-modal-nav prev" id="modalPrevBtn" aria-label="Previous image">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </button>
      <button type="button" class="project-modal-nav next" id="modalNextBtn" aria-label="Next image">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
      </button>

      <div class="project-modal-card">
        <div class="project-modal-img-wrap">
          <img id="modalFullImage" src="" alt="Iconic Installation Full View">
        </div>
      </div>
    </div>
  </div>

  <script>
    // Reviews Side-Scroll Slider Script
    (function() {
      const track = document.getElementById('reviewsTrack');
      const prevBtn = document.getElementById('reviewPrevBtn');
      const nextBtn = document.getElementById('reviewNextBtn');

      if (!track || !prevBtn || !nextBtn) return;

      function getStep() {
        const card = track.querySelector('.review-slide-card');
        return card ? card.offsetWidth + 24 : 360;
      }

      prevBtn.addEventListener('click', function() {
        track.scrollBy({ left: -getStep(), behavior: 'smooth' });
      });

      nextBtn.addEventListener('click', function() {
        const maxScroll = track.scrollWidth - track.clientWidth;
        if (track.scrollLeft >= maxScroll - 15) {
          track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
          track.scrollBy({ left: getStep(), behavior: 'smooth' });
        }
      });

      // Auto Slider with pause on hover
      let autoTimer = setInterval(function() {
        const maxScroll = track.scrollWidth - track.clientWidth;
        if (track.scrollLeft >= maxScroll - 15) {
          track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
          track.scrollBy({ left: getStep(), behavior: 'smooth' });
        }
      }, 4500);

      track.addEventListener('mouseenter', function() { clearInterval(autoTimer); });
      track.addEventListener('mouseleave', function() {
        clearInterval(autoTimer);
        autoTimer = setInterval(function() {
          const maxScroll = track.scrollWidth - track.clientWidth;
          if (track.scrollLeft >= maxScroll - 15) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
          } else {
            track.scrollBy({ left: getStep(), behavior: 'smooth' });
          }
        }, 4500);
      });

      // Mouse drag scroll
      let isDown = false;
      let startX = 0;
      let scrollLeft = 0;

      track.addEventListener('mousedown', function(e) {
        isDown = true;
        startX = e.pageX - track.offsetLeft;
        scrollLeft = track.scrollLeft;
      });
      window.addEventListener('mouseup', function() { isDown = false; });
      track.addEventListener('mousemove', function(e) {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - track.offsetLeft;
        const walk = (x - startX) * 1.5;
        track.scrollLeft = scrollLeft - walk;
      });
    })();
  </script>

<?php $this->load->view('includes/footer'); ?>
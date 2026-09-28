<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$title = 'About Us | Sigma Height Elevators Dubai, UAE';
$meta_description = !empty($about['subtitle']) ? $about['subtitle'] : 'Sigma Height Elevators LLC is Dubai leading elevator company.';
$this->load->view('includes/header', ['title' => $title, 'meta_description' => $meta_description]);
?>

<style>
  .page-hero-banner {
    position: relative;
    background: linear-gradient(135deg, #090d16 0%, #111827 100%);
    padding: 55px 0 45px;
    color: #ffffff;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    overflow: hidden;
  }
  .page-hero-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 85% 30%, rgba(230, 0, 0, 0.18), transparent 60%);
    pointer-events: none;
  }
  .page-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 0.84rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #cbd5e1;
    margin-bottom: 12px;
  }
  .page-hero-tag .tag-line {
    display: inline-block;
    width: 28px;
    height: 2px;
    background: #ffffff;
    border-radius: 2px;
  }
  .page-hero-title {
    font-size: clamp(2rem, 3.2vw, 2.7rem);
    font-weight: 800;
    line-height: 1.25;
    margin-bottom: 12px;
    color: #ffffff;
    letter-spacing: -0.5px;
  }
  .page-hero-subtitle {
    color: #cbd5e1;
    max-width: 760px;
    font-size: 1.05rem;
    line-height: 1.65;
    margin: 0;
  }
  .about-story-grid {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 48px;
    align-items: center;
    padding: 70px 0;
  }
  @media (max-width: 992px) {
    .about-story-grid {
      grid-template-columns: 1fr;
      gap: 40px;
      padding: 50px 0;
    }
  }
  .about-page-media-card {
    width: 100% !important;
    min-height: 520px !important;
    height: 520px !important;
    border-radius: 20px !important;
    overflow: hidden !important;
    box-shadow: 0 20px 45px rgba(0,0,0,0.14) !important;
    border: 1px solid #e2e8f0 !important;
    background: #0f172a !important;
    position: relative !important;
    display: block !important;
    opacity: 1 !important;
    transform: none !important;
    visibility: visible !important;
  }
  @media (max-width: 768px) {
    .about-page-media-card {
      min-height: 380px !important;
      height: 380px !important;
    }
  }
  .about-page-media-card img {
    width: 100% !important;
    height: 100% !important;
    min-height: 100% !important;
    object-fit: cover !important;
    display: block !important;
    opacity: 1 !important;
    transform: none !important;
    visibility: visible !important;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
  }
  .about-page-media-card:hover img {
    transform: scale(1.03) !important;
  }
  .about-stat-strip {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 26px 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.04);
    margin-top: 32px;
  }
  .stat-box {
    text-align: center;
  }
  .stat-val {
    font-size: 2.1rem;
    font-weight: 800;
    color: #0f172a;
    font-family: 'Outfit', sans-serif;
    line-height: 1.1;
  }
  .stat-name {
    font-size: 0.82rem;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 6px;
  }
  .mv-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 36px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    height: 100%;
  }
  .mv-icon {
    width: 54px;
    height: 54px;
    border-radius: 12px;
    background: #f1f5f9;
    color: #0f172a;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
    border: 1px solid #e2e8f0;
  }
</style>

  <!-- HERO BANNER (REDUCED COMPACT HEIGHT & PROFESSIONAL DESIGN) -->
  <?php 
    $hero_slide = !empty($sliders) ? $sliders[0] : null;
    $hero_bg = ($hero_slide && !empty($hero_slide['image'])) ? base_url($hero_slide['image']) : null;
    $hero_btn_link = $hero_slide ? $hero_slide['button_link'] : 'services';
    $hero_href = (strpos($hero_btn_link, 'http') === 0 || strpos($hero_btn_link, '#') === 0) ? $hero_btn_link : site_url($hero_btn_link);
  ?>
  <section class="page-hero-banner" style="<?= $hero_bg ? "background: linear-gradient(rgba(9, 13, 22, 0.88), rgba(17, 24, 39, 0.94)), url('{$hero_bg}') center/cover no-repeat;" : '' ?>">
    <div class="container position-relative" style="z-index: 2;">
      <div class="page-hero-tag">
        <span class="tag-line"></span>
        <span><?= ($hero_slide && !empty($hero_slide['badge_text'])) ? htmlspecialchars($hero_slide['badge_text']) : 'About Sigma Height Elevators' ?></span>
      </div>
      <h1 class="page-hero-title">
        <?php if ($hero_slide): ?>
          <?= htmlspecialchars($hero_slide['title']) ?> 
          <span style="color: #ff3333;"><?= htmlspecialchars($hero_slide['highlight_text']) ?></span>
        <?php else: ?>
          <?= htmlspecialchars($about['title']) ?>
        <?php endif; ?>
      </h1>
      <p class="page-hero-subtitle">
        <?= $hero_slide ? htmlspecialchars($hero_slide['subtitle']) : htmlspecialchars($about['subtitle']) ?>
      </p>
      <?php if ($hero_slide && !empty($hero_slide['button_text'])): ?>
        <div style="margin-top: 20px;">
          <a href="<?= $hero_href ?>" class="btn-theme text-white" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.9rem;">
            <span><?= htmlspecialchars($hero_slide['button_text']) ?></span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- COMPANY STORY & CAPABILITIES SECTION -->
  <section class="section-wrapper" style="background: #f8fafc; padding: 75px 0;">
    <div class="container">
      <div class="about-story-grid" style="padding: 0; align-items: start;">
        <div>
          <div class="section-tagline" style="display: inline-flex; align-items: center; gap: 8px; color: #e60000; font-weight: 700; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 12px;">
            <i class="fa-solid fa-shield-halved"></i> About Sigma Height Elevators L.L.C.
          </div>
          <h2 style="font-size: clamp(1.9rem, 3vw, 2.5rem); font-weight: 800; color: #0f172a; line-height: 1.25; margin-bottom: 20px;">
            Complete Elevator Solutions Across <span style="color: #ff3333;">Dubai and the UAE</span>
          </h2>
          
          <div style="color: #334155; font-size: 1.08rem; line-height: 1.75; margin-bottom: 18px; font-weight: 500;">
            Sigma Height Elevators L.L.C. is a Dubai-based elevator company providing complete <strong>elevator supply, installation, testing, commissioning, maintenance, repair and modernization</strong> services across the UAE.
          </div>

          <div style="color: #64748b; font-size: 1.02rem; line-height: 1.7; margin-bottom: 28px;">
            Our engineering solutions combine modern technology, safe operation, energy efficiency and responsive after-sales support.
          </div>

          <!-- 4 Core Pillars Grid -->
          <div class="about-pillars" style="margin-bottom: 30px;">
            <div class="about-pillar-item">
              <div class="about-pillar-icon-box">
                <i class="fa-solid fa-screwdriver-wrench"></i>
              </div>
              <div class="about-pillar-content">
                <div class="about-pillar-title">Turnkey Elevator Installation</div>
                <p class="about-pillar-desc">Complete project coordination, supply, installation, testing and commissioning for new residential, commercial and industrial elevators.</p>
              </div>
            </div>

            <div class="about-pillar-item">
              <div class="about-pillar-icon-box">
                <i class="fa-solid fa-shield-halved"></i>
              </div>
              <div class="about-pillar-content">
                <div class="about-pillar-title">UAE Safety &amp; Engineering Standards</div>
                <p class="about-pillar-desc">Elevator systems engineered to applicable UAE authority requirements and safety standards, including <strong style="color: #0f172a;">EN 81-20 &amp; EN 81-50</strong>.</p>
              </div>
            </div>

            <div class="about-pillar-item">
              <div class="about-pillar-icon-box">
                <i class="fa-solid fa-clock-rotate-left"></i>
              </div>
              <div class="about-pillar-content">
                <div class="about-pillar-title">24/7 Maintenance &amp; Lift Repair</div>
                <p class="about-pillar-desc">Preventive AMC services, technical diagnostics, emergency breakdown support and genuine parts for various lift makes.</p>
              </div>
            </div>

            <div class="about-pillar-item">
              <div class="about-pillar-icon-box">
                <i class="fa-solid fa-arrows-rotate"></i>
              </div>
              <div class="about-pillar-content">
                <div class="about-pillar-title">Elevator Modernization &amp; Customization</div>
                <p class="about-pillar-desc">Controller, VVVF drive, machine, door and luxury cabin upgrades to improve safety, ride quality and energy performance.</p>
              </div>
            </div>
          </div>

          <div class="about-stat-strip">
            <div class="stat-box">
              <div class="stat-val"><?= !empty($about['experience_years']) ? htmlspecialchars($about['experience_years']) : 'Since 2016' ?></div>
              <div class="stat-name">Serving the UAE</div>
            </div>
            <div class="stat-box" style="border-left: 1px solid #f1f5f9; border-right: 1px solid #f1f5f9;">
              <div class="stat-val"><?= !empty($about['elevators_installed']) ? htmlspecialchars($about['elevators_installed']) : '500+' ?></div>
              <div class="stat-name">Elevators Installed</div>
            </div>
            <div class="stat-box">
              <div class="stat-val"><?= !empty($about['client_satisfaction']) ? htmlspecialchars($about['client_satisfaction']) : '100%' ?></div>
              <div class="stat-name">EN 81-20/50 Certified</div>
            </div>
          </div>
        </div>

        <div>
          <?php
            $raw_img = !empty($about['image']) ? str_replace('\\', '/', trim($about['image'])) : '';
            if (empty($raw_img)) {
                $about_img_src = base_url('assets/images/about_home_elevator.jpg');
            } elseif (strpos($raw_img, 'http://') === 0 || strpos($raw_img, 'https://') === 0) {
                $about_img_src = $raw_img;
            } else {
                $about_img_src = base_url(ltrim($raw_img, '/'));
            }
          ?>
          <div class="about-page-media-card" style="opacity: 1 !important; transform: none !important; visibility: visible !important; display: block !important; width: 100%; min-height: 520px; height: 520px; border-radius: 20px; overflow: hidden; position: relative; background: #0f172a; box-shadow: 0 20px 45px rgba(0,0,0,0.14);">
            <img src="<?= $about_img_src ?>" 
                 alt="Sigma Height Elevators - Luxury Elevator Interior Dubai" 
                 loading="eager"
                 style="width: 100% !important; height: 100% !important; object-fit: cover !important; display: block !important; opacity: 1 !important; visibility: visible !important; transform: none !important;"
                 onerror="this.onerror=null; this.src='<?= base_url('assets/images/about_home_elevator.jpg') ?>';">
            
            <!-- Prominent Banner from Document: SERVING THE UAE SINCE 2016 -->
            <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: #2563eb; background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%); border: 1px solid rgba(255, 255, 255, 0.25); padding: 14px 20px; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #ffffff; z-index: 2; box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);">
              <div style="font-weight: 800; font-size: 1.05rem; letter-spacing: 1.5px; text-transform: uppercase; text-align: center; color: #ffffff;">
                <i class="fa-solid fa-award me-2" style="color: #fbbf24;"></i> SERVING THE UAE SINCE 2016
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MISSION & VISION SECTION -->
  <section style="padding: 80px 0; background: #ffffff;">
    <div class="container">
      <div class="row g-4" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
        <div>
          <div class="mv-card">
            <div class="mv-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h3 style="font-size: 1.45rem; font-weight: 700; color: #0f172a; margin-bottom: 14px;">Our Core Mission</h3>
            <p style="color: #64748b; font-size: 1rem; line-height: 1.7; margin: 0;">
              Providing turnkey project coordination, safe operation, and precision engineering compliant with EN 81-20 and EN 81-50 standards, backed by dedicated 24/7 after-sales technical support.
            </p>
          </div>
        </div>
        <div>
          <div class="mv-card">
            <div class="mv-icon"><i class="fa-solid fa-compass"></i></div>
            <h3 style="font-size: 1.45rem; font-weight: 700; color: #0f172a; margin-bottom: 14px;">Our Strategic Vision</h3>
            <p style="color: #64748b; font-size: 1rem; line-height: 1.7; margin: 0;">
              To be the most trusted elevator solutions partner across Dubai and the UAE for new supply & installations, preventive AMC maintenance, and advanced elevator modernization.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA BANNER -->
  <section style="background: #0f172a; color: #ffffff; padding: 70px 0; text-align: center;">
    <div class="container">
      <h2 style="font-size: 2.2rem; font-weight: 700; margin-bottom: 14px;">Ready to Elevate Your Building's Architecture?</h2>
      <p style="color: #94a3b8; max-width: 600px; margin: 0 auto 28px; font-size: 1.05rem;">Schedule a site visit with our senior elevator engineers anywhere in Dubai or across the UAE.</p>
      <a href="<?= site_url('contact') ?>" class="btn-primary" style="display: inline-flex; padding: 14px 34px;">
        Contact Our Engineering Desk
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </section>

<?php $this->load->view('includes/footer'); ?>

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
    background: #e60000;
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
    color: #e60000;
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
    background: rgba(230, 0, 0, 0.08);
    color: #e60000;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
  }
</style>

  <!-- HERO BANNER (REDUCED COMPACT HEIGHT & PROFESSIONAL DESIGN) -->
  <section class="page-hero-banner">
    <div class="container">
      <div class="page-hero-tag">
        <span class="tag-line"></span>
        <span>About Sigma Height Elevators</span>
      </div>
      <h1 class="page-hero-title"><?= htmlspecialchars($about['title']) ?></h1>
      <p class="page-hero-subtitle">
        <?= htmlspecialchars($about['subtitle']) ?>
      </p>
    </div>
  </section>

  <!-- COMPANY STORY SECTION -->
  <section class="section-wrapper" style="background: #f8fafc; padding: 70px 0;">
    <div class="container">
      <div class="about-story-grid" style="padding: 0;">
        <div>
          <span style="color: #e60000; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 0.88rem; display: block; margin-bottom: 10px;">Who We Are</span>
          <h2 style="font-size: 2.2rem; font-weight: 800; color: #0f172a; line-height: 1.3; margin-bottom: 24px;">Setting the Gold Standard in Vertical Transportation</h2>
          <div style="color: #475569; font-size: 1.05rem; line-height: 1.8; margin-bottom: 24px;">
            <?= nl2br(htmlspecialchars($about['story'])) ?>
          </div>

          <div class="about-stat-strip">
            <div class="stat-box">
              <div class="stat-val"><?= htmlspecialchars($about['experience_years']) ?></div>
              <div class="stat-name">UAE Experience</div>
            </div>
            <div class="stat-box" style="border-left: 1px solid #f1f5f9; border-right: 1px solid #f1f5f9;">
              <div class="stat-val"><?= htmlspecialchars($about['elevators_installed']) ?></div>
              <div class="stat-name">Elevators Installed</div>
            </div>
            <div class="stat-box">
              <div class="stat-val"><?= htmlspecialchars($about['client_satisfaction']) ?></div>
              <div class="stat-name">Client Rating</div>
            </div>
          </div>
        </div>

        <div>
          <?php
            $raw_img = !empty($about['image']) ? str_replace('\\', '/', trim($about['image'])) : '';
            if (empty($raw_img)) {
                $about_img_src = base_url('assets/images/about_elevator.jpg');
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
                 onerror="this.onerror=null; this.src='<?= base_url('assets/images/about_elevator.jpg') ?>';">
            
            <!-- Professional Clean Floating Badge Inside Image Box -->
            <div style="position: absolute; bottom: 18px; left: 18px; right: 18px; background: rgba(15, 23, 42, 0.88); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.12); padding: 12px 18px; border-radius: 12px; display: flex; align-items: center; justify-content: space-between; color: #ffffff; z-index: 2;">
              <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 34px; height: 34px; border-radius: 8px; background: rgba(230, 0, 0, 0.2); border: 1px solid rgba(230, 0, 0, 0.4); display: flex; align-items: center; justify-content: center; color: #ff4d4d; font-size: 0.95rem;">
                  <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                  <div style="font-weight: 700; font-size: 0.88rem; color: #ffffff; line-height: 1.2;">Dubai Civil Defense Certified</div>
                  <div style="font-size: 0.74rem; color: #94a3b8;">EN 81-20/50 European Safety Standards</div>
                </div>
              </div>
              <div style="font-size: 0.72rem; font-weight: 700; color: #22c55e; background: rgba(34, 197, 94, 0.12); border: 1px solid rgba(34, 197, 94, 0.3); padding: 3px 8px; border-radius: 20px;">
                <i class="fa-solid fa-circle-check" style="margin-right: 3px;"></i> Certified
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
              <?= nl2br(htmlspecialchars($about['mission'])) ?>
            </p>
          </div>
        </div>
        <div>
          <div class="mv-card">
            <div class="mv-icon"><i class="fa-solid fa-compass"></i></div>
            <h3 style="font-size: 1.45rem; font-weight: 700; color: #0f172a; margin-bottom: 14px;">Our Strategic Vision</h3>
            <p style="color: #64748b; font-size: 1rem; line-height: 1.7; margin: 0;">
              <?= nl2br(htmlspecialchars($about['vision'])) ?>
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

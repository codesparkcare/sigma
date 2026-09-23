<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$title = 'Elevator Services & Solutions | Sigma Height Elevators Dubai';
$meta_description = 'Explore precision-engineered elevator services in Dubai: new installation, 24/7 maintenance AMC, emergency repairs, modernization, and luxury villa lifts.';
$this->load->view('includes/header', ['title' => $title, 'meta_description' => $meta_description]);
?>

<style>
  /* Dedicated Page Hero Banner */
  .page-hero-banner {
    position: relative;
    background: linear-gradient(135deg, #090d16 0%, #111827 100%);
    padding: 140px 0 80px;
    color: #ffffff;
    overflow: hidden;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }
  .page-hero-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 80% 20%, rgba(230, 0, 0, 0.25), transparent 60%);
    pointer-events: none;
  }
  .breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.88rem;
    color: #94a3b8;
    margin-bottom: 16px;
  }
  .breadcrumb-nav a {
    color: #e2e8f0;
    text-decoration: none;
    transition: color 0.2s;
  }
  .breadcrumb-nav a:hover {
    color: #ff3333;
  }
  .page-hero-title {
    font-size: clamp(2.2rem, 4vw, 3.4rem);
    font-weight: 800;
    margin-bottom: 16px;
    letter-spacing: -0.5px;
  }
  .page-hero-title span {
    color: #ff2a2a;
  }
  .page-hero-desc {
    font-size: 1.1rem;
    color: #cbd5e1;
    max-width: 680px;
    line-height: 1.6;
  }

  /* Dedicated Services Cards */
  .dedicated-service-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
  }
  .dedicated-service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 35px rgba(0,0,0,0.08);
    border-color: rgba(230, 0, 0, 0.3);
  }
  .card-img-wrapper {
    position: relative;
    height: 240px;
    overflow: hidden;
    background: #0f172a;
  }
  .card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .dedicated-service-card:hover .card-img-wrapper img {
    transform: scale(1.08);
  }
  .card-category-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(8px);
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  .service-card-body {
    padding: 28px 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }
  .service-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 12px;
    line-height: 1.3;
  }
  .service-desc {
    color: #64748b;
    font-size: 0.94rem;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
  }
  .feature-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
    border-top: 1px solid #f1f5f9;
    padding-top: 18px;
  }
  .feature-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.88rem;
    color: #334155;
    margin-bottom: 8px;
  }
  .feature-list li i {
    color: #16a34a;
    font-size: 0.85rem;
  }
  .card-action-row {
    display: flex;
    align-items: center;
    gap: 12px;
    border-top: 1px solid #f1f5f9;
    padding-top: 18px;
  }
  .btn-detail {
    flex: 1;
    text-align: center;
    padding: 10px 16px;
    background: #f8fafc;
    color: #0f172a;
    font-weight: 600;
    font-size: 0.88rem;
    border-radius: 8px;
    text-decoration: none;
    border: 1px solid #e2e8f0;
    transition: all 0.2s;
  }
  .btn-detail:hover {
    background: #0f172a;
    color: #ffffff;
    border-color: #0f172a;
  }
  .btn-quote {
    flex: 1;
    text-align: center;
    padding: 10px 16px;
    background: #e11d48;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.88rem;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s;
  }
  .btn-quote:hover {
    background: #be123c;
    color: #ffffff;
    box-shadow: 0 4px 14px rgba(225, 29, 72, 0.35);
  }
</style>

  <!-- PAGE HERO BANNER -->
  <section class="page-hero-banner">
    <div class="container">
      <div class="breadcrumb-nav">
        <a href="<?= site_url('') ?>"><i class="fa-solid fa-house"></i> Home</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Our Services</span>
      </div>
      <h1 class="page-hero-title">Expert Elevator Services & <span>Vertical Solutions</span></h1>
      <p class="page-hero-desc">From bespoke luxury villa lifts to commercial high-speed towers, our precision-engineered elevator services comply with strict Dubai Civil Defense and European EN-81 safety standards.</p>
    </div>
  </section>

  <!-- MAIN SERVICES GRID SECTION -->
  <section class="section-wrapper" style="background: #f8fafc; padding: 80px 0;">
    <div class="container">
      <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 32px;">
        <?php if (!empty($services)): ?>
          <?php foreach ($services as $srv): ?>
            <div class="dedicated-service-card">
              <div class="card-img-wrapper">
                <img src="<?= base_url(!empty($srv['image']) ? $srv['image'] : 'assets/images/service_passenger.jpg') ?>" alt="<?= htmlspecialchars($srv['title']) ?>">
                <span class="card-category-badge"><i class="fa-solid fa-shield-halved text-danger me-1"></i> Dubai Certified</span>
              </div>
              <div class="service-card-body">
                <h2 class="service-title"><?= htmlspecialchars($srv['title']) ?></h2>
                <p class="service-desc"><?= htmlspecialchars($srv['short_desc']) ?></p>

                <?php if (!empty($srv['features'])): ?>
                  <?php 
                    $feats = explode("\n", trim($srv['features']));
                    $feats = array_slice($feats, 0, 3);
                  ?>
                  <ul class="feature-list">
                    <?php foreach ($feats as $f): ?>
                      <?php if (trim($f)): ?>
                        <li><i class="fa-solid fa-check-circle"></i> <span><?= htmlspecialchars(trim($f)) ?></span></li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>

                <div class="card-action-row">
                  <a href="<?= site_url('') ?>#contact" class="btn-quote" style="width: 100%; text-align: center;">
                    <?= htmlspecialchars($srv['button_text']) ?> <i class="fa-solid fa-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="grid-column: 1 / -1; text-align: center; padding: 60px 0; color: #64748b;">
            <p>No services currently available.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- CTA BANNER SECTION -->
  <section style="background: #0f172a; color: #ffffff; padding: 70px 0; text-align: center; border-top: 1px solid rgba(255,255,255,0.05);">
    <div class="container">
      <h2 style="font-size: 2.2rem; font-weight: 700; margin-bottom: 16px;">Need a Custom Elevator Built for Your Property?</h2>
      <p style="color: #94a3b8; max-width: 600px; margin: 0 auto 30px; font-size: 1.05rem;">Our certified vertical mobility specialists offer complimentary site visits and architectural drawings across Dubai and the UAE.</p>
      <a href="<?= site_url('') ?>#contact" class="btn-primary" style="display: inline-flex; font-size: 1rem; padding: 14px 32px;">
        Request Complimentary Site Survey
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </section>

<?php $this->load->view('includes/footer'); ?>

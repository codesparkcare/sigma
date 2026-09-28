<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$title = 'Elevator Models & Product Range | Sigma Height Elevators Dubai';
$meta_description = 'Explore Sigma Height Elevators full product line: luxury villa lifts, panoramic glass elevators, high-speed passenger elevators, hospital, and freight cargo lifts in UAE.';
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
    max-width: 720px;
    line-height: 1.6;
  }

  /* Product Catalog Grid */
  .products-catalog-section {
    padding: 90px 0;
    background: #f8fafc;
  }
  .products-catalog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 32px;
    margin-bottom: 70px;
  }
  .product-catalog-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    overflow: hidden;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    flex-direction: column;
    height: 100%;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  }
  .product-catalog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 45px rgba(0, 0, 0, 0.09);
    border-color: rgba(230, 0, 0, 0.35);
  }
  .product-card-img-wrapper {
    position: relative;
    height: 250px;
    overflow: hidden;
    background: #0b1120;
  }
  .product-card-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
  }
  .product-catalog-card:hover .product-card-img-wrapper img {
    transform: scale(1.08);
  }
  .product-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    background: rgba(15, 23, 42, 0.88);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 6px 14px;
    border-radius: 20px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }
  .product-accent-line {
    height: 3px;
    background: linear-gradient(90deg, #e60000, #ff5555, transparent);
  }
  .product-card-body {
    padding: 28px 24px 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }
  .product-model-title {
    font-size: 1.32rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 8px;
    line-height: 1.35;
  }
  .product-model-subtitle {
    font-size: 0.84rem;
    color: #e60000;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 14px;
  }
  .product-model-desc {
    font-size: 0.94rem;
    color: #475569;
    line-height: 1.65;
    margin-bottom: 24px;
    flex-grow: 1;
  }
  .product-card-footer {
    padding-top: 18px;
    border-top: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .product-btn-quote {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #0f172a;
    color: #ffffff;
    font-size: 0.88rem;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.25s ease;
  }
  .product-btn-quote:hover {
    background: #e60000;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(230, 0, 0, 0.3);
  }
  .product-direct-call {
    font-size: 0.84rem;
    color: #64748b;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
  }
  .product-direct-call:hover {
    color: #e60000;
  }

  /* Bottom Customized Solution Banner */
  .custom-solution-banner {
    background: linear-gradient(135deg, #090d16 0%, #171f30 100%);
    border-radius: 24px;
    padding: 56px 48px;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.08);
  }
  .custom-solution-banner::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -20%;
    width: 450px;
    height: 450px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(230, 0, 0, 0.2) 0%, transparent 70%);
    pointer-events: none;
  }
  @media (max-width: 768px) {
    .custom-solution-banner {
      flex-direction: column;
      text-align: center;
      padding: 40px 24px;
    }
  }
</style>

<!-- ==========================================================================
     PAGE HERO BANNER
     ========================================================================== -->
<?php 
  $hero_slide = !empty($sliders) ? $sliders[0] : null;
  $hero_bg = ($hero_slide && !empty($hero_slide['image'])) ? base_url($hero_slide['image']) : null;
  $hero_btn_link = $hero_slide ? $hero_slide['button_link'] : 'contact';
  $hero_href = (strpos($hero_btn_link, 'http') === 0 || strpos($hero_btn_link, '#') === 0) ? $hero_btn_link : site_url($hero_btn_link);
?>
<section class="page-hero-banner" style="<?= $hero_bg ? "background: linear-gradient(rgba(9, 13, 22, 0.88), rgba(17, 24, 39, 0.94)), url('{$hero_bg}') center/cover no-repeat;" : '' ?>">
  <div class="container position-relative" style="z-index: 2;">
    <div class="breadcrumb-nav">
      <a href="<?= site_url('') ?>"><i class="fa-solid fa-house" style="font-size:0.8rem; margin-right:4px;"></i> Home</a>
      <span>/</span>
      <span style="color: #ff3333; font-weight: 600;">Products</span>
    </div>
    <?php if ($hero_slide && !empty($hero_slide['badge_text'])): ?>
      <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(230,0,0,0.18); border: 1px solid rgba(230,0,0,0.4); color: #ff6666; font-size: 0.82rem; font-weight: 600; padding: 5px 14px; border-radius: 30px; margin-bottom: 14px;">
        <i class="fa-solid fa-certificate"></i> <?= htmlspecialchars($hero_slide['badge_text']) ?>
      </div>
    <?php endif; ?>
    <h1 class="page-hero-title">
      <?= $hero_slide ? htmlspecialchars($hero_slide['title']) : 'Elevator Models &amp;' ?> 
      <span><?= $hero_slide ? htmlspecialchars($hero_slide['highlight_text']) : 'Product Catalog' ?></span>
    </h1>
    <p class="page-hero-desc">
      <?= $hero_slide ? htmlspecialchars($hero_slide['subtitle']) : 'Discover our complete collection of certified vertical transportation systems designed for luxury private residences, residential villas, commercial high-rises, healthcare centers, and industrial facilities across Dubai and the UAE.' ?>
    </p>
    <?php if ($hero_slide && !empty($hero_slide['button_text'])): ?>
      <div style="margin-top: 24px;">
        <a href="<?= $hero_href ?>" class="btn-theme text-white" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 26px; border-radius: 8px; text-decoration: none; font-weight: 600;">
          <span><?= htmlspecialchars($hero_slide['button_text']) ?></span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ==========================================================================
     PRODUCTS CATALOG SHOWCASE
     ========================================================================== -->
<section class="products-catalog-section">
  <div class="container">

    <div class="section-header-center" style="margin-bottom: 50px;">
      <div class="section-tagline">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <rect x="3" y="3" width="7" height="7" />
          <rect x="14" y="3" width="7" height="7" />
          <rect x="14" y="14" width="7" height="7" />
          <rect x="3" y="14" width="7" height="7" />
        </svg>
        ENGINEERED MOBILITY MODELS
      </div>
      <h2 class="section-title">Premium Elevator Systems <span class="accent">Engineered in UAE</span></h2>
      <p class="section-desc">Every model is precision-manufactured to European EN81 standards, fully approved by Dubai Civil Defense, and backed by comprehensive lifetime AMC warranty support.</p>
    </div>

    <!-- Products Grid -->
    <div class="products-catalog-grid">
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $prod): ?>
          <div class="product-catalog-card">
            <div class="product-card-img-wrapper">
              <img src="<?= base_url($prod['image']) ?>" alt="<?= htmlspecialchars($prod['title']) ?>" loading="lazy">
              <?php if (!empty($prod['subtitle'])): ?>
                <div class="product-badge"><?= htmlspecialchars($prod['subtitle']) ?></div>
              <?php endif; ?>
            </div>
            <div class="product-accent-line"></div>
            <div class="product-card-body">
              <h3 class="product-model-title"><?= htmlspecialchars($prod['title']) ?></h3>
              <?php if (!empty($prod['subtitle'])): ?>
                <div class="product-model-subtitle"><?= htmlspecialchars($prod['subtitle']) ?></div>
              <?php endif; ?>
              <p class="product-model-desc"><?= nl2br(htmlspecialchars($prod['description'])) ?></p>

              <div class="product-card-footer">
                <a href="<?= site_url('contact') ?>?product=<?= urlencode($prod['title']) ?>" class="product-btn-quote">
                  <span>Get A Quote</span>
                  <i class="fa-solid fa-arrow-right" style="font-size: 0.8rem;"></i>
                </a>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $contact['emergency_phone'] ?? '052-6405622') ?>" class="product-direct-call" title="Call Engineering Desk">
                  <i class="fa-solid fa-phone" style="color: #e60000;"></i>
                  <span>Call Us</span>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #fff; border-radius: 16px;">
          <p class="text-muted">No products catalog items found at this moment.</p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Bottom CTA Banner -->
    <div class="custom-solution-banner">
      <div>
        <div style="font-size: 0.85rem; color: #ff3333; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">
          <i class="fa-solid fa-compass-drafting me-1"></i> Custom Architectural Lift Design
        </div>
        <h3 style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; margin-bottom: 12px;">Need A Custom Elevator Engineered For Your Floor Plan?</h3>
        <p style="color: #cbd5e1; max-width: 600px; font-size: 0.95rem; margin-bottom: 0;">
          Our structural and mechanical engineering team in Dubai creates custom cabin geometry, titanium finishes, and custom pitless shafts to match your architectural vision.
        </p>
      </div>
      <div style="flex-shrink: 0;">
        <a href="<?= site_url('contact') ?>" class="btn-primary" style="padding: 14px 28px; font-size: 0.95rem;">
          <span>Request Free Site Survey</span>
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>

  </div>
</section>

<?php $this->load->view('includes/footer'); ?>

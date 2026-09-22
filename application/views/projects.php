<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$title = 'Elevator Projects & Installations Portfolio | Sigma Height Elevators Dubai';
$meta_description = 'Discover signature elevator projects installed across Dubai and UAE including luxury villa panoramic lifts, high-speed commercial towers, and custom glass elevators.';
$this->load->view('includes/header', ['title' => $title, 'meta_description' => $meta_description]);
?>

<style>
  .page-hero-banner {
    position: relative;
    background: linear-gradient(135deg, #090d16 0%, #111827 100%);
    padding: 140px 0 80px;
    color: #ffffff;
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
  }
  .breadcrumb-nav a:hover {
    color: #ff3333;
  }
  .page-hero-title {
    font-size: clamp(2.2rem, 4vw, 3.4rem);
    font-weight: 800;
    margin-bottom: 16px;
  }
  .page-hero-title span {
    color: #ff2a2a;
  }

  /* Category Filter Navigation */
  .filter-bar {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 40px 0 50px;
    justify-content: center;
  }
  .filter-btn {
    padding: 9px 20px;
    border-radius: 30px;
    background: #ffffff;
    color: #334155;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    border: 1px solid #e2e8f0;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .filter-btn:hover, .filter-btn.active {
    background: #e60000;
    color: #ffffff;
    border-color: #e60000;
    box-shadow: 0 4px 14px rgba(230, 0, 0, 0.3);
  }

  /* Projects Grid */
  .projects-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 32px;
    margin-bottom: 70px;
  }
  .project-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
  }
  .project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 22px 40px rgba(0,0,0,0.09);
    border-color: rgba(230, 0, 0, 0.3);
  }
  .project-image-box {
    position: relative;
    height: 260px;
    overflow: hidden;
    background: #090d16;
  }
  .project-image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .project-card:hover .project-image-box img {
    transform: scale(1.08);
  }
  .project-cat-pill {
    position: absolute;
    top: 16px;
    left: 16px;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(8px);
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.2);
  }
  .project-card-body {
    padding: 26px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }
  .project-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 10px;
    line-height: 1.35;
  }
  .project-meta-row {
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 0.85rem;
    color: #64748b;
    margin-bottom: 14px;
  }
  .project-meta-row i {
    color: #e60000;
    margin-right: 4px;
  }
  .project-desc-text {
    color: #64748b;
    font-size: 0.92rem;
    line-height: 1.6;
    margin-bottom: 22px;
    flex-grow: 1;
  }
  .project-card-cta {
    padding-top: 18px;
    border-top: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .project-view-link {
    color: #0f172a;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: color 0.2s;
  }
  .project-view-link:hover {
    color: #e60000;
  }
</style>

  <!-- HERO BANNER -->
  <section class="page-hero-banner">
    <div class="container">
      <div class="breadcrumb-nav">
        <a href="<?= site_url('') ?>"><i class="fa-solid fa-house"></i> Home</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Projects Showcase</span>
      </div>
      <h1 class="page-hero-title">Our Landmark Elevator <span>Projects Portfolio</span></h1>
      <p style="color: #cbd5e1; max-width: 680px; font-size: 1.1rem; line-height: 1.6;">
        Explore our completed installations across Palm Jumeirah villas, Emirates Hills estates, Downtown business towers, and luxury hotel atriums in Dubai.
      </p>
    </div>
  </section>

  <!-- MAIN PROJECTS SECTION -->
  <section style="background: #f8fafc; padding: 40px 0 80px;">
    <div class="container">

      <!-- Categories Filter Navigation -->
      <div class="filter-bar">
        <a href="<?= site_url('projects') ?>" class="filter-btn <?= empty($category) ? 'active' : '' ?>">
          All Installations
        </a>
        <?php if (!empty($categories)): ?>
          <?php foreach ($categories as $cat): ?>
            <a href="<?= site_url('projects?category=' . urlencode($cat)) ?>" class="filter-btn <?= ($category === $cat) ? 'active' : '' ?>">
              <?= htmlspecialchars($cat) ?>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Projects Grid -->
      <div class="projects-grid-container">
        <?php if (!empty($projects)): ?>
          <?php foreach ($projects as $p): ?>
            <div class="project-card">
              <div class="project-image-box">
                <img src="<?= base_url(!empty($p['image']) ? $p['image'] : 'assets/images/hero_panoramic.jpg') ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                <span class="project-cat-pill"><?= htmlspecialchars($p['category']) ?></span>
              </div>
              <div class="project-card-body">
                <h2 class="project-title"><?= htmlspecialchars($p['title']) ?></h2>
                <div class="project-meta-row">
                  <span><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($p['location']) ?></span>
                  <span><i class="fa-solid fa-calendar"></i> <?= htmlspecialchars($p['completion_year']) ?></span>
                </div>
                <p class="project-desc-text">
                  <?= htmlspecialchars($p['description']) ?>
                </p>
                <div class="project-card-cta">
                  <span class="text-muted" style="font-size: 0.82rem;">Client: <?= htmlspecialchars($p['client_name']) ?></span>
                  <a href="<?= site_url('') ?>#contact" class="project-view-link">
                    Enquire Now <i class="fa-solid fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="grid-column: 1 / -1; text-align: center; padding: 60px 0; color: #64748b;">
            <p>No projects found in this category.</p>
            <a href="<?= site_url('projects') ?>" class="btn-primary" style="display: inline-flex; margin-top: 10px;">View All Projects</a>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </section>

<?php $this->load->view('includes/footer'); ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$cur = uri_string();
$is_home     = ($cur == '' || $cur == 'welcome' || $cur == 'welcome/index');
$is_about    = ($cur == 'about' || $cur == 'welcome/about');
$is_services = (strpos($cur, 'services') === 0 || strpos($cur, 'service') === 0);
$is_projects = (strpos($cur, 'projects') === 0 || strpos($cur, 'project') === 0);
$is_contact  = ($cur == 'contact' || $cur == 'welcome/contact');

if ($is_about) {
    $active_page_name     = 'ABOUT US';
    $active_floor_code    = '01';
    $active_arrival_title = 'ARRIVED • ABOUT SIGMA HEIGHT';
} elseif ($is_services) {
    $active_page_name     = 'SERVICES';
    $active_floor_code    = '02';
    $active_arrival_title = 'ARRIVED • ELEVATOR SERVICES';
} elseif ($is_projects) {
    $active_page_name     = 'PROJECTS';
    $active_floor_code    = '03';
    $active_arrival_title = 'ARRIVED • SIGNATURE PROJECTS';
} elseif ($is_contact) {
    $active_page_name     = 'CONTACT US';
    $active_floor_code    = '04';
    $active_arrival_title = 'ARRIVED • CONTACT & SUPPORT';
} else {
    $active_page_name     = 'HOME';
    $active_floor_code    = 'L';
    $active_arrival_title = 'ARRIVED • MAIN LOBBY';
}

$meta_title = !empty($title) ? $title : 'Sigma Height Elevators L.L.C | Luxury & Commercial Elevators Dubai, UAE';
$meta_desc  = !empty($meta_description) ? $meta_description : 'Sigma Height Elevators LLC is Dubai\'s leading elevator company specializing in luxury home elevators, passenger, panoramic glass lifts, hospital, freight elevators, dumbwaiters, and escalators with precision engineering and Dubai Civil Defense certification.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($meta_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
  <meta name="keywords" content="Elevator company Dubai, home elevators Dubai, passenger lifts UAE, panoramic glass elevators, dumbwaiter Dubai, hospital bed elevator, escalators Dubai, lift maintenance AMC">
  <meta name="author" content="Sigma Height Elevators L.L.C">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta_desc) ?>">
  <meta property="og:image" content="<?= $base_url ?>assets/Sigma-Elevator-White-logo.png">
  <meta property="og:type" content="website">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="<?= $base_url ?>assets/favicon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $base_url ?>assets/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $base_url ?>assets/favicon-16x16.png">
  <link rel="shortcut icon" href="<?= $base_url ?>assets/favicon.ico">
  <link rel="apple-touch-icon" href="<?= $base_url ?>assets/favicon.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Syne:wght@600;700;800&family=JetBrains+Mono:wght@500;700;800&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
</head>
<body>

  <!-- ==========================================================================
       AUTHENTIC LUXURY PASSENGER LIFT PRELOADER WITH MOTORIZED SLIDING DOORS
       ========================================================================== -->
  <div class="elevator-preloader" id="elevatorPreloader" role="dialog" aria-label="Loading Sigma Height Elevators"
       data-page="<?= htmlspecialchars($active_page_name) ?>"
       data-floor="<?= htmlspecialchars($active_floor_code) ?>"
       data-arrival="<?= htmlspecialchars($active_arrival_title) ?>">
    
    <!-- Realistic Elevator Hallway / Wall Frame -->
    <div class="preloader-hallway-frame">
      <div class="hallway-top-casing"></div>
      <div class="hallway-left-jamb"></div>
      <div class="hallway-right-jamb"></div>
    </div>

    <!-- Revealed Elevator Cabin Interior (Inside Stage) -->
    <div class="preloader-cabin-stage">
      <!-- Realistic Cabin Ceiling with Recessed Downlights -->
      <div class="cabin-ceiling-bar">
        <div class="ceiling-spot light-left"></div>
        <div class="ceiling-spot light-center"></div>
        <div class="ceiling-spot light-right"></div>
      </div>

      <div class="preloader-ambient-glow"></div>
      <div class="preloader-starlight-pattern"></div>
      
      <!-- Luxury Cabin Interior Wall Panels -->
      <div class="cabin-wall-panels">
        <div class="cabin-wall-panel left"></div>
        <div class="cabin-wall-panel center"></div>
        <div class="cabin-wall-panel right"></div>
      </div>

      <!-- Brand Logo Showcase inside Cabin -->
      <div class="preloader-logo-showcase" id="preloaderLogoShowcase">
        <div class="preloader-logo-frame">
          <div class="preloader-halo-pulse"></div>
          <img src="<?= $base_url ?>assets/Sigma-Elevator-White-logo.png" alt="Sigma Height Elevators Dubai" class="preloader-logo-img">
        </div>
        <div class="preloader-brand-motto">
          <span class="motto-tag">DUBAI, UAE</span>
          <span class="motto-sep">•</span>
          <span class="motto-tag">PRECISION ENGINEERING EXCELLENCE</span>
          <span class="motto-sep">•</span>
          <span class="motto-tag">EN 81-20/50 COMPLIANT</span>
        </div>
        <div class="preloader-progress-track">
          <div class="preloader-progress-bar" id="preloaderProgressBar"></div>
        </div>
        <div class="preloader-hint-skip">
          <i class="fa-solid fa-arrow-right-to-bracket" style="font-size:0.75rem; margin-right:4px;"></i> Click anywhere to enter
        </div>
      </div>

      <!-- Cabin Floor Threshold -->
      <div class="cabin-floor-sill-base">
        <div class="sill-marble-edge"></div>
        <div class="sill-track-grooves"></div>
      </div>
    </div>

    <!-- Upper Transom LCD Elevator Hall Floor Indicator HUD -->
    <div class="preloader-hall-architrave">
      <div class="preloader-hud-screen">
        <div class="hud-direction-indicator">
          <span class="hud-arrow-lamp" id="preloaderHudArrow">▲</span>
        </div>
        <div class="hud-center-data">
          <div class="hud-floor-code" id="preloaderFloorCode"><?= htmlspecialchars($active_floor_code) ?></div>
          <div class="hud-status-caption" id="preloaderStatusCaption"><?= htmlspecialchars($active_arrival_title) ?></div>
        </div>
        <div class="hud-telemetry-pill">
          <span class="hud-live-dot"></span>
          <span id="preloaderPageBadge"><?= htmlspecialchars($active_page_name) ?></span>
        </div>
      </div>
    </div>

    <!-- Heavy Architectural Brushed Metal Sliding Lift Doors -->
    <div class="preloader-doors-rig" id="preloaderDoorsRig">
      <!-- Top Door Hanger Track Header -->
      <div class="door-hanger-track">
        <div class="hanger-roller-rail"></div>
      </div>

      <!-- Left Door Leaf -->
      <div class="preloader-door-leaf door-left" id="preloaderDoorLeft">
        <div class="door-metallic-surface"></div>
        <div class="door-architectural-panel">
          <div class="panel-inner-recess"></div>
          <div class="panel-accent-line"></div>
        </div>
        <div class="door-vertical-groove"></div>
        <div class="door-vertical-gold-seam"></div>
        <div class="door-rubber-bumper-edge"></div>
        <div class="door-vertical-beveled-edge"></div>
        <div class="door-edge-light"></div>
      </div>

      <!-- Right Door Leaf -->
      <div class="preloader-door-leaf door-right" id="preloaderDoorRight">
        <div class="door-metallic-surface"></div>
        <div class="door-architectural-panel">
          <div class="panel-inner-recess"></div>
          <div class="panel-accent-line"></div>
        </div>
        <div class="door-vertical-groove"></div>
        <div class="door-vertical-gold-seam"></div>
        <div class="door-rubber-bumper-edge"></div>
        <div class="door-vertical-beveled-edge"></div>
        <div class="door-edge-light"></div>
      </div>

      <!-- Bottom Landing Floor Sill -->
      <div class="door-landing-sill">
        <div class="sill-plate-metal"></div>
        <div class="sill-recessed-guide-groove"></div>
      </div>
    </div>

    <!-- Central Vertical Arrival Laser Seal / Beam -->
    <div class="preloader-arrival-beam" id="preloaderArrivalBeam"></div>
  </div>

  <!-- ==========================================================================
       SITE TOPBAR
       ========================================================================== -->
  <div class="site-topbar">
    <div class="container topbar-content">
      <div class="topbar-left">
        <span class="topbar-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
            <circle cx="12" cy="10" r="3" />
          </svg>
          Office 402, Al Quoz 3, Sheikh Zayed Road, Dubai, UAE
        </span>
        <span class="topbar-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" />
            <polyline points="12 6 12 12 16 14" />
          </svg>
          Mon - Sat: 8:00 AM - 7:00 PM
        </span>
      </div>

      <div class="topbar-right">
        <button type="button" class="sound-toggle-btn" id="soundToggleBtn" aria-label="Toggle Elevator Sound Chimes" title="Toggle Elevator Chimes">
          <div class="sound-indicator-wave">
            <span></span><span></span><span></span>
          </div>
          <span id="soundToggleLabel">SOUND: ON</span>
        </button>
        <span class="topbar-item">
          <span class="topbar-badge">24/7 EMERGENCY</span>
          <a href="tel:+052-6405622" class="topbar-highlight">052-6405622</a>
        </span>
        <span class="topbar-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
          <a href="tel:+97142889120">+048858454</a>
        </span>
      </div>
    </div>
  </div>

  <!-- ==========================================================================
       STICKY NAVIGATION HEADER
       ========================================================================== -->
  <header class="site-header">
    <div class="container nav-container">
      <a href="<?= site_url('') ?>" class="brand-logo-link" aria-label="Sigma Height Elevators Home">
        <img src="<?= $base_url ?>assets/Sigma-Elevator-White-logo.png" alt="Sigma Height Elevators L.L.C" class="brand-logo-img">
      </a>

      <!-- Desktop Navigation Menu -->
      <nav class="nav-desktop">
        <ul class="nav-menu">
          <li class="nav-item"><a href="<?= site_url('') ?>" class="nav-link <?= $is_home ? 'active' : '' ?>">Home</a></li>
          <li class="nav-item"><a href="<?= site_url('about') ?>" class="nav-link <?= $is_about ? 'active' : '' ?>">About Us</a></li>
          <li class="nav-item"><a href="<?= site_url('services') ?>" class="nav-link <?= $is_services ? 'active' : '' ?>">Services</a></li>
          <li class="nav-item"><a href="<?= site_url('projects') ?>" class="nav-link <?= $is_projects ? 'active' : '' ?>">Projects</a></li>
          <li class="nav-item"><a href="<?= site_url('contact') ?>" class="nav-link <?= $is_contact ? 'active' : '' ?>">Contact Us</a></li>
        </ul>
      </nav>

      <!-- Header Actions -->
      <div class="nav-actions">
        <a href="<?= site_url('contact') ?>" class="header-cta-btn">
          <span>Get A Quote</span>
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7" />
          </svg>
        </a>

        <!-- Mobile Hamburger Button -->
        <button type="button" class="mobile-toggle-btn" id="mobileToggleBtn" aria-label="Toggle navigation menu">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Drawer Menu -->
  <div class="mobile-backdrop" id="mobileBackdrop"></div>
  <aside class="mobile-nav-drawer" id="mobileDrawer">
    <div>
      <img src="<?= $base_url ?>assets/Sigma-Elevator-White-logo.png" alt="Sigma Height Elevators" style="height: 44px; margin-bottom: 30px;">
      <ul class="mobile-menu-links">
        <li><a href="<?= site_url('') ?>" class="<?= $is_home ? 'active' : '' ?>">Home</a></li>
        <li><a href="<?= site_url('about') ?>" class="<?= $is_about ? 'active' : '' ?>">About Us</a></li>
        <li><a href="<?= site_url('services') ?>" class="<?= $is_services ? 'active' : '' ?>">Services</a></li>
        <li><a href="<?= site_url('projects') ?>" class="<?= $is_projects ? 'active' : '' ?>">Projects</a></li>
        <li><a href="<?= site_url('contact') ?>" class="<?= $is_contact ? 'active' : '' ?>">Contact Us</a></li>
      </ul>
    </div>
    <div>
      <a href="<?= site_url('contact') ?>" class="btn-primary" style="width: 100%; justify-content: center; margin-bottom: 16px;">Request Free Consultation</a>
      <div style="font-size: 0.85rem; color: #9ca3af; text-align: center;">
        Dubai Helpline: <a href="tel:+052-6405622" style="color: #ff3333; font-weight: bold;">052-6405622</a>
      </div>
    </div>
  </aside>

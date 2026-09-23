<!-- Sidebar -->
<aside id="sidebar">
    <div class="sidebar-brand">
        <img src="<?= base_url('assets/Sigma-Elevator-White-logo.png') ?>" alt="Sigma Elevators Logo">
        <div>
            <div class="brand-text">SIGMA HEIGHT</div>
            <div class="brand-sub">Admin Panel</div>
        </div>
    </div>

    <ul class="sidebar-nav">
        <li class="nav-section-title">Navigation</li>
        <li>
            <a href="<?= site_url('admin') ?>" class="<?= (uri_string() == 'admin' || uri_string() == 'admin/index' || uri_string() == '') ? 'active' : '' ?>">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-section-title">Website Content</li>
        <li>
            <a href="<?= site_url('admin/sliders') ?>" class="<?= strpos(uri_string(), 'admin/sliders') !== false || strpos(uri_string(), 'admin/slider') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-images"></i>
                <span>Hero Sliders</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('admin/services') ?>" class="<?= strpos(uri_string(), 'admin/services') !== false || strpos(uri_string(), 'admin/service') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <span>Services</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('admin/projects') ?>" class="<?= strpos(uri_string(), 'admin/projects') !== false || strpos(uri_string(), 'admin/project') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-building"></i>
                <span>Projects Portfolio</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('admin/reviews') ?>" class="<?= strpos(uri_string(), 'admin/reviews') !== false || strpos(uri_string(), 'admin/review') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-star"></i>
                <span>Client Reviews</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('admin/about') ?>" class="<?= strpos(uri_string(), 'admin/about') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-address-card"></i>
                <span>About Us Page</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('admin/contact_settings') ?>" class="<?= strpos(uri_string(), 'admin/contact_settings') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-phone"></i>
                <span>Contact Info</span>
            </a>
        </li>

        <li class="nav-section-title">Leads & Inquiries</li>
        <li>
            <a href="<?= site_url('admin/enquiries') ?>" class="<?= strpos(uri_string(), 'admin/enquiries') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-envelope-open-text"></i>
                <span>Customer Quotes</span>
            </a>
        </li>

        <li class="nav-section-title">System & Settings</li>
        <li>
            <a href="<?= site_url('admin/smtp_settings') ?>" class="<?= strpos(uri_string(), 'admin/smtp') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-envelope-circle-check"></i>
                <span>SMTP Configuration</span>
            </a>
        </li>

        <li class="nav-section-title">Live Site</li>
        <li>
            <a href="<?= site_url('') ?>" target="_blank">
                <i class="fa-solid fa-globe"></i>
                <span>View Live Website</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <div><strong>Sigma Height Elevators</strong></div>
        <small class="text-muted">Dubai, United Arab Emirates</small>
    </div>
</aside>

<!-- Main Container -->
<div class="main-container">
    <!-- Topbar Header -->
    <header class="admin-topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="toggle-btn" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
            <h5 class="m-0 fw-bold d-none d-sm-block text-dark"><?= isset($title) ? htmlspecialchars($title) : 'Dashboard' ?></h5>
        </div>

        <div class="topbar-right">
            <a href="<?= site_url('') ?>" target="_blank" class="live-site-btn">
                <i class="fa-solid fa-external-link"></i>
                <span>View Website</span>
            </a>
            <div class="dropdown border-start ps-3">
                <a href="javascript:void(0);" class="d-flex align-items-center gap-2 text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-none d-md-block text-end">
                        <div class="fw-bold text-dark" style="font-size: 0.88rem;"><?= htmlspecialchars($this->session->userdata('admin_name') ?: 'Admin') ?></div>
                        <div class="text-muted" style="font-size: 0.75rem;">@<?= htmlspecialchars($this->session->userdata('admin_username') ?: 'admin') ?></div>
                    </div>
                    <div style="width: 38px; height: 38px; border-radius: 50%; background: #e60000; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.9rem;">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><h6 class="dropdown-header">Signed in as <strong><?= htmlspecialchars($this->session->userdata('admin_username') ?: 'admin') ?></strong></h6></li>
                    <li><a class="dropdown-item" href="<?= site_url('admin/smtp_settings') ?>"><i class="fa-solid fa-envelope-circle-check text-muted me-2"></i> SMTP Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger fw-semibold" href="<?= site_url('admin/logout') ?>">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Page Content Holder -->
    <main class="page-content">
        <!-- Flash Message Alerts -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #16a34a !important;">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-circle-check text-success fs-5"></i>
                    <div><?= $this->session->flashdata('success') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-left: 4px solid #dc2626 !important;">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-danger fs-5"></i>
                    <div><?= $this->session->flashdata('error') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
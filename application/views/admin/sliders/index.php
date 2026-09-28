<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1">Page Sliders & Hero Banners</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage rotating banners, headings, badges, and CTA buttons across Homepage, Services, Products, Projects, Contact, and About pages.</p>
    </div>
    <a href="<?= site_url('admin/add_slider' . (!empty($selected_page) ? '?page=' . $selected_page : '')) ?>" class="btn btn-theme d-inline-flex align-items-center gap-2">
        <i class="fa-solid fa-plus"></i> Add New Slide / Banner
    </a>
</div>

<!-- Page Filter Navigation -->
<?php 
    $pages_list = [
        ''         => 'All Pages',
        'home'     => '🏠 Homepage',
        'services' => '🛠️ Services',
        'products' => '📦 Products',
        'projects' => '🏢 Projects',
        'contact'  => '📞 Contact',
        'about'    => 'ℹ️ About Us'
    ];
?>
<div class="d-flex flex-wrap gap-2 mb-4">
    <?php foreach ($pages_list as $key => $label): ?>
        <a href="<?= site_url('admin/sliders' . ($key !== '' ? '?page=' . $key : '')) ?>" 
           class="btn btn-sm <?= ($selected_page === $key || (empty($selected_page) && $key === '')) ? 'btn-dark fw-bold' : 'btn-outline-secondary' ?>" 
           style="border-radius: 20px; padding: 6px 16px;">
            <?= $label ?>
            <?php 
                $count = $this->Slider_model->count_total($key ?: null);
            ?>
            <span class="badge <?= ($selected_page === $key || (empty($selected_page) && $key === '')) ? 'bg-danger' : 'bg-secondary' ?> ms-1"><?= $count ?></span>
        </a>
    <?php endforeach; ?>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 80px;">Preview</th>
                    <th style="width: 130px;">Page</th>
                    <th>Heading & Highlight</th>
                    <th>Badge / Subtitle</th>
                    <th>Button</th>
                    <th style="width: 80px;">Order</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 150px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sliders)): ?>
                    <?php foreach ($sliders as $s): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url($s['image']) ?>" alt="<?= htmlspecialchars($s['title']) ?>" class="thumb-preview">
                            </td>
                            <td>
                                <?php 
                                    $p_val = !empty($s['page']) ? $s['page'] : 'home';
                                    $page_badge_colors = [
                                        'home'     => 'bg-primary-subtle text-primary border-primary',
                                        'services' => 'bg-info-subtle text-info border-info',
                                        'products' => 'bg-success-subtle text-success border-success',
                                        'projects' => 'bg-warning-subtle text-warning border-warning',
                                        'contact'  => 'bg-danger-subtle text-danger border-danger',
                                        'about'    => 'bg-secondary-subtle text-secondary border-secondary'
                                    ];
                                    $badge_class = isset($page_badge_colors[$p_val]) ? $page_badge_colors[$p_val] : 'bg-light text-dark';
                                ?>
                                <span class="badge <?= $badge_class ?> border text-uppercase" style="font-size: 0.75rem;">
                                    <?= htmlspecialchars($p_val) ?>
                                </span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($s['title']) ?> <span class="text-danger"><?= htmlspecialchars($s['highlight_text']) ?></span></div>
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger mb-1"><?= htmlspecialchars($s['badge_text']) ?></span>
                                <div class="text-muted text-truncate" style="max-width: 260px; font-size: 0.82rem;"><?= htmlspecialchars($s['subtitle']) ?></div>
                            </td>
                            <td>
                                <?php if (!empty($s['button_text'])): ?>
                                    <span class="badge bg-light text-dark border"><?= htmlspecialchars($s['button_text']) ?></span>
                                    <div class="text-muted small" style="font-size: 0.75rem;"><?= htmlspecialchars($s['button_link']) ?></div>
                                <?php else: ?>
                                    <span class="text-muted">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary">#<?= $s['sort_order'] ?></span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_slider/' . $s['id']) ?>" class="status-badge <?= $s['is_active'] ? 'status-active' : 'status-inactive' ?> text-decoration-none" title="Click to toggle status">
                                    <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i>
                                    <?= $s['is_active'] ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex align-items-center gap-1">
                                    <a href="<?= site_url('admin/edit_slider/' . $s['id']) ?>" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1" title="Edit Slide">
                                        <i class="fa-solid fa-pen-to-square"></i> <span>Edit</span>
                                    </a>
                                    <a href="<?= site_url('admin/delete_slider/' . $s['id']) ?>" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1" onclick="return confirm('Are you sure you want to delete this slide?');" title="Delete Slide">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-images fs-1 text-secondary mb-3 d-block"></i>
                            <div class="fw-semibold">No slides or hero banners found</div>
                            <p class="small mb-3">Click below to create a banner for this page.</p>
                            <a href="<?= site_url('admin/add_slider' . (!empty($selected_page) ? '?page=' . $selected_page : '')) ?>" class="btn btn-theme btn-sm">
                                <i class="fa-solid fa-plus me-1"></i> Add New Slide / Banner
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

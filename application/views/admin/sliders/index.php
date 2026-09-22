<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Hero Sliders Management</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage rotating banners, headings, badges, and CTA buttons on the website homepage.</p>
    </div>
    <a href="<?= site_url('admin/add_slider') ?>" class="btn btn-theme d-inline-flex align-items-center gap-2">
        <i class="fa-solid fa-plus"></i> Add New Slide
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 80px;">Preview</th>
                    <th>Heading & Highlight</th>
                    <th>Badge / Subtitle</th>
                    <th>Button</th>
                    <th style="width: 80px;">Order</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 140px;" class="text-end">Actions</th>
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
                                <div class="fw-bold text-dark"><?= htmlspecialchars($s['title']) ?> <span class="text-danger"><?= htmlspecialchars($s['highlight_text']) ?></span></div>
                            </td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger mb-1"><?= htmlspecialchars($s['badge_text']) ?></span>
                                <div class="text-muted text-truncate" style="max-width: 280px; font-size: 0.82rem;"><?= htmlspecialchars($s['subtitle']) ?></div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border"><?= htmlspecialchars($s['button_text']) ?></span>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary"><?= $s['sort_order'] ?></span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_slider/' . $s['id']) ?>" class="status-badge <?= $s['is_active'] ? 'status-active' : 'status-inactive' ?> text-decoration-none" title="Click to toggle status">
                                    <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i>
                                    <?= $s['is_active'] ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= site_url('admin/edit_slider/' . $s['id']) ?>" class="btn btn-outline-primary" title="Edit Slide">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="<?= site_url('admin/delete_slider/' . $s['id']) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this slide?');" title="Delete Slide">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No hero slides found. Click "Add New Slide" to create one.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

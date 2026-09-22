<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Elevator Services Management</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage elevator installation, maintenance, repair, and bespoke lift services.</p>
    </div>
    <div>
        <a href="<?= site_url('admin/add_service') ?>" class="btn btn-theme d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add New Service
        </a>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 70px;">Image</th>
                    <th>Service Name</th>
                    <th>Short Description</th>
                    <th>Features Preview</th>
                    <th style="width: 70px;">Order</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 160px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $srv): ?>
                        <tr>
                            <td>
                                <?php if (!empty($srv['image'])): ?>
                                    <img src="<?= base_url($srv['image']) ?>" alt="<?= htmlspecialchars($srv['title']) ?>" class="thumb-preview">
                                <?php else: ?>
                                    <div style="width: 50px; height: 40px; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; border-radius: 6px;">
                                        <i class="fa-solid fa-wrench"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($srv['title']) ?></div>
                                <small class="text-muted">Slug: <?= htmlspecialchars($srv['slug']) ?></small>
                            </td>
                            <td>
                                <div class="text-muted" style="max-width: 300px; font-size: 0.82rem; line-height: 1.4;">
                                    <?= htmlspecialchars($srv['short_desc']) ?>
                                </div>
                            </td>
                            <td>
                                <?php 
                                    $features = !empty($srv['features']) ? explode("\n", trim($srv['features'])) : [];
                                ?>
                                <span class="badge bg-secondary-subtle text-dark"><?= count($features) ?> Features</span>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary"><?= $srv['sort_order'] ?></span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_service/' . $srv['id']) ?>" class="status-badge <?= $srv['is_active'] ? 'status-active' : 'status-inactive' ?> text-decoration-none" title="Click to toggle status">
                                    <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i>
                                    <?= $srv['is_active'] ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= site_url('admin/edit_service/' . $srv['id']) ?>" class="btn btn-outline-primary" title="Edit Service">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="<?= site_url('admin/delete_service/' . $srv['id']) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this service?');" title="Delete Service">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No services found. Click "Add New Service" to create one.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

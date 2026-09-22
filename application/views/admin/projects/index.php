<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Projects Portfolio Management</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Showcase your landmark installations across residential villas, commercial towers, and hotels.</p>
    </div>
    <div>
        <a href="<?= site_url('admin/add_project') ?>" class="btn btn-theme d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add New Project
        </a>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 80px;">Image</th>
                    <th>Project Name</th>
                    <th>Category & Location</th>
                    <th>Client / Year</th>
                    <th style="width: 90px;">Featured</th>
                    <th style="width: 90px;">Status</th>
                    <th style="width: 150px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $p): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" class="thumb-preview">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($p['title']) ?></div>
                                <div class="text-muted text-truncate" style="max-width: 250px; font-size: 0.82rem;"><?= htmlspecialchars($p['description']) ?></div>
                            </td>
                            <td>
                                <span class="badge bg-dark mb-1"><?= htmlspecialchars($p['category']) ?></span>
                                <div class="text-muted" style="font-size: 0.82rem;"><i class="fa-solid fa-location-dot text-danger me-1"></i><?= htmlspecialchars($p['location']) ?></div>
                            </td>
                            <td>
                                <div class="text-dark fw-semibold" style="font-size: 0.85rem;"><?= htmlspecialchars($p['client_name']) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($p['completion_year']) ?></small>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_project_featured/' . $p['id']) ?>" class="badge <?= $p['is_featured'] ? 'bg-warning text-dark' : 'bg-light text-muted border' ?> text-decoration-none" title="Toggle featured on homepage">
                                    <i class="fa-solid fa-star me-1"></i><?= $p['is_featured'] ? 'Yes' : 'No' ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_project/' . $p['id']) ?>" class="status-badge <?= $p['is_active'] ? 'status-active' : 'status-inactive' ?> text-decoration-none" title="Click to toggle status">
                                    <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i>
                                    <?= $p['is_active'] ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= site_url('admin/edit_project/' . $p['id']) ?>" class="btn btn-outline-primary" title="Edit Project">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="<?= site_url('admin/delete_project/' . $p['id']) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this project?');" title="Delete Project">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No projects found. Click "Add New Project" to showcase an installation.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

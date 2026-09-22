<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Client Reviews & Testimonials</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage feedback, star ratings, and testimonials from luxury villa owners and corporate clients.</p>
    </div>
    <a href="<?= site_url('admin/add_review') ?>" class="btn btn-theme d-inline-flex align-items-center gap-2">
        <i class="fa-solid fa-plus"></i> Add New Review
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 60px;">Avatar</th>
                    <th>Client Name</th>
                    <th>Designation & Location</th>
                    <th>Rating</th>
                    <th>Review Content</th>
                    <th style="width: 90px;">Status</th>
                    <th style="width: 130px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reviews)): ?>
                    <?php foreach ($reviews as $rev): ?>
                        <tr>
                            <td>
                                <?php if (!empty($rev['client_avatar'])): ?>
                                    <img src="<?= base_url($rev['client_avatar']) ?>" alt="<?= htmlspecialchars($rev['client_name']) ?>" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 1px solid #e2e8f0;">
                                <?php else: ?>
                                    <div style="width: 44px; height: 44px; border-radius: 50%; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                        <?= strtoupper(substr($rev['client_name'], 0, 2)) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($rev['client_name']) ?></div>
                            </td>
                            <td>
                                <div class="text-dark" style="font-size: 0.85rem;"><?= htmlspecialchars($rev['client_title']) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($rev['company']) ?></small>
                            </td>
                            <td>
                                <div class="text-warning">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fa-<?= $i <= $rev['rating'] ? 'solid' : 'regular' ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-muted" style="max-width: 320px; font-size: 0.82rem; line-height: 1.4;">
                                    "<?= htmlspecialchars($rev['review_text']) ?>"
                                </div>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_review/' . $rev['id']) ?>" class="status-badge <?= $rev['is_active'] ? 'status-active' : 'status-inactive' ?> text-decoration-none" title="Click to toggle status">
                                    <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i>
                                    <?= $rev['is_active'] ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= site_url('admin/edit_review/' . $rev['id']) ?>" class="btn btn-outline-primary" title="Edit Review">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="<?= site_url('admin/delete_review/' . $rev['id']) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this review?');" title="Delete Review">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            No reviews found. Click "Add New Review" to add one.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

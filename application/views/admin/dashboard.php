<div class="row g-4 mb-4">
    <!-- Stat 1: Services -->
    <div class="col-sm-6 col-xl-3">
        <div class="admin-card mb-0 p-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px;">Services</div>
                <div class="fs-2 fw-bold text-dark mt-1"><?= $count_services ?></div>
                <a href="<?= site_url('admin/services') ?>" class="text-decoration-none text-danger fw-semibold" style="font-size: 0.82rem;">
                    Manage Services <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div style="width: 52px; height: 52px; border-radius: 12px; background: rgba(37, 99, 235, 0.1); color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
        </div>
    </div>

    <!-- Stat 2: Total Projects -->
    <div class="col-sm-6 col-xl-3">
        <div class="admin-card mb-0 p-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px;">Total Projects</div>
                <div class="fs-2 fw-bold text-dark mt-1"><?= $count_projects ?></div>
                <a href="<?= site_url('admin/projects') ?>" class="text-decoration-none text-danger fw-semibold" style="font-size: 0.82rem;">
                    Manage Projects <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div style="width: 52px; height: 52px; border-radius: 12px; background: rgba(16, 185, 129, 0.1); color: #10b981; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-building"></i>
            </div>
        </div>
    </div>

    <!-- Stat 3: Client Reviews -->
    <div class="col-sm-6 col-xl-3">
        <div class="admin-card mb-0 p-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px;">Client Reviews</div>
                <div class="fs-2 fw-bold text-dark mt-1"><?= $count_reviews ?></div>
                <a href="<?= site_url('admin/reviews') ?>" class="text-decoration-none text-danger fw-semibold" style="font-size: 0.82rem;">
                    Manage Reviews <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div style="width: 52px; height: 52px; border-radius: 12px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </div>

    <!-- Stat 4: Contact / Inquiries -->
    <div class="col-sm-6 col-xl-3">
        <div class="admin-card mb-0 p-4 d-flex align-items-center justify-content-between">
            <div>
                <div class="text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px;">Contact</div>
                <div class="fs-2 fw-bold text-dark mt-1"><?= $count_enquiries ?></div>
                <a href="<?= site_url('admin/enquiries') ?>" class="text-decoration-none text-danger fw-semibold" style="font-size: 0.82rem;">
                    View Inquiries <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div style="width: 52px; height: 52px; border-radius: 12px; background: rgba(230, 0, 0, 0.1); color: #e60000; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Banner -->
<div class="admin-card mb-4">
    <div class="admin-card-header">
        <h5 class="admin-card-title"><i class="fa-solid fa-bolt text-warning me-2"></i>Quick Actions</h5>
    </div>
    <div class="admin-card-body">
        <div class="d-flex flex-wrap gap-3">
            <a href="<?= site_url('admin/add_slider') ?>" class="btn btn-outline-danger d-inline-flex align-items-center gap-2 fw-semibold">
                <i class="fa-solid fa-plus"></i> Add Hero Slide
            </a>
            <a href="<?= site_url('admin/add_service') ?>" class="btn btn-outline-dark d-inline-flex align-items-center gap-2 fw-semibold">
                <i class="fa-solid fa-plus"></i> Add Elevator Service
            </a>
            <a href="<?= site_url('admin/add_project') ?>" class="btn btn-outline-dark d-inline-flex align-items-center gap-2 fw-semibold">
                <i class="fa-solid fa-plus"></i> Add Portfolio Project
            </a>
            <a href="<?= site_url('admin/add_review') ?>" class="btn btn-outline-dark d-inline-flex align-items-center gap-2 fw-semibold">
                <i class="fa-solid fa-plus"></i> Add Client Review
            </a>
        </div>
    </div>
</div>

<!-- Recent Inquiries Section -->
<div class="admin-card">
    <div class="admin-card-header">
        <h5 class="admin-card-title"><i class="fa-solid fa-envelope-open-text text-danger me-2"></i>Recent Quote Requests & Enquiries</h5>
        <a href="<?= site_url('admin/enquiries') ?>" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client Name</th>
                    <th>Phone / Email</th>
                    <th>Requested Service</th>
                    <th>Date Received</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($recent_enquiries)): ?>
                    <?php foreach ($recent_enquiries as $enq): ?>
                        <tr>
                            <td><?= $enq['id'] ?></td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($enq['name']) ?></div>
                            </td>
                            <td>
                                <div><a href="tel:<?= htmlspecialchars($enq['phone']) ?>" class="text-dark text-decoration-none"><?= htmlspecialchars($enq['phone']) ?></a></div>
                                <small class="text-muted"><?= htmlspecialchars($enq['email']) ?></small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border"><?= !empty($enq['service']) ? htmlspecialchars($enq['service']) : 'General Inquiry' ?></span>
                            </td>
                            <td class="text-muted" style="font-size: 0.85rem;">
                                <?= date('M d, Y h:i A', strtotime($enq['created_at'])) ?>
                            </td>
                            <td>
                                <span class="status-badge <?= (isset($enq['status']) && $enq['status'] == 'Contacted') ? 'status-active' : 'status-inactive' ?>">
                                    <?= isset($enq['status']) ? htmlspecialchars($enq['status']) : 'New' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="fa-solid fa-inbox fs-2 mb-2 d-block"></i>
                            No inquiries received yet. Quotes submitted from the website form will appear here.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

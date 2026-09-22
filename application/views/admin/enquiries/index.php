<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Customer Inquiries & Quote Requests</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Review messages and consultation requests submitted by visitors on the website.</p>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 60px;">#</th>
                    <th>Client Name</th>
                    <th>Contact Info</th>
                    <th>Service</th>
                    <th>Message</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th style="width: 120px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($enquiries)): ?>
                    <?php foreach ($enquiries as $enq): ?>
                        <tr>
                            <td><?= $enq['id'] ?></td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($enq['name']) ?></div>
                            </td>
                            <td>
                                <div><a href="tel:<?= htmlspecialchars($enq['phone']) ?>" class="text-danger fw-semibold text-decoration-none"><i class="fa-solid fa-phone me-1"></i><?= htmlspecialchars($enq['phone']) ?></a></div>
                                <div><a href="mailto:<?= htmlspecialchars($enq['email']) ?>" class="text-muted text-decoration-none" style="font-size: 0.82rem;"><i class="fa-solid fa-envelope me-1"></i><?= htmlspecialchars($enq['email']) ?></a></div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border"><?= !empty($enq['service']) ? htmlspecialchars($enq['service']) : 'General' ?></span>
                            </td>
                            <td>
                                <div class="text-muted" style="max-width: 280px; font-size: 0.85rem; line-height: 1.4;">
                                    <?= nl2br(htmlspecialchars($enq['message'])) ?>
                                </div>
                            </td>
                            <td class="text-muted" style="font-size: 0.82rem; white-space: nowrap;">
                                <?= date('M d, Y h:i A', strtotime($enq['created_at'])) ?>
                            </td>
                            <td>
                                <form action="<?= site_url('admin/update_enquiry_status/' . $enq['id']) ?>" method="POST" class="d-inline">
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: 110px; font-size: 0.78rem;">
                                        <option value="New" <?= (isset($enq['status']) && $enq['status'] == 'New') ? 'selected' : '' ?>>New</option>
                                        <option value="Contacted" <?= (isset($enq['status']) && $enq['status'] == 'Contacted') ? 'selected' : '' ?>>Contacted</option>
                                        <option value="Closed" <?= (isset($enq['status']) && $enq['status'] == 'Closed') ? 'selected' : '' ?>>Closed</option>
                                    </select>
                                </form>
                            </td>
                            <td class="text-end">
                                <a href="<?= site_url('admin/delete_enquiry/' . $enq['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this inquiry?');" title="Delete Inquiry">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-inbox fs-1 mb-2 d-block text-secondary"></i>
                            No inquiries recorded yet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

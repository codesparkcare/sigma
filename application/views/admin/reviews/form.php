<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1"><?= $review ? 'Edit Review: ' . htmlspecialchars($review['client_name']) : 'Add New Client Review' ?></h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Add client ratings and authentic testimonials.</p>
    </div>
    <a href="<?= site_url('admin/reviews') ?>" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Reviews
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= $review ? site_url('admin/edit_review/' . $review['id']) : site_url('admin/add_review') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Client Name <span class="text-danger">*</span></label>
                            <input type="text" name="client_name" class="form-control" placeholder="e.g. Tariq Al Mansoori" value="<?= $review ? htmlspecialchars($review['client_name']) : '' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Client Title / Role</label>
                            <input type="text" name="client_title" class="form-control" placeholder="e.g. Villa Owner / Managing Director" value="<?= $review ? htmlspecialchars($review['client_title']) : 'Villa Owner' ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Company / Location</label>
                            <input type="text" name="company" class="form-control" placeholder="e.g. Palm Jumeirah / Business Bay" value="<?= $review ? htmlspecialchars($review['company']) : 'Dubai' ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Star Rating (1 to 5) <span class="text-danger">*</span></label>
                            <select name="rating" class="form-select" required>
                                <?php for ($r = 5; $r >= 1; $r--): ?>
                                    <option value="<?= $r ?>" <?= ($review && $review['rating'] == $r) ? 'selected' : ($r == 5 ? 'selected' : '') ?>><?= $r ?> Stars <?= str_repeat('★', $r) ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Review / Testimonial Text <span class="text-danger">*</span></label>
                            <textarea name="review_text" class="form-control" rows="4" placeholder="Enter customer experience and elevator feedback..." required><?= $review ? htmlspecialchars($review['review_text']) : '' ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Client Avatar Photo</label>
                            <input type="file" name="avatar_file" class="form-control" accept="image/*">
                            <small class="text-muted">Square photo recommended.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Or Avatar Image URL</label>
                            <input type="text" name="client_avatar" class="form-control" placeholder="assets/uploads/reviews/avatar1.jpg" value="<?= $review ? htmlspecialchars($review['client_avatar']) : '' ?>">
                        </div>

                        <?php if ($review && !empty($review['client_avatar'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-semibold d-block">Current Avatar</label>
                                <img src="<?= base_url($review['client_avatar']) ?>" alt="Avatar" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 1px solid #e2e8f0;">
                            </div>
                        <?php endif; ?>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Display Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?= $review ? $review['sort_order'] : 1 ?>">
                        </div>

                        <div class="col-md-6 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveCheck" <?= (!$review || $review['is_active']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isActiveCheck">Active & Visible</label>
                            </div>
                        </div>

                        <div class="col-12 text-end pt-3 border-top mt-3">
                            <a href="<?= site_url('admin/reviews') ?>" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-check me-1"></i> <?= $review ? 'Save Changes' : 'Create Review' ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

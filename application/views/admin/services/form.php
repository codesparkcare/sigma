<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1"><?= $service ? 'Edit Service: ' . htmlspecialchars($service['title']) : 'Add New Elevator Service' ?></h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Define service description, engineering highlights, and cover imagery.</p>
    </div>
    <a href="<?= site_url('admin/services') ?>" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Services
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= $service ? site_url('admin/edit_service/' . $service['id']) : site_url('admin/add_service') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Service Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Elevator Modernization" value="<?= $service ? htmlspecialchars($service['title']) : '' ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Button CTA Text</label>
                            <input type="text" name="button_text" class="form-control" placeholder="e.g. Get A Quote" value="<?= $service ? htmlspecialchars($service['button_text']) : 'Get A Quote' ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Short Summary (Homepage & Cards) <span class="text-danger">*</span></label>
                            <textarea name="short_desc" class="form-control" rows="2" placeholder="1-2 sentences summarizing the service..." required><?= $service ? htmlspecialchars($service['short_desc']) : '' ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Full Detailed Description (Separate Page View)</label>
                            <textarea name="full_desc" class="form-control" rows="4" placeholder="Detailed engineering overview, technical standards, and Dubai Municipality / Civil Defense compliance..."><?= $service ? htmlspecialchars($service['full_desc']) : '' ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Key Highlights / Features (One feature per line)</label>
                            <textarea name="features" class="form-control" rows="4" placeholder="Dubai Civil Defense Approved&#10;German Traction & Hydraulic Machines&#10;Complete Turnkey Project Management"><?= $service ? htmlspecialchars($service['features']) : '' ?></textarea>
                            <small class="text-muted">Enter each bullet point on a new line.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Service Cover Image</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                            <small class="text-muted">High resolution JPG/PNG (e.g. 1000x700).</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Or Image Asset Path</label>
                            <input type="text" name="image_url" class="form-control" placeholder="assets/images/service_passenger.jpg" value="<?= $service ? htmlspecialchars($service['image']) : '' ?>">
                        </div>

                        <?php if ($service && !empty($service['image'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-semibold d-block">Current Image Preview</label>
                                <img src="<?= base_url($service['image']) ?>" alt="Preview" style="max-height: 140px; border-radius: 8px; border: 1px solid #e2e8f0; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SVG Icon Snippet (Optional)</label>
                            <input type="text" name="icon_svg" class="form-control" placeholder='<polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />' value="<?= $service ? htmlspecialchars($service['icon_svg']) : '' ?>">
                            <small class="text-muted">Inner SVG path or polyline tags.</small>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Display Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?= $service ? $service['sort_order'] : 1 ?>">
                        </div>

                        <div class="col-md-3 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveCheck" <?= (!$service || $service['is_active']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isActiveCheck">Active</label>
                            </div>
                        </div>

                        <div class="col-12 text-end pt-3 border-top mt-3">
                            <a href="<?= site_url('admin/services') ?>" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-check me-1"></i> <?= $service ? 'Save Changes' : 'Create Service' ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

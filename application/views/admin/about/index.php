<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Manage About Us Page</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Configure company introduction, story, mission, vision, key achievements, and brand photo.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= site_url('admin/about') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Top Badge Tag</label>
                            <input type="text" name="badge" class="form-control" value="<?= htmlspecialchars($about['badge']) ?>">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Main Heading <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($about['title']) ?>" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Short Subtitle / Lead Paragraph</label>
                            <textarea name="subtitle" class="form-control" rows="2"><?= htmlspecialchars($about['subtitle']) ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Full Company Story & Overview</label>
                            <textarea name="story" class="form-control" rows="5"><?= htmlspecialchars($about['story']) ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Our Mission</label>
                            <textarea name="mission" class="form-control" rows="3"><?= htmlspecialchars($about['mission']) ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Our Vision</label>
                            <textarea name="vision" class="form-control" rows="3"><?= htmlspecialchars($about['vision']) ?></textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Experience Stat</label>
                            <input type="text" name="experience_years" class="form-control" placeholder="15+ Years" value="<?= htmlspecialchars($about['experience_years']) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Installations Stat</label>
                            <input type="text" name="elevators_installed" class="form-control" placeholder="500+ Lifts" value="<?= htmlspecialchars($about['elevators_installed']) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Client Satisfaction Stat</label>
                            <input type="text" name="client_satisfaction" class="form-control" placeholder="99.9%" value="<?= htmlspecialchars($about['client_satisfaction']) ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Brand / Showcase Image</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Or Image Asset Path</label>
                            <input type="text" name="image_url" class="form-control" value="<?= htmlspecialchars($about['image']) ?>">
                        </div>

                        <?php if (!empty($about['image'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-semibold d-block">Current Image Preview</label>
                                <img src="<?= base_url($about['image']) ?>" alt="About Preview" style="max-height: 160px; border-radius: 8px; border: 1px solid #e2e8f0; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <div class="col-12 text-end pt-3 border-top mt-4">
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-check me-1"></i> Save About Us Details
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

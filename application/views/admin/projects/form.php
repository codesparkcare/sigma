<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1"><?= $project ? 'Edit Project: ' . htmlspecialchars($project['title']) : 'Add New Portfolio Project' ?></h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Add project location, client details, classification, and imagery.</p>
    </div>
    <a href="<?= site_url('admin/projects') ?>" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Projects
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= $project ? site_url('admin/edit_project/' . $project['id']) : site_url('admin/add_project') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Project Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Signature Villa Panoramic Lift" value="<?= $project ? htmlspecialchars($project['title']) : '' ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required>
                                <?php 
                                    $cats = ['Luxury Villas', 'Commercial', 'Panoramic Glass', 'Escalators', 'Hospital & Freight', 'Residential'];
                                    $cur_cat = $project ? $project['category'] : 'Luxury Villas';
                                    foreach ($cats as $cat):
                                ?>
                                    <option value="<?= $cat ?>" <?= ($cur_cat == $cat) ? 'selected' : '' ?>><?= $cat ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Project Location</label>
                            <input type="text" name="location" class="form-control" placeholder="e.g. Palm Jumeirah, Dubai" value="<?= $project ? htmlspecialchars($project['location']) : 'Dubai, UAE' ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Client Name / Project Type</label>
                            <input type="text" name="client_name" class="form-control" placeholder="e.g. Private Residence / Apex Holding" value="<?= $project ? htmlspecialchars($project['client_name']) : 'Private Client' ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Year of Commissioning</label>
                            <input type="text" name="completion_year" class="form-control" placeholder="e.g. 2024" value="<?= $project ? htmlspecialchars($project['completion_year']) : date('Y') ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Project Overview / Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Describe the engineering requirements, elevator speed, capacity, finishes, and shaft design..."><?= $project ? htmlspecialchars($project['description']) : '' ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Main Showcase Photo</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                            <small class="text-muted">High resolution JPG/PNG recommended.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Or Image Asset Path</label>
                            <input type="text" name="image_url" class="form-control" placeholder="assets/images/hero_panoramic.jpg" value="<?= $project ? htmlspecialchars($project['image']) : '' ?>">
                        </div>

                        <?php if ($project && !empty($project['image'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-semibold d-block">Current Project Image</label>
                                <img src="<?= base_url($project['image']) ?>" alt="Preview" style="max-height: 140px; border-radius: 8px; border: 1px solid #e2e8f0; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Display Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?= $project ? $project['sort_order'] : 1 ?>">
                        </div>

                        <div class="col-md-4 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeaturedCheck" <?= (!$project || $project['is_featured']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isFeaturedCheck">Feature on Homepage</label>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveCheck" <?= (!$project || $project['is_active']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isActiveCheck">Active & Visible</label>
                            </div>
                        </div>

                        <div class="col-12 text-end pt-3 border-top mt-3">
                            <a href="<?= site_url('admin/projects') ?>" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-check me-1"></i> <?= $project ? 'Save Changes' : 'Create Project' ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

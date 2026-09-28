<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1"><?= $slider ? 'Edit Slide' : 'Add New Hero Slide' ?></h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Configure background photo, typography, badge tag, and button link.</p>
    </div>
    <a href="<?= site_url('admin/sliders') ?>" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Sliders
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= $slider ? site_url('admin/edit_slider/' . $slider['id']) : site_url('admin/add_slider') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Display Page / Location <span class="text-danger">*</span></label>
                            <?php 
                                $selected_page = $slider ? (!empty($slider['page']) ? $slider['page'] : 'home') : (isset($default_page) ? $default_page : 'home');
                            ?>
                            <select name="page" class="form-select fw-semibold" required>
                                <option value="home" <?= $selected_page === 'home' ? 'selected' : '' ?>>🏠 Homepage (Hero Slider)</option>
                                <option value="services" <?= $selected_page === 'services' ? 'selected' : '' ?>>🛠️ Services Page (/services)</option>
                                <option value="products" <?= $selected_page === 'products' ? 'selected' : '' ?>>📦 Products Page (/products)</option>
                                <option value="projects" <?= $selected_page === 'projects' ? 'selected' : '' ?>>🏢 Projects Page (/projects)</option>
                                <option value="contact" <?= $selected_page === 'contact' ? 'selected' : '' ?>>📞 Contact Page (/contact)</option>
                                <option value="about" <?= $selected_page === 'about' ? 'selected' : '' ?>>ℹ️ About Us Page (/about)</option>
                            </select>
                            <small class="text-muted">Choose which page this slide/banner displays on.</small>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label fw-semibold">Slide Main Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Luxury Home Elevators for" value="<?= $slider ? htmlspecialchars($slider['title']) : '' ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Highlight Text (Red Accent)</label>
                            <input type="text" name="highlight_text" class="form-control" placeholder="e.g. Modern Living" value="<?= $slider ? htmlspecialchars($slider['highlight_text']) : '' ?>">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Badge Tag</label>
                            <input type="text" name="badge_text" class="form-control" placeholder="e.g. Home Elevators" value="<?= $slider ? htmlspecialchars($slider['badge_text']) : '' ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Button Text</label>
                            <input type="text" name="button_text" class="form-control" placeholder="e.g. Explore Home Elevators" value="<?= $slider ? htmlspecialchars($slider['button_text']) : 'Explore Services' ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Button Link (Page / Section)</label>
                            <?php 
                                $current_link = $slider ? $slider['button_link'] : 'services';
                                $predefined_links = [
                                    'services', 'products', 'projects', 'about', 'contact',
                                    '#contact', '#services', '#products', '#why-us', '#process', '#calculator', '#telemetry', '#faq'
                                ];
                            ?>
                            <select name="button_link" class="form-select">
                                <optgroup label="Website Pages">
                                    <option value="services" <?= $current_link === 'services' ? 'selected' : '' ?>>Services Page (/services)</option>
                                    <option value="products" <?= $current_link === 'products' ? 'selected' : '' ?>>Products Catalog (/products)</option>
                                    <option value="projects" <?= $current_link === 'projects' ? 'selected' : '' ?>>Projects Portfolio (/projects)</option>
                                    <option value="about" <?= $current_link === 'about' ? 'selected' : '' ?>>About Us Page (/about)</option>
                                    <option value="contact" <?= $current_link === 'contact' ? 'selected' : '' ?>>Contact Us Page (/contact)</option>
                                </optgroup>
                                <optgroup label="Homepage Sections (Anchors)">
                                    <option value="#contact" <?= $current_link === '#contact' ? 'selected' : '' ?>>#contact (Instant Quote / Inquiry Form)</option>
                                    <option value="#services" <?= $current_link === '#services' ? 'selected' : '' ?>>#services (Services Section)</option>
                                    <option value="#products" <?= $current_link === '#products' ? 'selected' : '' ?>>#products (Products Section)</option>
                                    <option value="#why-us" <?= $current_link === '#why-us' ? 'selected' : '' ?>>#why-us (Why Choose Us Section)</option>
                                    <option value="#process" <?= $current_link === '#process' ? 'selected' : '' ?>>#process (Engineering Workflow Section)</option>
                                    <option value="#calculator" <?= $current_link === '#calculator' ? 'selected' : '' ?>>#calculator (Cost Estimator)</option>
                                    <option value="#telemetry" <?= $current_link === '#telemetry' ? 'selected' : '' ?>>#telemetry (Live Telemetry Section)</option>
                                    <option value="#faq" <?= $current_link === '#faq' ? 'selected' : '' ?>>#faq (Frequently Asked Questions)</option>
                                </optgroup>
                                <?php if (!empty($current_link) && !in_array($current_link, $predefined_links)): ?>
                                    <optgroup label="Custom Value">
                                        <option value="<?= htmlspecialchars($current_link) ?>" selected><?= htmlspecialchars($current_link) ?> (Custom)</option>
                                    </optgroup>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Subtitle / Description</label>
                            <textarea name="subtitle" class="form-control" rows="3" placeholder="Brief captivating elevator description..."><?= $slider ? htmlspecialchars($slider['subtitle']) : '' ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Background Image</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                            <small class="text-muted">High resolution JPG/PNG recommended (e.g. 1920x1080).</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Or Image Asset Path</label>
                            <input type="text" name="image_url" class="form-control" placeholder="assets/images/hero_panoramic.jpg" value="<?= $slider ? htmlspecialchars($slider['image']) : 'assets/images/hero_panoramic.jpg' ?>">
                            <small class="text-muted">Existing asset path or external image URL</small>
                        </div>

                        <?php if ($slider && !empty($slider['image'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-semibold d-block">Current Image Preview</label>
                                <img src="<?= base_url($slider['image']) ?>" alt="Preview" style="max-height: 160px; border-radius: 8px; border: 1px solid #e2e8f0; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Display Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?= $slider ? $slider['sort_order'] : 1 ?>">
                        </div>

                        <div class="col-md-6 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveCheck" <?= (!$slider || $slider['is_active']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isActiveCheck">Active / Visible on Homepage</label>
                            </div>
                        </div>

                        <div class="col-12 text-end pt-3 border-top mt-3">
                            <a href="<?= site_url('admin/sliders') ?>" class="btn btn-light border me-2">Cancel</a>
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-check me-1"></i> <?= $slider ? 'Save Changes' : 'Create Slide' ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

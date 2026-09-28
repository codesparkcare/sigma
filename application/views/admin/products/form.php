<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1"><?= $product ? 'Edit Product: ' . htmlspecialchars($product['title']) : 'Add New Product' ?></h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Specify elevator model title, tagline, description, and high-resolution photo.</p>
    </div>
    <a href="<?= site_url('admin/products') ?>" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Products
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= $product ? site_url('admin/edit_product/' . $product['id']) : site_url('admin/add_product') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-7">
                            <label class="form-label fw-semibold">Product Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Luxury Panoramic Glass Elevator" value="<?= $product ? htmlspecialchars($product['title']) : '' ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-semibold">Subtitle / Tagline / Badge</label>
                            <input type="text" name="subtitle" class="form-control" placeholder="e.g. Custom Architectural Showcase" value="<?= $product ? htmlspecialchars($product['subtitle']) : '' ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Product Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Provide a detailed description of the product engineering, safety, passenger capacity, speed, and design finishes..." required><?= $product ? htmlspecialchars($product['description']) : '' ?></textarea>
                            <small class="text-muted">This description will be cleanly showcased on the products page, and an excerpt is displayed on the homepage product cards.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Product Photo</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                            <small class="text-muted">Supported formats: JPG, PNG, WebP (Landscape / 16:9 recommended).</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Or Image Asset Path</label>
                            <input type="text" name="image_url" class="form-control" placeholder="assets/images/service_panoramic.jpg" value="<?= $product ? htmlspecialchars($product['image']) : '' ?>">
                        </div>

                        <?php if ($product && !empty($product['image'])): ?>
                            <div class="col-12">
                                <label class="form-label fw-semibold d-block">Current Product Image</label>
                                <img src="<?= base_url($product['image']) ?>" alt="Preview" style="max-height: 150px; border-radius: 8px; border: 1px solid #e2e8f0; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Display Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="<?= $product ? $product['sort_order'] : 1 ?>">
                        </div>

                        <div class="col-md-4 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeaturedCheck" <?= (!$product || $product['is_featured']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isFeaturedCheck">Show on Homepage</label>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex align-items-center mt-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveCheck" <?= (!$product || $product['is_active']) ? 'checked' : '' ?>>
                                <label class="form-check-label fs-6 fw-semibold" for="isActiveCheck">Active & Published</label>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-wrap align-items-center justify-content-between pt-3 border-top mt-3 gap-2">
                            <div>
                                <?php if ($product): ?>
                                    <a href="<?= site_url('admin/delete_product/' . $product['id']) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to permanently delete this product?');">
                                        <i class="fa-solid fa-trash-can me-1"></i> Delete Product
                                    </a>
                                    <a href="<?= site_url('product/' . ($product['slug'] ?: $product['id'])) ?>" target="_blank" class="btn btn-outline-secondary ms-2">
                                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <a href="<?= site_url('admin/products') ?>" class="btn btn-light border">Cancel</a>
                                <button type="submit" class="btn btn-theme">
                                    <i class="fa-solid fa-check me-1"></i> <?= $product ? 'Save Changes' : 'Create Product' ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

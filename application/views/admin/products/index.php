<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1">Products Management</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage elevator models and products displayed on the homepage showcase and dedicated products catalog.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="<?= site_url('products') ?>" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Catalog
        </a>
        <a href="<?= site_url('admin/add_product') ?>" class="btn btn-theme d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-plus"></i> Add New Product
        </a>
    </div>
</div>

<?php 
    $total_products = count($products);
    $active_products = count(array_filter($products, function($p) { return !empty($p['is_active']); }));
    $featured_products = count(array_filter($products, function($p) { return !empty($p['is_featured']); }));
?>

<!-- Quick Stats Bar -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-md-4">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(230,0,0,0.1); color: #e60000; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div>
                <div class="text-muted small">Total Products</div>
                <div class="fw-bold fs-5"><?= $total_products ?></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(34,197,94,0.1); color: #16a34a; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <div class="text-muted small">Active & Published</div>
                <div class="fw-bold fs-5"><?= $active_products ?></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(234,179,8,0.1); color: #ca8a04; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                <i class="fa-solid fa-star"></i>
            </div>
            <div>
                <div class="text-muted small">Homepage Featured</div>
                <div class="fw-bold fs-5"><?= $featured_products ?></div>
            </div>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th style="width: 80px;">Image</th>
                    <th>Product Title & Description</th>
                    <th>Tagline / Category</th>
                    <th style="width: 90px;">Sort</th>
                    <th style="width: 120px;">Homepage</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 200px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" class="thumb-preview">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($p['title']) ?></div>
                                <div class="text-muted text-truncate" style="max-width: 320px; font-size: 0.82rem;"><?= htmlspecialchars($p['description']) ?></div>
                            </td>
                            <td>
                                <?php if (!empty($p['subtitle'])): ?>
                                    <span class="badge bg-light text-dark border"><?= htmlspecialchars($p['subtitle']) ?></span>
                                <?php else: ?>
                                    <span class="text-muted" style="font-size: 0.82rem;">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-secondary">#<?= $p['sort_order'] ?></span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_product_featured/' . $p['id']) ?>" class="badge <?= $p['is_featured'] ? 'bg-warning text-dark' : 'bg-light text-muted border' ?> text-decoration-none" title="Click to toggle homepage visibility">
                                    <i class="fa-solid fa-star me-1"></i><?= $p['is_featured'] ? 'Featured' : 'Hidden' ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/toggle_product/' . $p['id']) ?>" class="status-badge <?= $p['is_active'] ? 'status-active' : 'status-inactive' ?> text-decoration-none" title="Click to toggle active status">
                                    <i class="fa-solid fa-circle" style="font-size: 0.5rem;"></i>
                                    <?= $p['is_active'] ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex align-items-center gap-1">
                                    <a href="<?= site_url('product/' . ($p['slug'] ?: $p['id'])) ?>" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Public Page">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                    <a href="<?= site_url('admin/edit_product/' . $p['id']) ?>" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1" title="Edit Product">
                                        <i class="fa-solid fa-pen-to-square"></i> <span>Edit</span>
                                    </a>
                                    <a href="<?= site_url('admin/delete_product/' . $p['id']) ?>" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1" onclick="return confirm('Are you sure you want to delete product: <?= addslashes(htmlspecialchars($p['title'])) ?>? This action cannot be undone.');" title="Delete Product">
                                        <i class="fa-solid fa-trash-can"></i> <span>Delete</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-boxes-stacked fs-1 text-secondary mb-3 d-block"></i>
                            <div class="fw-semibold">No products found</div>
                            <p class="small mb-3">Click "Add New Product" to create your first elevator product.</p>
                            <a href="<?= site_url('admin/add_product') ?>" class="btn btn-theme btn-sm">
                                <i class="fa-solid fa-plus me-1"></i> Add New Product
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

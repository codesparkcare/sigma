<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold mb-1">Manage Contact Us Page & Details</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Configure office location, telephone lines, emergency hotline, and Google Map embed.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card">
            <div class="admin-card-body">
                <form action="<?= site_url('admin/contact_settings') ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Page Heading <span class="text-danger">*</span></label>
                            <input type="text" name="heading" class="form-control" value="<?= htmlspecialchars($contact['heading']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Support Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($contact['email']) ?>" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Sub-heading / Introductory Message</label>
                            <textarea name="subheading" class="form-control" rows="2"><?= htmlspecialchars($contact['subheading']) ?></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Office Physical Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($contact['address']) ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">General Telephone / Office Line <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($contact['phone']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">24/7 Emergency Dispatch Hotline <span class="text-danger">*</span></label>
                            <input type="text" name="emergency_phone" class="form-control" value="<?= htmlspecialchars($contact['emergency_phone']) ?>" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Working Hours / Availability Schedule</label>
                            <input type="text" name="working_hours" class="form-control" value="<?= htmlspecialchars($contact['working_hours']) ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Google Map Embed Code or URL</label>
                            <textarea name="map_iframe" class="form-control" rows="3" placeholder="Paste entire <iframe ...> embed code or map URL here"><?= htmlspecialchars($contact['map_iframe']) ?></textarea>
                            <small class="text-muted">You can paste the full Google Maps <code>&lt;iframe ...&gt;</code> embed code or just the URL. The system automatically handles and formats it.</small>
                        </div>

                        <div class="col-12 text-end pt-3 border-top mt-4">
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-check me-1"></i> Save Contact Settings
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

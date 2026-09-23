<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <h4 class="fw-bold mb-1">SMTP & Email Configuration</h4>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage outgoing mail server credentials and verify email delivery.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Main SMTP Settings Form (Left Column) -->
    <div class="col-lg-7">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-server text-danger"></i>
                    <h5 class="admin-card-title mb-0">Outgoing Mail Server (SMTP)</h5>
                </div>
            </div>
            <div class="admin-card-body">
                <form action="<?= site_url('admin/smtp_settings') ?>" method="POST" id="smtpSettingsForm">
                    <div class="row g-3">
                        <!-- SMTP Host -->
                        <div class="col-md-7">
                            <label class="form-label fw-semibold">SMTP Host / Server <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fa-solid fa-network-wired text-muted"></i></span>
                                <input type="text" name="smtp_host" id="smtp_host" class="form-control" value="<?= htmlspecialchars($smtp['smtp_host'] ?? 'smtp.hostinger.com') ?>" placeholder="smtp.hostinger.com" required>
                            </div>
                        </div>

                        <!-- SMTP Port -->
                        <div class="col-md-5">
                            <label class="form-label fw-semibold">SMTP Port <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fa-solid fa-hashtag text-muted"></i></span>
                                <input type="number" name="smtp_port" id="smtp_port" class="form-control" value="<?= htmlspecialchars($smtp['smtp_port'] ?? '465') ?>" placeholder="465 or 587" required>
                            </div>
                        </div>

                        <!-- SMTP Encryption -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Encryption Protocol</label>
                            <select name="smtp_crypto" id="smtp_crypto" class="form-select">
                                <option value="ssl" <?= (!isset($smtp['smtp_crypto']) || strtolower($smtp['smtp_crypto']) === 'ssl') ? 'selected' : '' ?>>SSL (Port 465)</option>
                                <option value="tls" <?= (isset($smtp['smtp_crypto']) && strtolower($smtp['smtp_crypto']) === 'tls') ? 'selected' : '' ?>>TLS (Port 587)</option>
                                <option value="none" <?= (isset($smtp['smtp_crypto']) && strtolower($smtp['smtp_crypto']) === 'none') ? 'selected' : '' ?>>None (Port 25)</option>
                            </select>
                        </div>

                        <!-- SMTP Username -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SMTP Username / Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fa-solid fa-user text-muted"></i></span>
                                <input type="text" name="smtp_user" id="smtp_user" class="form-control" value="<?= htmlspecialchars($smtp['smtp_user'] ?? 'info@sigmaheightelevators.com') ?>" placeholder="info@sigmaheightelevators.com" required>
                            </div>
                        </div>

                        <!-- SMTP Password -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">SMTP Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fa-solid fa-key text-muted"></i></span>
                                <input type="password" name="smtp_pass" id="smtp_pass" class="form-control" value="<?= htmlspecialchars($smtp['smtp_pass'] ?? '07Uis2742*"') ?>" placeholder="Enter SMTP password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordBtn" title="Show / Hide Password">
                                    <i class="fa-solid fa-eye" id="togglePasswordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Header Divider -->
                        <div class="col-12 pt-2">
                            <h6 class="fw-bold text-dark border-bottom pb-2 mb-2">
                                <i class="fa-solid fa-address-card text-danger me-1"></i> Sender Identity & Notification
                            </h6>
                        </div>

                        <!-- From Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Sender "From" Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fa-solid fa-envelope text-muted"></i></span>
                                <input type="email" name="from_email" id="from_email" class="form-control" value="<?= htmlspecialchars($smtp['from_email'] ?? 'info@sigmaheightelevators.com') ?>" placeholder="info@sigmaheightelevators.com" required>
                            </div>
                        </div>

                        <!-- From Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Sender "From" Name</label>
                            <input type="text" name="from_name" id="from_name" class="form-control" value="<?= htmlspecialchars($smtp['from_name'] ?? 'Sigma Height Elevators LLC') ?>" placeholder="Sigma Height Elevators LLC">
                        </div>

                        <!-- Reply-To Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Reply-To Email Address</label>
                            <input type="email" name="reply_to" id="reply_to" class="form-control" value="<?= htmlspecialchars($smtp['reply_to'] ?? 'info@sigmaheightelevators.com') ?>" placeholder="info@sigmaheightelevators.com">
                        </div>

                        <!-- Admin Notification Recipient Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Admin Notification Email</label>
                            <input type="email" name="admin_email" id="admin_email" class="form-control" value="<?= htmlspecialchars($smtp['admin_email'] ?? 'info@sigmaheightelevators.com') ?>" placeholder="info@sigmaheightelevators.com">
                        </div>

                        <!-- Submit Buttons -->
                        <div class="col-12 text-end pt-3 border-top mt-3 d-flex align-items-center justify-content-between">
                            <button type="reset" class="btn btn-light border">
                                <i class="fa-solid fa-rotate-left me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-theme">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Save SMTP Configuration
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Side Diagnostics & Live Test Card (Right Column) -->
    <div class="col-lg-5">
        <div class="admin-card border-primary">
            <div class="admin-card-header bg-light">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-paper-plane text-primary"></i>
                    <h5 class="admin-card-title mb-0" style="font-size: 1.05rem;">Live SMTP Test Tool</h5>
                </div>
            </div>
            <div class="admin-card-body">
                <p class="text-muted" style="font-size: 0.88rem;">
                    Send a test email to verify your outgoing SMTP server connection, authentication credentials, and inbox delivery.
                </p>

                <form id="testEmailForm">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size: 0.85rem;">Test Recipient Email Address</label>
                        <input type="email" id="test_recipient" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-semibold" id="sendTestBtn">
                        <i class="fa-solid fa-paper-plane me-1"></i> Send Test Email Now
                    </button>
                </form>

                <!-- Test Result Container -->
                <div id="testResultBox" class="mt-3 d-none"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const toggleBtn = document.getElementById('togglePasswordBtn');
    const passInput = document.getElementById('smtp_pass');
    const toggleIcon = document.getElementById('togglePasswordIcon');

    if (toggleBtn && passInput) {
        toggleBtn.addEventListener('click', function() {
            if (passInput.type === 'password') {
                passInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    }

    // Test Email AJAX Form
    const testForm = document.getElementById('testEmailForm');
    const sendBtn = document.getElementById('sendTestBtn');
    const resultBox = document.getElementById('testResultBox');

    if (testForm) {
        testForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const recipient = document.getElementById('test_recipient').value.trim();
            if (!recipient) {
                alert('Please enter a recipient email address.');
                return;
            }

            sendBtn.disabled = true;
            sendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Testing SMTP Connection...';
            resultBox.className = 'mt-3 alert alert-info d-flex align-items-center gap-2';
            resultBox.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Connecting to SMTP server and dispatching test message...';
            resultBox.classList.remove('d-none');

            const formData = new FormData();
            formData.append('test_email', recipient);

            fetch('<?= site_url('admin/test_smtp') ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                sendBtn.disabled = false;
                sendBtn.innerHTML = '<i class="fa-solid fa-paper-plane me-1"></i> Send Test Email Now';

                if (data.status === 'success') {
                    resultBox.className = 'mt-3 alert alert-success';
                    resultBox.innerHTML = `
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <i class="fa-solid fa-circle-check fs-5 text-success"></i>
                            <strong>Success!</strong>
                        </div>
                        <div style="font-size: 0.85rem;">${data.message}</div>
                    `;
                } else {
                    resultBox.className = 'mt-3 alert alert-danger';
                    let debugHtml = '';
                    if (data.debugger) {
                        debugHtml = `
                            <div class="mt-2">
                                <a href="javascript:void(0);" onclick="this.nextElementSibling.classList.toggle('d-none');" class="text-danger fw-bold" style="font-size:0.8rem;">
                                    <i class="fa-solid fa-bug me-1"></i> Toggle Technical Debug Log
                                </a>
                                <pre class="mt-2 p-2 bg-dark text-white rounded d-none" style="font-size:0.75rem; max-height:180px; overflow-y:auto;">${data.debugger}</pre>
                            </div>
                        `;
                    }
                    resultBox.innerHTML = `
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <i class="fa-solid fa-triangle-exclamation fs-5 text-danger"></i>
                            <strong>SMTP Delivery Failed</strong>
                        </div>
                        <div style="font-size: 0.85rem;">${data.message}</div>
                        ${debugHtml}
                    `;
                }
            })
            .catch(err => {
                sendBtn.disabled = false;
                sendBtn.innerHTML = '<i class="fa-solid fa-paper-plane me-1"></i> Send Test Email Now';
                resultBox.className = 'mt-3 alert alert-danger';
                resultBox.innerHTML = `
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-circle-xmark fs-5 text-danger"></i>
                        <div><strong>Network Error:</strong> Failed to reach server. Please check your network or server logs.</div>
                    </div>
                `;
            });
        });
    }
});
</script>

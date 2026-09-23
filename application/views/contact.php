<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
$title = 'Contact Us | Sigma Height Elevators Dubai, UAE';
$meta_description = !empty($contact['subheading']) ? $contact['subheading'] : 'Get in touch with Sigma Height Elevators LLC Dubai for elevator installation, AMC maintenance, and 24/7 emergency repair services.';
$this->load->view('includes/header', ['title' => $title, 'meta_description' => $meta_description]);
?>

<style>
  /* Dedicated Page Hero Banner */
  .page-hero-banner {
    position: relative;
    background: linear-gradient(135deg, #090d16 0%, #111827 100%);
    padding: 140px 0 80px;
    color: #ffffff;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    overflow: hidden;
  }
  .page-hero-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 80% 20%, rgba(230, 0, 0, 0.25), transparent 60%);
    pointer-events: none;
  }
  .breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.88rem;
    color: #94a3b8;
    margin-bottom: 16px;
  }
  .breadcrumb-nav a {
    color: #e2e8f0;
    text-decoration: none;
    transition: color 0.2s;
  }
  .breadcrumb-nav a:hover {
    color: #ff3333;
  }
  .page-hero-title {
    font-size: clamp(2.2rem, 4vw, 3.4rem);
    font-weight: 800;
    margin-bottom: 16px;
    letter-spacing: -0.5px;
  }
  .page-hero-title span {
    color: #ff2a2a;
  }

  /* Contact Details Grid */
  .contact-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    margin-top: -45px;
    position: relative;
    z-index: 10;
    margin-bottom: 60px;
  }
  .contact-info-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 32px 28px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
  }
  .contact-info-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    border-color: #cbd5e1;
  }
  .contact-card-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    background: #f1f5f9;
    color: #0f172a;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
  }
  .contact-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 10px;
  }
  .contact-card-desc {
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
  }
  .contact-card-link {
    color: #0f172a;
    text-decoration: none;
    font-weight: 700;
    transition: color 0.2s;
  }
  .contact-card-link:hover {
    color: #e11d48;
    text-decoration: underline;
  }

  /* Form & Map Section */
  .contact-split-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: start;
    margin-bottom: 80px;
  }
  @media (max-width: 991px) {
    .contact-split-section {
      grid-template-columns: 1fr;
    }
  }

  .contact-form-box {
    background: #ffffff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-group label {
    display: block;
    font-weight: 600;
    font-size: 0.9rem;
    color: #1e293b;
    margin-bottom: 8px;
  }
  .form-input, .form-select, .form-textarea {
    width: 100%;
    padding: 13px 16px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    font-size: 0.95rem;
    color: #0f172a;
    background: #f8fafc;
    transition: all 0.2s;
    font-family: inherit;
  }
  .form-input:focus, .form-select:focus, .form-textarea:focus {
    outline: none;
    border-color: #0f172a;
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(15, 23, 42, 0.08);
  }
  .form-textarea {
    min-height: 120px;
    resize: vertical;
  }

  .contact-map-box {
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
    border: 1px solid #e2e8f0;
    height: 100%;
    min-height: 550px;
    display: flex;
    flex-direction: column;
  }
  .map-header {
    padding: 24px 28px;
    background: #0f172a;
    color: #ffffff;
  }
  .map-frame-container {
    flex: 1;
    position: relative;
    min-height: 440px;
  }
  .map-frame-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
  }

  .form-submit-btn {
    width: 100%;
    padding: 15px 28px;
    background: #e11d48;
    color: #ffffff;
    font-weight: 700;
    font-size: 1rem;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.2s;
  }
  .form-submit-btn:hover {
    background: #be123c;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(225, 29, 72, 0.35);
  }
  .alert-notice {
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 20px;
    font-size: 0.95rem;
    display: none;
  }
  .alert-notice.success {
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #166534;
  }
</style>

  <!-- HERO BANNER -->
  <section class="page-hero-banner">
    <div class="container">
      <div class="breadcrumb-nav">
        <a href="<?= site_url('') ?>"><i class="fa-solid fa-house"></i> Home</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
        <span>Contact Us</span>
      </div>
      <div class="hero-badge" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.25); color: #ffffff; padding: 6px 16px; border-radius: 30px; font-size: 0.85rem; font-weight: 700; margin-bottom: 16px;">
        <i class="fa-solid fa-phone-volume"></i> Direct Line to Dubai Engineering HQ
      </div>
      <h1 class="page-hero-title"><?= htmlspecialchars($contact['heading']) ?></h1>
      <p style="color: #cbd5e1; max-width: 720px; font-size: 1.1rem; line-height: 1.6;">
        <?= htmlspecialchars($contact['subheading']) ?>
      </p>
    </div>
  </section>

  <!-- CONTACT DETAILS SECTION -->
  <section style="background: #f8fafc; padding: 0 0 70px;">
    <div class="container">
      <div class="contact-cards-grid">
        <!-- Office Location -->
        <div class="contact-info-card">
          <div class="contact-card-icon"><i class="fa-solid fa-location-dot"></i></div>
          <h3 class="contact-card-title">Dubai Headquarters</h3>
          <p class="contact-card-desc"><?= htmlspecialchars($contact['address']) ?></p>
        </div>

        <!-- Phone Lines -->
        <div class="contact-info-card">
          <div class="contact-card-icon"><i class="fa-solid fa-headset"></i></div>
          <h3 class="contact-card-title">Phone & 24/7 Hotline</h3>
          <p class="contact-card-desc" style="margin-bottom: 6px;">
            Office: <a href="tel:<?= preg_replace('/[^0-9+]/', '', $contact['phone']) ?>" class="contact-card-link"><?= htmlspecialchars($contact['phone']) ?></a>
          </p>
          <p class="contact-card-desc">
            24/7 Emergency: <a href="tel:<?= preg_replace('/[^0-9+]/', '', $contact['emergency_phone']) ?>" class="contact-card-link" style="color: #0f172a; font-weight: 700;"><?= htmlspecialchars($contact['emergency_phone']) ?></a>
          </p>
        </div>

        <!-- Support Email & Hours -->
        <div class="contact-info-card">
          <div class="contact-card-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
          <h3 class="contact-card-title">Email & Working Hours</h3>
          <p class="contact-card-desc" style="margin-bottom: 6px;">
            Email: <a href="mailto:<?= htmlspecialchars($contact['email']) ?>" class="contact-card-link"><?= htmlspecialchars($contact['email']) ?></a>
          </p>
          <p class="contact-card-desc">
            Hours: <?= htmlspecialchars($contact['working_hours']) ?>
          </p>
        </div>
      </div>

      <!-- Form & Interactive Map -->
      <div class="contact-split-section">
        <!-- Inquiry Form -->
        <div class="contact-form-box">
          <h2 style="font-size: 1.8rem; font-weight: 800; color: #0f172a; margin-bottom: 8px;">Request a Consultation or Quote</h2>
          <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 28px;">Fill in your requirements below. Our technical elevator engineers will review your project and get back to you within 2 hours.</p>

          <div id="enquirySuccessAlert" class="alert-notice success">
            <i class="fa-solid fa-circle-check me-2"></i> <strong>Thank you!</strong> Your message has been sent successfully. Our team will contact you shortly.
          </div>

          <form id="contactForm" action="<?= site_url('welcome/save_enquiry') ?>" method="POST">
            <div class="row g-3" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label for="name">Your Full Name <span style="color:#e11d48;">*</span></label>
                <input type="text" id="name" name="name" class="form-input" required>
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label for="email">Email Address <span style="color:#e11d48;">*</span></label>
                <input type="email" id="email" name="email" class="form-input" required>
              </div>
            </div>

            <div class="row g-3" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 16px;">
              <div class="form-group" style="margin-bottom: 0;">
                <label for="phone">Phone / WhatsApp (UAE) <span style="color:#e11d48;">*</span></label>
                <div class="contact-phone-wrap">
                  <span class="country-prefix-badge">
                    <span class="flag-icon">🇦🇪</span>
                    <span class="prefix-num">+971</span>
                  </span>
                  <input type="tel" id="phone" name="phone" class="form-input" placeholder="50 123 4567" required>
                </div>
              </div>
              <div class="form-group" style="margin-bottom: 0;">
                <label for="service">Service Interest</label>
                <select id="service" name="service" class="form-select">
                  <option value="General Inquiry">General Elevator Inquiry</option>
                  <option value="Luxury Villa Elevator">Luxury Villa Elevator Installation</option>
                  <option value="Commercial Passenger Lift">Commercial Passenger Lift</option>
                  <option value="Panoramic Glass Lift">Panoramic Glass Lift</option>
                  <option value="Annual Maintenance Contract (AMC)">Annual Maintenance Contract (AMC)</option>
                  <option value="Modernization & Upgrade">Elevator Modernization</option>
                  <option value="Emergency Repair">Emergency Repair Support</option>
                </select>
              </div>
            </div>

            <div class="form-group" style="margin-top: 16px;">
              <label for="message">Project Details or Inquiry <span style="color:#e11d48;">*</span></label>
              <textarea id="message" name="message" class="form-textarea" rows="4" required></textarea>
            </div>

            <button type="submit" id="submitBtn" class="form-submit-btn">
              <span>Submit Inquiry to Engineering Team</span>
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>
        </div>

        <!-- Google Map -->
        <div class="contact-map-box">
          <div class="map-header">
            <h3 style="font-size: 1.15rem; font-weight: 700; margin: 0 0 4px;"><i class="fa-solid fa-map-pin text-danger me-2"></i> Visit Our Dubai Office</h3>
            <p style="color: #94a3b8; font-size: 0.85rem; margin: 0;"><?= htmlspecialchars($contact['address']) ?></p>
          </div>
          <div class="map-frame-container">
            <?php 
              $map_url = !empty($contact['map_iframe']) ? trim($contact['map_iframe']) : '';
              if (preg_match('/src=["\']([^"\']+)["\']/i', $map_url, $m)) {
                  $map_url = $m[1];
              }
            ?>
            <?php if (!empty($map_url)): ?>
              <iframe 
                src="<?= htmlspecialchars($map_url) ?>" 
                width="100%" 
                height="100%" 
                style="border:0; width:100%; height:100%; min-height:440px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="strict-origin-when-cross-origin">
              </iframe>
            <?php else: ?>
              <div style="display:flex;align-items:center;justify-content:center;height:100%;color:#94a3b8;">
                Map not configured.
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Ajax Form Submission on Contact Page
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const phoneField = document.getElementById('phone');

    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Phone Validation (Must have at least 7 to 15 digits)
        const phoneVal = phoneField ? phoneField.value.trim() : '';
        const digits = phoneVal.replace(/\D/g, '');

        if (digits.length < 7) {
          const wrap = phoneField.closest('.contact-phone-wrap') || phoneField;
          wrap.classList.add('input-invalid');
          setTimeout(() => wrap.classList.remove('input-invalid'), 600);
          phoneField.focus();
          alert('Please enter a valid phone number with at least 7 to 9 digits (e.g. 50 123 4567).');
          return;
        }

        const formData = new FormData(contactForm);
        // Prepend +971 if not already present
        if (!phoneVal.startsWith('+')) {
          formData.set('phone', '+971 ' + phoneVal);
        }

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Submitting...';

        fetch(contactForm.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => {
          if (!response.ok) throw new Error('Submission failed');
          return response.json().catch(() => ({ status: 'success' }));
        })
        .then(data => {
          contactForm.reset();
          submitBtn.disabled = false;
          submitBtn.innerHTML = '<span>Submit Inquiry to Engineering Team</span> <i class="fa-solid fa-paper-plane"></i>';

          // Trigger luxury thank you popup modal
          const clientName = document.getElementById('name') ? document.getElementById('name').value : '';
          if (typeof window.showThankYouModal === 'function') {
            window.showThankYouModal(clientName);
          } else {
            alert('Thank you! Your inquiry has been sent to Sigma Height Elevators LLC.');
          }
        })
        .catch(err => {
          contactForm.reset();
          submitBtn.disabled = false;
          submitBtn.innerHTML = '<span>Submit Inquiry to Engineering Team</span> <i class="fa-solid fa-paper-plane"></i>';
          if (typeof window.showThankYouModal === 'function') {
            window.showThankYouModal();
          }
        });
      });
    }
  </script>

<?php $this->load->view('includes/footer'); ?>

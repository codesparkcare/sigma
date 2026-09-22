<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
?>
  <!-- ==========================================================================
       FOOTER SECTION (COMMON UNIFIED FOOTER)
       ========================================================================== -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-main-grid">

        <!-- Col 1: Brand Info -->
        <div class="footer-brand-col">
          <a href="<?= site_url('') ?>">
            <img src="<?= $base_url ?>assets/Sigma-Elevator-White-logo.png" alt="Sigma Height Elevators" class="footer-logo">
          </a>
          <p class="footer-desc">
            Sigma Height Elevators L.L.C is Dubai's trusted partner for German-engineered vertical transportation,
            custom residential villa lifts, and commercial high-speed passenger systems.
          </p>
          <div class="footer-social-links">
            <a href="https://www.instagram.com/sigmaheight_elevators/" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
              </svg></a>
            <a href="https://www.facebook.com/sigmaheight" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
              </svg></a>
            <a href="https://wa.me/971526405622" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="WhatsApp">
              <i class="fa-brands fa-whatsapp" style="font-size: 1.15rem;"></i>
            </a>
          </div>
        </div>

        <!-- Col 2: Quick Links -->
        <div>
          <h4 class="footer-col-title">Quick Links</h4>
          <ul class="footer-links">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li><a href="<?= site_url('about') ?>">About Us</a></li>
            <li><a href="<?= site_url('services') ?>">All Services</a></li>
            <li><a href="<?= site_url('projects') ?>">All Projects</a></li>
            <li><a href="<?= site_url('contact') ?>">Contact & Enquiry</a></li>
          </ul>
        </div>

        <!-- Col 3: Services Links -->
        <div>
          <h4 class="footer-col-title">Our Services</h4>
          <ul class="footer-links">
            <li><a href="<?= site_url('services') ?>">Home Elevators</a></li>
            <li><a href="<?= site_url('services') ?>">Passenger Elevators</a></li>
            <li><a href="<?= site_url('services') ?>">Panoramic Elevators</a></li>
            <li><a href="<?= site_url('services') ?>">Dumbwaiters</a></li>
          </ul>
        </div>

        <!-- Col 4: Accreditation & Certifications -->
        <div>
          <h4 class="footer-col-title">Accreditations</h4>
          <div class="footer-certifications">
            <div class="cert-badge-row">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
              <span>Dubai Civil Defense (DCD) Certified</span>
            </div>
            <div class="cert-badge-row">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
              </svg>
              <span>EN 81-20/50 European Standard</span>
            </div>
            <div class="cert-badge-row">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" />
                <polyline points="20 6 9 17 4 12" />
              </svg>
              <span>ISO 9001:2015 Certified Quality</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Footer Bottom Strip -->
      <div class="footer-bottom-bar">
        <div>
          <a href="https://codespark.online/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='inherit'">Codespark Software Development. &copy; <?= date('Y') ?>. All Rights Reserved</a>
        </div>

        <div>
          <!-- Elevator Back to Top Button -->
          <button type="button" class="elevator-to-top-btn" id="backToTopBtn" aria-label="Call elevator to top">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <polyline points="18 15 12 9 6 15" />
            </svg>
            <span>Call Lift To Top</span>
          </button>
        </div>
      </div>
    </div>
  </footer>

  <!-- ==========================================================================
       GLOBAL PREMIUM ELEVATOR QUOTE & CONSULTATION POPUP MODAL
       ========================================================================== -->
  <div class="quote-modal-backdrop" id="quoteModalBackdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="quoteModalTitle">
    <div class="quote-modal-dialog" id="quoteModalDialog">
      
      <!-- Close Button -->
      <button type="button" class="quote-modal-close" id="quoteModalCloseBtn" aria-label="Close Quote Form">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <!-- Modal Header -->
      <div class="quote-modal-header">
        <div class="quote-modal-badge">
          <span class="modal-beacon-dot"></span>
          <span>Official Engineering Consultation • EN 81-20 &amp; DCD Compliant</span>
        </div>
        <h2 class="quote-modal-title" id="quoteModalTitle">
          Request An <span class="accent-text">Elevator Engineering Quote</span>
        </h2>
        <p class="quote-modal-subtitle">
          Submit your building specifications below. Our senior Dubai lift engineers will prepare architectural CAD layouts, technical options, and a tailored proposal.
        </p>
      </div>

      <!-- Alert Message Box -->
      <div id="quoteModalAlert" class="quote-modal-alert" style="display: none;"></div>

      <!-- Form Body -->
      <form id="quoteModalForm" action="<?= site_url('welcome/save_enquiry') ?>" method="POST" class="quote-modal-form">
        
        <div class="modal-form-grid">
          <!-- Full Name -->
          <div class="modal-form-field">
            <label for="modalClientName">Full Name <span class="req">*</span></label>
            <div class="modal-input-wrap">
              <svg class="modal-field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </svg>
              <input type="text" id="modalClientName" name="name" placeholder="e.g. Eng. Tariq Al Mansoori" required>
            </div>
          </div>

          <!-- Phone / WhatsApp -->
          <div class="modal-form-field">
            <label for="modalClientPhone">Phone / Mobile (UAE) <span class="req">*</span></label>
            <div class="modal-input-wrap phone-input-wrap">
              <span class="country-prefix-badge">
                <span class="flag-icon">🇦🇪</span>
                <span class="prefix-num">+971</span>
              </span>
              <input type="tel" id="modalClientPhone" name="phone" placeholder="50 123 4567" required>
            </div>
          </div>

          <!-- Email Address -->
          <div class="modal-form-field">
            <label for="modalClientEmail">Email Address <span class="req">*</span></label>
            <div class="modal-input-wrap">
              <svg class="modal-field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,13 2,6" />
              </svg>
              <input type="email" id="modalClientEmail" name="email" placeholder="name@company.com" required>
            </div>
          </div>

          <!-- Service Needed -->
          <div class="modal-form-field">
            <label for="modalServiceType">Elevator Service Needed <span class="req">*</span></label>
            <div class="modal-input-wrap modal-select-wrap">
              <svg class="modal-field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <path d="M7 12l5-5 5 5M7 12l5 5 5-5" />
              </svg>
              <select id="modalServiceType" name="service" required>
                <option value="Home Elevators">Home Elevators (Villas &amp; Palaces)</option>
                <option value="Passenger Elevators">Commercial High-Speed Passenger Elevators</option>
                <option value="Panoramic Elevators">Panoramic Glass Observation Elevators</option>
                <option value="Elevator Modernization">Elevator Modernization &amp; Retrofit</option>
                <option value="Annual Maintenance Contract (AMC)">Annual Maintenance Contract (AMC)</option>
                <option value="Elevator Interior Design">Bespoke Elevator Cabin Interior Design</option>
                <option value="Hospital / Bed Elevators">Hospital &amp; Healthcare Bed Elevators</option>
                <option value="Freight Elevators">Freight, Heavy Cargo &amp; Automobile Lifts</option>
                <option value="Dumbwaiters">Dumbwaiters (Hotels, Restaurants &amp; Villas)</option>
                <option value="Escalators and Moving Walker">Commercial Escalators &amp; Moving Walkways</option>
              </select>
              <div class="modal-select-chevron">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </div>
          </div>
        </div>

        <!-- Project Details / Location Message -->
        <div class="modal-form-field" style="margin-top: 14px;">
          <label for="modalClientMessage">Project Scope, Location &amp; Specifications <span class="req">*</span></label>
          <div class="modal-input-wrap modal-textarea-wrap">
            <svg class="modal-field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="top: 14px;">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
            </svg>
            <textarea id="modalClientMessage" name="message" rows="3" placeholder="e.g. 3-Stop villa lift in Dubai Hills Estate, need titanium gold cabin finish with starlight ceiling and free site survey..." required></textarea>
          </div>
        </div>

        <!-- Submit & Assurance -->
        <div class="modal-form-footer">
          <button type="submit" class="modal-submit-btn" id="modalSubmitBtn">
            <span class="btn-shimmer-effect"></span>
            <span class="btn-text-content">Submit Engineering Quote Request</span>
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </button>

          <div class="modal-footer-assurances">
            <div class="modal-assurance-item">
              <i class="fa-solid fa-shield-halved" style="color: #22c55e;"></i>
              <span>100% Confidential</span>
            </div>
            <div class="modal-assurance-item">
              <i class="fa-solid fa-bolt" style="color: #ff3333;"></i>
              <span>&lt; 15 Min Fast Dispatch</span>
            </div>
            <div class="modal-assurance-item">
              <i class="fa-solid fa-compass-drafting" style="color: #38bdf8;"></i>
              <span>Free On-Site Survey</span>
            </div>
          </div>
        </div>

      </form>

    </div>
  </div>

  <!-- ==========================================================================
       GLOBAL LUXURY THANK YOU SUCCESS POPUP MODAL
       ========================================================================== -->
  <div class="thankyou-modal-backdrop" id="thankYouModalBackdrop" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="thankYouModalTitle">
    <div class="thankyou-modal-dialog" id="thankYouModalDialog">
      <button type="button" class="thankyou-modal-close" id="thankYouModalCloseBtn" aria-label="Close message">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <div class="thankyou-icon-wrap">
        <div class="thankyou-halo-pulse"></div>
        <div class="thankyou-check-circle">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>

      <div class="thankyou-badge">
        <span class="thankyou-beacon-dot"></span>
        <span>INQUIRY TRANSMITTED SUCCESSFULLY</span>
      </div>

      <h2 class="thankyou-modal-title" id="thankYouModalTitle">Thank You!</h2>
      <p class="thankyou-modal-desc" id="thankYouModalDesc">
        Your elevator enquiry has been successfully dispatched to our senior Dubai engineering team. We will review your project requirements and contact you within <strong>15 minutes</strong>.
      </p>

      <div class="thankyou-actions-row">
        <a href="https://wa.me/971526405622" target="_blank" rel="noopener noreferrer" class="thankyou-btn thankyou-whatsapp-btn">
          <i class="fa-brands fa-whatsapp"></i>
          <span>Chat on WhatsApp</span>
        </a>
        <a href="tel:+052-6405622" class="thankyou-btn thankyou-call-btn">
          <i class="fa-solid fa-phone"></i>
          <span>Call 052-6405622</span>
        </a>
      </div>

      <button type="button" class="thankyou-done-btn" id="thankYouDoneBtn">
        <span>Continue Browsing</span>
        <i class="fa-solid fa-arrow-right ms-2"></i>
      </button>
    </div>
  </div>

  <!-- Scripts -->
  <script src="<?= $base_url ?>assets/js/main.js"></script>
</body>
</html>

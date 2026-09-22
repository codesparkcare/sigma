    </main>

    <!-- Admin Footer -->
    <footer class="py-3 px-4 bg-white border-top text-center text-muted" style="font-size: 0.82rem;">
        &copy; <?= date('Y') ?> <strong>Sigma Height Elevators L.L.C</strong> &bull; Dubai, UAE &bull; All Rights Reserved.
    </footer>
</div>
</div>

<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Sidebar responsive toggle
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                sidebar.classList.toggle('show');
                backdrop.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });
    }

    if (backdrop) {
        backdrop.addEventListener('click', function() {
            sidebar.classList.remove('show');
            backdrop.classList.remove('show');
        });
    }

    // Auto fade alerts after 4s
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(function(alert) {
            const bsAlert = bootstrap.Alert.getInstance(alert) || new bootstrap.Alert(alert);
            if (bsAlert) bsAlert.close();
        });
    }, 4500);
</script>
</body>
</html>

<header class="admin-header">
    <div class="header-content">
        <div style="display: flex; align-items: center; gap: 15px;">
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                <i class="fa fa-bars"></i>
            </button>
            <div class="logo">
                <a href="index.php">
                    <img src="../images/BalajiHotelLogo.png" alt="Balaji Hotel" style="max-height: 40px;">
                    <span>Admin Panel</span>
                </a>
            </div>
        </div>
        <div class="header-actions">
            <a href="../index.php" class="btn-site" target="_blank">
                <i class="fa fa-external-link"></i> <span>View Site</span>
            </a>
            <div class="user-menu">
                <span class="username">
                    <i class="fa fa-user"></i> <span><?php echo h($_SESSION['admin_username'] ?? 'Admin'); ?></span>
                </span>
                <a href="logout.php" class="btn-logout">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="mobile-overlay" id="mobileOverlay"></div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('mobileMenuToggle');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('mobileOverlay');
    
    if (menuToggle && sidebar && overlay) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('active');
        });
        
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('active');
        });
    }
});
</script>


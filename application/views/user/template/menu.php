<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="<?= base_url('Dashboard/userPage') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Profile/userProfile') ?>" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Atlet/AtletUser') ?>" class="nav-link"><i class="fas fa-user"></i><span>Atlet</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-calendar"></i><span>Event</span>
                    <p class="badge badge-success">coming soon</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Pertandingan/konfirmasi') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Pembayaran</span></a>
            </li>
        </ul>
    </div>
</nav>
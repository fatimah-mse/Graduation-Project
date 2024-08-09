<!-- nav bar -->
<div class="container-fluid nav-bar p-3 d-flex justify-content-between align-items-center sticky-top">
    <h3 class="panel mb-0">Mse Hotel</h3>
    <a class="logout" href="logout.php" class="btn">Log Out</a>
</div>

<!-- side bar  -->
<div class="side-bar col-sm-12 col-lg-2 col-md-12" id="dashboard-menu" style="z-index: 5; !important; left: 0;">
    <nav class="navbar navbar-expand-lg" style="z-index: 14;">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="pb-1">Admin Panel</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#adminDropdown" aria-controls="adminDropdown" aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features_facilities.php">Features & Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_queries.php">User Queries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rating.php">ٌRating</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="setting.php">setting</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>
</div>
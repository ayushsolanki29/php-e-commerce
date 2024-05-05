
            <!-- Sidebar -->
            <div class="sidebar close">
        <a href="index.php" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Anon</span> Fashion</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="index.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="category.php"><i class='bx bxs-collection'></i>category</a></li>
            <li><a href="sub_category.php"><i class='bx bx-category'></i>sub category</a></li>
            <li><a href="users.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="product.php"><i class='bx bxl-product-hunt'></i>product</a></li>
            <li><a href="orders.php"><i class='bx bx-cart' ></i>orders</a></li>
            <li><a href="#"><i class='bx bxs-contact' ></i>contact</a></li>
            <li><a href="#"><i class='bx bx-comment' ></i>Feedback</a></li>

            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->
     <div class="content">
            <!-- Navbar -->
            <nav>
            <i class='bx bx-menu' onclick="toggleSidebar()"></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>

        </nav>
</div>
        <!-- End of Navbar -->
<header class="header">
    <div class="nav nav-1">
        <section class="flex">
            <a href="home.php" class="logo"><i class="fas fa-house"></i>MyHome</a>

            <ul>
                <li><a href="post_property.php">post property <i class="fas fa-paper-plane"></i></a>
            </ul>
        </section>
    </div>

    <div class="nav nav-2">
        <section class="flex">
            <div id="menu-btn" class="fas fa-bars">
                <div class="menu">
                    <ul>
                        <li><a href="#">My Listings <i class="fas fa-angle-down"></i></a>
                            <ul>
                                <li> <a href="dashboard.php">dashboard</a></li>
                                <li><a href="post_property.php">post_property</a></li>
                                <li><a href="my_listings.php">my listings</a></li>
                            </ul>
                        </li>

                        <li><a href="#">options<i class="fas fa-angle-down"></i></a>
                            <ul>
                                <li> <a href="search.php">filter search</a></li>
                                <li><a href="listings.php">all listings</a></li>
                            </ul>
                        </li>

                        <li><a href="#">My Listings <i class="fas fa-angle-down"></i></a>
                            <ul>
                                <li> <a href="about.php">about</a></li>
                                <li><a href="contact.php">contact</a></li>
                                <li><a href="contact.php#faq">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <ul>
                    <li><a href="saved.php">saved<i class="fas fa-heart"></i></a></li>
                    <li>
                        <ul>
                            <li><a href="#">account <i class="fas fa-angle-down">
                                        <a href="login.php">login.php</a>
                            </li>

                            <a href="register.php">register</a>

                            <?php if ($user_id != '') {
                            ?>
                                <a href="update.php">update profile</a>
                                <a href="user_logout.php" onclick="return confirm('logout from this website?');">logout</a>
                            <?php
                            }
                            ?>
                            </i></a>
                        </ul>
                    </li>
                </ul>
        </section>
    </div>
</header>
    <!-- top Nav---------------------------- -->
    <header>
        <div class="container">
            <!-- <h1>Admin Zone</h1> -->
            <div><h2>Hi, <?php echo $row['first_name'] ?></h2></div>
            <div id="date-time">
                <span id="current-date-time"></span>
            </div> 
            <nav>
                <ul>
                    <li>
                        <div class="homebutton">
                            <img src="../img/home-outline.svg" alt="">    
                            <a href="staffPanel.php" id="homeLink">Home</a>
                        </div>
                    </li>
                    <li><a href="../login/_logout.php" id="logoutLink">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
        <div class="left">
            <div class="about">
                <div class="atitle">
                    <p>Wie ik ben</p>
                </div>
                <div class="aphoto">
                    <?php echo "<img src='$photo' alt='$name'>"; ?>
                </div>
                <div class="atext">
                    <?php echo "Hallo, mijn naam is $name en ik ben een $job. Om meer over mij te weten te komen klik <a href='about.php'>hier</a>;" ?>
                </div>
            </div>
            <div class="submenu">
                <div class="sheader">
                    <h2>Menu</h2>
                </div>
                <ul>
                    <li><a href="home.php">Homepage</a></li>
                    <li><a href="project.php">Projecten</a></li>
                    <li><a href="stage.php">Stages</a></li>
                    <li><a href="cv.php">CV</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="smedia">
                <div class="hsmedia">
                    <p>Volg mij</p>
                </div>
                <?php 
                    echo "<a href='$link'><img src='images/link.jpg' alt='Linkedin'>></a>";
                    echo "<a href='$fb'><img src='images/fb.jpg' alt='Facebook'>></a>"; 
                    echo "<a href='$twit'><img src='images/twit.jpg' alt='Twitter'>></a>";
                ?>
            </div>
            <div class="search">
                <p>Zoeken</p>
                <form action="search.php" method="post">
                    <input type="text" name="search" size="28">
                    <input type="submit" value="Zoek">
                </form>
            </div>
        </div>
        <div class="content">
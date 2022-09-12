<DOCTYPE html>
    <!--to GET the active page from algorithm below (with id).
    Else means whenever no page is activated, then the default page is always 'home'-->
    <?php
    if (isset($_GET['page'])) {
	    $page = $_GET['page'];
    } else {
	    $page = 'home';
    }
    ?>

    <!--this is to connect layout (this php) to bridge (file handshake.php and class.global.php)-->
    <?php
    date_default_timezone_set("Asia/Jakarta");
    include 'handshake.php';
    include 'class.global.php';
    ?>
<style>

    /* this css is for the footer, because if this is included in the style.css file,
    the function for hide and unhide footer cannot work well */
    .footer {
        position: relative;
        width: 100%;
        height: 349px;
        left: 0px;
        background-color: #010555;
        top: 0px;
    }

    /* this algorithm helps the very top php to activate the page we want.
    $page == 'name of the page' is an if condition for a specific solution.
    The solution is in the form of calling out or summoning the page section below (body).
    echo is for calling the section and display block is to modificate css for
    that particular section */
    <?php
	if ($page == 'Aditya') {
		echo 'section#Aditya {
			display: block;
		}';
		$menu_status = 'Aditya';
        'class.footer {top: 3072px;}';
	} else if ($page == 'Brian') {
		echo 'section#Brian {
			display: block;
		}';
		$menu_status = 'Brian';
    } else if ($page == 'Irving') {
		echo 'section#Irving {
			display: block;
		}';
		$menu_status = 'Irving';
    } else if ($page == 'ContactUs') {
		echo 'section#ContactUs {
			display: block;
		}';
		$menu_status = 'ContactUs';
    } else {
		echo 'section#home {
			display: block;
		}';
		$menu_status = 'home';
	}
    ?>
</style>
    <head>
        <title>Gyudon</title>
        <!--a link to style.css file-->
        <link rel="stylesheet" href="style.css">
        <!--a link to google font API file-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">   
        <style>
            /* same thing as the footer, this can work very well if included in the same php file
            not in separate css file. */
            .popme {
                position: fixed;
                width: 960px;
                height: 621px;
                top: calc(50% - 310.5px);
                left: calc(50% - 480px);
                background-color: #010555;
                z-index: 4;
                display: none;
            }
        </style>
    </head>
    <!--outline about the structure is on another file-->
    <body>
        <div gen-cont class="general">
            <div class="nav">
                <div class="logo" style="background-image: url('assets/logo-1.png'); background-size: cover; background-repeat: no-repeat;"></div>
                <div class="nav-menu">
                    <!--this is the navigation menu text, it shows the text and can be clicked to direct user to the specific page.
                    'if' function is to explain the condition when to put the css ':active' to the text (see style.css -> .nav-menu-txt.active)-->
                    <div class="nav-menu-txt <?php if ($menu_status == 'home') { echo 'active'; } ?>" onclick="location.href='?page=home'">Home</div>
                    <div class="nav-menu-txt <?php if ($menu_status == 'Aditya') { echo 'active'; } ?>" onclick="location.href='?page=Aditya'">Aditya</div>
                    <div class="nav-menu-txt <?php if ($menu_status == 'Brian') { echo 'active'; } ?>" onclick="location.href='?page=Brian'">Brian</div>
                    <div class="nav-menu-txt <?php if ($menu_status == 'Irving') { echo 'active'; } ?>" onclick="location.href='?page=Irving'">Irving</div>
                    <div class="nav-menu-txt <?php if ($menu_status == 'ContactUs') { echo 'active'; } ?>" onclick="location.href='?page=ContactUs'">Contact Us</div>
                </div>
            </div>
        </div>
        <section id="home">
            <div class="main-menu">
                <!--the php here is designed to fit the multiple data call, that's why there's a $row = $db->m(); inside it.
                (see the template here: gyudon-db/class/index.php). This specific php is to call out the data, then below it
                will be the php for putting the exact data in the right place.-->
                <?php
                $db = new db();
                $db->q("SELECT
                (SELECT name) AS name,
                (SELECT user_profession.profession FROM user_Profession WHERE personal_data.profession = user_profession.number) AS user_profession,
                (SELECT user_portfolio.image FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_portfolio,
                (SELECT quote) AS quote
                FROM personal_data
                LIMIT 50");
                $rows = $db->m();
                $db->rc();
                $db = null;
                ?>

                <!--this part is to put the data inside div. because the div is using position relative and the data is on one package
                (we can't isolate the data when we use that particular query (see above, SELECT yadayadayada)), therefore we have to build the html
                structure inside php using echo. Each echo calls out one line of HTML except for echo $row, that one is for one row of the data.-->
                <?php               
                foreach ($rows as $row) {
                 echo '<div class="a-card"><div class="artist-card"><img class="artist-img-inside" src="';
                 echo $row['user_portfolio'];
                 echo '"><div class="info-txt"><div class="info-txt-title">';
                 echo $row['name'];
                 echo '</div>';
                 echo '<div class="info-txt-body">';
                 echo $row['user_profession'];
                 echo '</div>';
                 echo '<div class="info-txt-body2">';
                 echo $row['quote'];
                 echo '</div>';
                 echo '</div>';
                 echo '</div>';
                 echo '</div>';
                }
                ?>
            </div>
        </section>
        <!--here, each section is a page, so actually there's no real page, just one html page for 3 section that can be called out
        one by one using php-->
        <section id="Aditya">
                <div class="main-menu2">
                <!--different than row php above, this one is for single data call out (see $single - $db->s();) inside.
                But this kind of php template is also use the same structure, it calls out the query in the top section
                and using echo $single below it.-->
                <div class="header" style="background-image: url('<?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT user_portfolio.image FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_portfolio,
                        (SELECT user_portfolio.user_id FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_id
                        FROM personal_data
                        WHERE user_id = 'VisuardPlus_1'");
                        $single = $db->s();

                        /* here is the echo to put the data */
                        echo $single['user_portfolio'];

                        ?>'); background-size: cover; background-repeat: no-repeat;">
                    <div class="header-overlay"></div>
                    <div class="profile" style="background-image: url('assets/profile.png'); background-size: cover; background-repeat: no-repeat;"></div>
                    <!--same thing, div name is using single calls out data-->
                    <div class="name"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT name) AS name
                        FROM `personal_data`
                        WHERE id = 2");
                        $single = $db->s();
                
                        echo $single['name'];
                
                        ?></div>
                    <!--same thing, single calls out data-->
                    <div class="header-info-txt"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT user_profession.profession FROM user_Profession WHERE personal_data.profession = user_profession.number) AS user_profession
                        FROM personal_data
                        WHERE id = 2
                        LIMIT 50");
                        $single = $db->s();

                        echo $single['user_profession'];

                        ?></div>
                    <!--same thing, single calls out data-->
                    <div class="header-info-txt2"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT quote) AS quote
                        FROM personal_data
                        WHERE id = 2
                        LIMIT 50");
                        $single = $db->s();

                        echo $single['quote'];

                        ?></div>
                </div>
                <div class="bio-title">Artist Biodata</div>
                <div class="bio-cont">
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon hospital.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Born</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT born) AS born
                            FROM `personal_data`
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['born'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon birthplace.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Birth Place</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT user_base.city FROM user_base WHERE personal_data.base = user_base.number) AS user_base
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_base'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon height.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Height</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT height) AS height
                            FROM `personal_data`
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['height'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon blood type.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Blood Type</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT blood) AS blood
                            FROM `personal_data`
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['blood'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon achievement.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Achievement</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT achievement) AS achievement
                            FROM `personal_data`
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['achievement'];

                            ?></div>
                    </div>
                </div>
                <div class="portfolio-title">Portfolio Showcase</div>
                <!--here the structure requeires multiple data call out, so we use the php $rows again-->
                <div class="portfolio-cont">
                    <?php
                    $db = new db();
                    $db->q("SELECT *
                    FROM `user_portfolio`
                    WHERE user_id='VisuardPlus_1'");
                    $rows = $db->m();
                    $db->rc();
                    $db = null;
                    ?>

                    <!--the html structure makes it a very long php text, but the concept is the same, each echo can be
                    an html or one row data call out. why is the structure so long? because it has built-in pop up (line 316 to 333).
                    Why does the pop up need to be inside the php? because for every row.
                    The idea is simple, the pop up is already there everytime, but we call change the display from 'none' to 'block'
                    (line 316, onclick yadayadayada) otherwise, we change the display from 'block' to 'none' as a "back" function 
                    (line 337, onclick yadayadayada) -->
                    <?php
                    foreach ($rows as $row) {
                    echo '<div class="img"><img class="img-port" src="';
                    echo $row['image'];
                    echo '"><div class="img-title">';
                    echo $row['title'];
                    echo '</div>';
                    echo '<div class="img-txt">';
                    echo $row['date'];
                    echo '</div>';
                    echo '<div class="img-btn">';
                    echo '<div class="img-btn-txt" onclick="document.getElementById(\'pop'.$row['id'].'\').style.display=\'block\'">Detail';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div id="pop'.$row['id'].'" class="popme">';
                    echo '<div class="popup-img"><img class="popup-img-inside" src="';
                    echo $row['image'];
                    echo '" alt="">';
                    echo '<div class="popup-img-title">';
                    echo $row['title'];
                    echo '</div>';
                    echo '<div class="popup-img-date">';
                    echo $row['date'];
                    echo '</div>';
                    echo '<div class="popup-img-copyright">';
                    echo 'VISUARD+ © 2022, All Rights Reserved';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="popup-txt">';
                    echo $row['description'];
                    echo '</div>';
                    echo '<div class="popup-btn" onclick="document.getElementById(\'pop'.$row['id'].'\').style.display=\'none\'"><div class="popup-btn-txt">Back';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
                </div>
                <div class="contact-title">Contact Info</div>
                <div class="contact-cont">
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon phone.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Phone Number</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.phone FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_phone
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_phone'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon email.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Email</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.email FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_email
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_email'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon wa.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Whatsapp</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.whatsapp FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_wa
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_wa'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon dc.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Discord</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.discord FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_dc
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_dc'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon ig.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Instagram</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.instagram FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_ig
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_ig'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon fb.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Facebook</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.facebook FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_fb
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_fb'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon twitter.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Twitter</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.twitter FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_twt
                            FROM personal_data
                            WHERE id = 2");
                            $single = $db->s();

                            echo $single['user_twt'];

                            ?></div>
                    </div>
                </div>
        </div>
        </section>
        <!--the structure (html and php) are identical to "Aditya" section, the only different is the query and row name.-->
        <section id="Brian">
                <div class="main-menu2">
                <div class="header" style="background-image: url('<?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT user_portfolio.image FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_portfolio,
                        (SELECT user_portfolio.user_id FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_id
                        FROM personal_data
                        WHERE user_id = 'VisuardPlus_2'");
                        $single = $db->s();

                        echo $single['user_portfolio'];

                        ?>'); background-size: cover; background-repeat: no-repeat;">
                    <div class="header-overlay"></div>
                    <div class="profile" style="background-image: url('assets/profile-brian.jpg'); background-size: cover; background-repeat: no-repeat;"></div>
                    <div class="name"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT name) AS name
                        FROM `personal_data`
                        WHERE id = 3");
                        $single = $db->s();
                
                        echo $single['name'];
                
                        ?></div>
                    <div class="header-info-txt"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT user_profession.profession FROM user_Profession WHERE personal_data.profession = user_profession.number) AS user_profession
                        FROM personal_data
                        WHERE id = 3
                        LIMIT 50");
                        $single = $db->s();

                        echo $single['user_profession'];

                        ?></div>
                    <div class="header-info-txt2"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT quote) AS quote
                        FROM personal_data
                        WHERE id = 3
                        LIMIT 50");
                        $single = $db->s();

                        echo $single['quote'];

                        ?></div>
                </div>
                <div class="bio-title">Artist Biodata</div>
                <div class="bio-cont">
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon hospital.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Born</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT born) AS born
                            FROM `personal_data`
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['born'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon birthplace.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Birth Place</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT user_base.city FROM user_base WHERE personal_data.base = user_base.number) AS user_base
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_base'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon height.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Height</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT height) AS height
                            FROM `personal_data`
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['height'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon blood type.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Blood Type</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT blood) AS blood
                            FROM `personal_data`
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['blood'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon achievement.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Achievement</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT achievement) AS achievement
                            FROM `personal_data`
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['achievement'];

                            ?></div>
                    </div>
                </div>
                <div class="portfolio-title">Portfolio Showcase</div>
                <div class="portfolio-cont">
                    <?php
                    $db = new db();
                    $db->q("SELECT *
                    FROM `user_portfolio`
                    WHERE user_id='VisuardPlus_2'");
                    $rows = $db->m();
                    $db->rc();
                    $db = null;
                    ?>

                    <?php
                    foreach ($rows as $row) {
                    echo '<div class="img"><img class="img-port" src="';
                    echo $row['image'];
                    echo '"><div class="img-title">';
                    echo $row['title'];
                    echo '</div>';
                    echo '<div class="img-txt">';
                    echo $row['date'];
                    echo '</div>';
                    echo '<div class="img-btn">';
                    echo '<div class="img-btn-txt" onclick="document.getElementById(\'pop'.$row['id'].'\').style.display=\'block\'">Detail';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div id="pop'.$row['id'].'" class="popme">';
                    echo '<div class="popup-img"><img class="popup-img-inside" src="';
                    echo $row['image'];
                    echo '" alt="">';
                    echo '<div class="popup-img-title">';
                    echo $row['title'];
                    echo '</div>';
                    echo '<div class="popup-img-date">';
                    echo $row['date'];
                    echo '</div>';
                    echo '<div class="popup-img-copyright">';
                    echo 'VISUARD+ © 2022, All Rights Reserved';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="popup-txt">';
                    echo $row['description'];
                    echo '</div>';
                    echo '<div class="popup-btn" onclick="document.getElementById(\'pop'.$row['id'].'\').style.display=\'none\'"><div class="popup-btn-txt">Back';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
                </div>
                <div class="contact-title">Contact Info</div>
                <div class="contact-cont">
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon phone.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Phone Number</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.phone FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_phone
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_phone'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon email.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Email</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.email FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_email
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_email'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon wa.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Whatsapp</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.whatsapp FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_wa
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_wa'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon dc.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Discord</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.discord FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_dc
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_dc'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon ig.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Instagram</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.instagram FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_ig
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_ig'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon fb.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Facebook</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.facebook FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_fb
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_fb'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon twitter.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Twitter</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.twitter FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_twt
                            FROM personal_data
                            WHERE id = 3");
                            $single = $db->s();

                            echo $single['user_twt'];

                            ?></div>
                    </div>
                </div>
        </div>
        </section>
        <section id="Irving">
                <div class="main-menu2">
                <div class="header" style="background-image: url('<?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT user_portfolio.image FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_portfolio,
                        (SELECT user_portfolio.user_id FROM user_portfolio WHERE personal_data.bg_image = user_portfolio.id) AS user_id
                        FROM personal_data
                        WHERE user_id = 'VisuardPlus_3'");
                        $single = $db->s();

                        echo $single['user_portfolio'];

                        ?>'); background-size: cover; background-repeat: no-repeat;">
                    <div class="header-overlay"></div>
                    <div class="profile" style="background-image: url('assets/profile-irving.jpg'); background-size: cover; background-repeat: no-repeat;"></div>
                    <div class="name"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT name) AS name
                        FROM `personal_data`
                        WHERE id = 1");
                        $single = $db->s();
                
                        echo $single['name'];
                
                        ?></div>
                    <div class="header-info-txt"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT user_profession.profession FROM user_Profession WHERE personal_data.profession = user_profession.number) AS user_profession
                        FROM personal_data
                        WHERE id = 1
                        LIMIT 50");
                        $single = $db->s();

                        echo $single['user_profession'];

                        ?></div>
                    <div class="header-info-txt2"><?php
                        $db = new db();
                        $db->q("SELECT
                        (SELECT quote) AS quote
                        FROM personal_data
                        WHERE id = 1
                        LIMIT 50");
                        $single = $db->s();

                        echo $single['quote'];

                        ?></div>
                </div>
                <div class="bio-title">Artist Biodata</div>
                <div class="bio-cont">
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon hospital.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Born</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT born) AS born
                            FROM `personal_data`
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['born'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon birthplace.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Birth Place</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT user_base.city FROM user_base WHERE personal_data.base = user_base.number) AS user_base
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_base'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon height.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Height</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT height) AS height
                            FROM `personal_data`
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['height'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon blood type.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Blood Type</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT blood) AS blood
                            FROM `personal_data`
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['blood'];

                            ?></div>
                    </div>
                    <div class="icon-pack">
                        <div class="icon-box" style="background-image: url('assets/icon achievement.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title">Achievement</div>
                        <div class="icon-txt"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT achievement) AS achievement
                            FROM `personal_data`
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['achievement'];

                            ?></div>
                    </div>
                </div>
                <div class="portfolio-title">Portfolio Showcase</div>
                <div class="portfolio-cont">
                    <?php
                    $db = new db();
                    $db->q("SELECT *
                    FROM `user_portfolio`
                    WHERE user_id='VisuardPlus_3'");
                    $rows = $db->m();
                    $db->rc();
                    $db = null;
                    ?>

                    <?php
                    foreach ($rows as $row) {
                    echo '<div class="img"><img class="img-port" src="';
                    echo $row['image'];
                    echo '"><div class="img-title">';
                    echo $row['title'];
                    echo '</div>';
                    echo '<div class="img-txt">';
                    echo $row['date'];
                    echo '</div>';
                    echo '<div class="img-btn">';
                    echo '<div class="img-btn-txt" onclick="document.getElementById(\'pop'.$row['id'].'\').style.display=\'block\'">Detail';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div id="pop'.$row['id'].'" class="popme">';
                    echo '<div class="popup-img"><img class="popup-img-inside" src="';
                    echo $row['image'];
                    echo '" alt="">';
                    echo '<div class="popup-img-title">';
                    echo $row['title'];
                    echo '</div>';
                    echo '<div class="popup-img-date">';
                    echo $row['date'];
                    echo '</div>';
                    echo '<div class="popup-img-copyright">';
                    echo 'VISUARD+ © 2022, All Rights Reserved';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="popup-txt">';
                    echo $row['description'];
                    echo '</div>';
                    echo '<div class="popup-btn" onclick="document.getElementById(\'pop'.$row['id'].'\').style.display=\'none\'"><div class="popup-btn-txt">Back';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
                </div>
                <div class="contact-title">Contact Info</div>
                <div class="contact-cont">
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon phone.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Phone Number</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.phone FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_phone
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_phone'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon email.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Email</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.email FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_email
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_email'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon wa.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Whatsapp</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.whatsapp FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_wa
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_wa'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon dc.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Discord</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.discord FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_dc
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_dc'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon ig.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Instagram</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.instagram FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_ig
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_ig'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon fb.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Facebook</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.facebook FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_fb
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_fb'];

                            ?></div>
                    </div>
                    <div class="icon-pack2">
                        <div class="icon-box2" style="background-image: url('assets/icon twitter.png'); background-size: cover; background-repeat: no-repeat;"></div>
                        <div class="icon-title2">Twitter</div>
                        <div class="icon-txt2"><?php
                            $db = new db();
                            $db->q("SELECT
                            (SELECT contact_info.twitter FROM contact_info WHERE personal_data.user_id = contact_info.user_id) AS user_twt
                            FROM personal_data
                            WHERE id = 1");
                            $single = $db->s();

                            echo $single['user_twt'];

                            ?></div>
                    </div>
                </div>
        </div>
        </section>
        <section id="ContactUs">
            <div class="main-menu3">
                <video autoplay="" muted="" loop="" id="myVideo">
                    <source src="anime gif.mp4" type="video/mp4">
                </video>
                <div class="contactus-title">Contact Us</div>
                <div class="sect1">
                    <div class="sect1-title">Social Media</div>
                    <div class="icon-pack3-cont">
                        <div class="icon-pack3">
                            <div class="icon-box3" style="background-image: url('assets/icon wa-putih.png'); background-size: cover; background-repeat: no-repeat;"></div>
                            <div class="icon-pack3-title">Whatsapp</div>
                            <div class="icon-pack3-txt">+64 811 2434 6469</div>
                        </div>
                        <div class="icon-pack3">
                            <div class="icon-box3"  style="background-image: url('assets/icon ig-putih.png'); background-size: cover; background-repeat: no-repeat;"></div>
                            <div class="icon-pack3-title">Instagram</div>
                            <div class="icon-pack3-txt">Visuard_Plus</div>
                        </div>
                        <div class="icon-pack3">
                            <div class="icon-box3" style="background-image: url('assets/icon dc-putih.png'); background-size: cover; background-repeat: no-repeat;"></div>
                            <div class="icon-pack3-title">Discord</div>
                            <div class="icon-pack3-txt">Visuard_Plus#6412</div>
                        </div>
                        <div class="icon-pack3">
                            <div class="icon-box3" style="background-image: url('assets/icon twitter-putih.png'); background-size: cover; background-repeat: no-repeat;"></div>
                            <div class="icon-pack3-title">Twitter</div>
                            <div class="icon-pack3-txt">Visuard_Plus</div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="sect2">
                    <div class="sect2-title">Reach Us</div>
                    <div class="sect2-input-cont">
                        <div class="sect2-input">
                            <h1 class="sect2-input-txt">Name</h1>
                        </div>
                        <div class="sect2-input">
                            <h1 class="sect2-input-txt">Email Address</h1>
                        </div>
                        <div class="sect2-input">
                            <h1 class="sect2-input-txt">Requirement</h1>
                        </div>
                    </div>
                    <div class="sect2-btn">
                        <div class="sect2-btn-txt">Sent!</div>
                    </div>
                </div>
            </div>
        </section>
        <div class="footer">
                <div class="ftr-logo" style="background-image: url('assets/logo-1.png'); background-size: cover; background-repeat: no-repeat;"></div>
                <div class="ftr-txt">VISUARD + is a collective group that mostly
                are a digital media designers. Lorem ipsum 
                dolor sit amet, consectetur adipiscing elit. 
                Sed facilisis eget metus quis vestibulum. 
                Suspendisse consectetur nulla ex, in convallis 
                turpis auctor vel. Nulla quis ipsum sed odio.</div>
                <div class="sitemap">
                    <div class="ftr-title">Site Map</div>
                    <!--This section is similar to navigation, it contains location.href to direct user to a specific page, and
                    it also has variable to change the class with class+'active'-->
                    <div class="ftr-menu">
                        <div class="ftr-menu-txt <?php if ($menu_status == 'home') { echo 'active'; } ?>" onclick="location.href='?page=home'">Home</div>
                        <div class="ftr-menu-txt <?php if ($menu_status == 'Aditya') { echo 'active'; } ?>" onclick="location.href='?page=Aditya'">Aditya</div>
                        <div class="ftr-menu-txt <?php if ($menu_status == 'Brian') { echo 'active'; } ?>" onclick="location.href='?page=Brian'">Brian</div>
                        <div class="ftr-menu-txt <?php if ($menu_status == 'Irving') { echo 'active'; } ?>" onclick="location.href='?page=Irving'">Irving</div>
                        <div class="ftr-menu-txt <?php if ($menu_status == 'ContactUs') { echo 'active'; } ?>" onclick="location.href='?page=ContactUs'">Contact Us</div>
                    </div>
                </div>
                <div class="copyright">VISUARD + © 2022, All Rights Reserved</div>
                <div class="ftr-socmed">
                    <div class="socmed-icon" style="background-image: url('assets/ig.png'); background-size: cover; background-repeat: no-repeat;"></div>
                    <div class="socmed-icon" style="background-image: url('assets/twtr.png'); background-size: cover; background-repeat: no-repeat;"></div>
                    <div class="socmed-icon" style="background-image: url('assets/wa.png'); background-size: cover; background-repeat: no-repeat;"></div>
                    <div class="socmed-icon" style="background-image: url('assets/dc.png'); background-size: cover; background-repeat: no-repeat;"></div>
                </div>
        </div>
        </div>

        <!--no use, we use the pop up inside the php text (each section)-->
        <!--
        <div class="pop-up">
            <div class="popup-cont">
                <div class="popup-img">
                    <img src="assets/header-brian.jpg" alt="">
                    <div class="popup-img-title">Bromance</div>
                    <div class="popup-img-date">24 April 2022</div>
                    <div class="popup-img-copyright">VISUARD+ © 2022, All Rights Reserved</div>
                </div>
                <div class="popup-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non rutrum diam. 
                Sed imperdiet sed massa ut elementum. Fusce finibus sit amet orci ac laoreet. Nullam 
                at mauris in lacus viverra fermentum. Fusce lacinia pulvinar urna sit amet fermentum. 
                Aliquam lobortis magna at sapien fermentum ultrices. Fusce neque arcu, cursus porttitor 
                pharetra quis, rutrum sollicitudin velit. Sed eget nisi mi. Quisque urna arcu, elementum</div>
                <div class="popup-btn">
                    <div class="popup-btn-txt">Back</div>
                </div>
            </div>
        </div>
        -->   
    </body>
</html>
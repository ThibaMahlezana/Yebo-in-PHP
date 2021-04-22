<!--- menu bar  --->
<div class="menu-navbar" data-step="2" data-intro="This is your menu list, it helps you reach different categories of your links easier." data-position='right'>
    <p class="menu-navbar-item">
        <a href="people.php"><i class="flaticon-group41"></i> People </a> 
        <a class="menu-bar-badge"><strong> <?php echo $user_information->getNumFollowersPeople(); ?> </strong></a>
    </p>
    <p class="menu-navbar-item">
        <a href="companies.php"><i class="flaticon-building8"></i> Companies </a>
        <a class="menu-bar-badge"><strong> <?php echo $user_information->getNumFollowersCompanies(); ?> </strong></a>
    </p>
    <p class="menu-navbar-item">
        <a href="posts.php">
            <i class="flaticon-speech59"></i> Posts 
            <a class="menu-bar-badge"><strong> <?php echo $user_information->getTotalNumPosts(); ?> </strong></a>
        </a>
    </p>
    <p class="divider"></p>
    <p class="menu-navbar-item"><a href="search.php"><i class="flaticon-search19"></i> Search </a></p>
</div>

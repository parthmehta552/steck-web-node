<header class="main-header">
  <nav class="navbar navbar-static-top ">
    <div class="container">
      <div class="navbar-header">
        <a href="?sc=Blank" class="navbar-brand"><b>Stecker</b>Code</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <center><span class="caret"></span></center>
        </button>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Query for <span class="caret"></span></a>
            <ul class="dropdown-menu" id="" role="menu">
             
             <?php
             for($i=0;$i<count($_SESSION["querydata"]);$i++){
             ?>
             <li>
    
    <a href="?sc=final&id=<?php echo $_SESSION["querydata"][$i]["_id"]; ?>&lang=<?php echo $_SESSION["querydata"][$i]["name"]; ?>">
       <?php echo $_SESSION["querydata"][$i]["name"]; ?>
    </a>

    </li>
             <?php }?>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Solution for <span class="caret"></span></a>
            <ul class="dropdown-menu" id="" role="menu">
                           
             <?php
             for($i=0;$i<count($_SESSION["querydata"]);$i++){
             ?>
             <li>
    
    <a href="?sc=final2&id=<?php echo $_SESSION["querydata"][$i]["_id"]; ?>&lang=<?php echo $_SESSION["querydata"][$i]["name"]; ?>">
       <?php echo $_SESSION["querydata"][$i]["name"]; ?>
    </a>

    </li>
             <?php }?>


            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- /.messages-menu -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="View/userimg/avatar5.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications Menu -->

          <!-- Tasks Menu -->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo "View/userimg/".$_SESSION["userdata"]["image"]; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs" id="username"><?php echo $_SESSION["userdata"]["name"];?></span>  &nbsp;  <i class="fa fa-navicon"></i>

            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo "View/userimg/".$_SESSION["userdata"]["image"]; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["userdata"]["name"];?>
                  <small>Member since <?php echo  date("F j, Y",strtotime($_SESSION["userdata"]["registerdate"]));?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">  Report</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="?sc=profile" id="other3"> Profile</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="?sc=settings" id="other4">Settings</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?sc=home" id="other1" class="btn btn-default btn-flat">Home</a>
                </div>
                <div class="pull-right">
                  <a href="?sc=logout" id="other2" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>

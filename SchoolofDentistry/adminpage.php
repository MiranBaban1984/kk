<!DOCTYPE html>

<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<title>Bootstrap Agency Template</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->

    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"></li>
        <li></li>
      </ul>
      <div align="right">		
      <?php
				if(isset($_SESSION['admins'])){
					echo "<p> <h3>Your login with   ".$_SESSION['admins']."</h3> </p>";
				}
				?>
    
     <p><h3><a href='sesdestroy.php'>logout</a></h3></p>
     </div>

      <ul class="nav navbar-nav navbar-right">
        <li></li>
        <li class="dropdown">
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a> </li>
            <li><a href="#">Another action</a> </li>
            <li><a href="#">Something else here</a> </li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a> </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<!-- HEADER -->
<header>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-center">Scientific Committee College of Dentistry</h1>
          <p class="text-center">This software has been created by Miran Hikmat Mohammed </p>
          <p class="text-center">University of Sulaimani</p>
          <p class="text-center">Old Campus</p>
          <!-- <p>&nbsp;</p> -->
        </div>
      </div>
    </div>
  </div>
</header>
<!-- / HEADER --> 

<!--  SECTION-1 -->
<section>

    <div class="container">
    <div class="row">



      <div class="col-lg-4 col-sm-12 text-center">
      <a href=../journalteachinsert.php>
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="../journalinfo1.png" data-holder-rendered="true"/>
        <h3>Local Journal</h3>
        <!-- <p>This is journal database management system for saving journal publication information.</p> -->
      </a>
      </div>

      <div class="col-lg-4 col-sm-12 text-center">
      <a href=../international_journal.php>
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="../internationa_journal.png" data-holder-rendered="true"/>
        <h3>International Journal</h3>
        <!-- <p>This is journal database management system for saving journal publication internationally.</p> -->
      </a>
      </div>

      <div class="col-lg-4 col-sm-12 text-center">
      <a href="../bookinfo.php">
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="../booinfo1.png" data-holder-rendered="true"/>
        <h3>Books</h3>
        <!-- <p>This database will save information about the published books.</p> -->
      </a>
      </div>

      <div class="col-lg-4 col-sm-12 text-center">
      <a href="../conferenceinfo.php">
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="../conferenceinfo1.png" data-holder-rendered="true"/>
        <h3>Conference (Scopus Only)</h3>
        
      </a>
      </div>

      <div class="col-lg-4 col-sm-12 text-center">
      <a href="../teacheracad.php">
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="img/1.jpg" data-holder-rendered="true"/>
        <h3>Academic Profile Info.</h3>
        <!-- <p>This section contains details about Satistical</p> -->
      </a>
      </div>

      <div class="col-lg-4 col-sm-12 text-center">
      <a href="../Panel.php">
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="../controlpanel.png" data-holder-rendered="true"/>
        <h3>Database Search</h3>
        <!-- <p>Checking log activity and backup database</p> -->
      </a>
      </div>

      <div class="col-lg-4 col-sm-12 text-center">
      <a href="../statistical.php">
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="stat.png" data-holder-rendered="true"/>
        <h3>Publication Statistics</h3>
        <!-- <p>Statistics of College Research number and Total impact factor</p> -->
      </a>
      </div>


      <div class="col-lg-4 col-sm-12 text-center">
      <a href=../UploadFiles.php>
      <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="img/documents.gif" data-holder-rendered="true"/>
        <h3>Upload Files</h3>
      
      </a>
      </div>


    </div>    
  </div>
  </section>



<footer class="text-center">
  <div class="container">
    <div class="row">
      
      
      <div class="col-xs-12">
      </div>
    
        <div class="col-xs-12">
      </div>
      
          <div class="col-xs-12">
      </div>
    
    
          <div class="col-xs-12">
      </div>
    
        <div class="col-xs-12">
      </div>    
      
  
    
      <div class="col-xs-12">
      </div>
      
          <hr>

    
         <div class="col-xs-12">
           <!-- <p>&nbsp;</p> -->
         </div>
      <div class="col-xs-12">
        <p><em>Miran Baban © College_Dentistry. All rights reserved.</em></p>
      </div>
    </div>
  </div>
</footer>
<!-- / FOOTER --> 


</body>
</html>

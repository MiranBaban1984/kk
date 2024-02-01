<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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


<!-- HEADER -->
<header>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-center">School of Dentistry Exams</h1>
          <p class="text-center">This software has been created by Miran Hikmat Mohammed </p>
          <p class="text-center">University of Sulaimani</p>
          <p class="text-center">Old Campus</p>
          <p>&nbsp;</p>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- / HEADER --> 

<!--  SECTION-1 -->
<section>
  <div class="row"> </div>
  <div class="container ">
    <div class="row">
      <div   align="center"> <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="img/exam.gif" data-holder-rendered="true">
        <h3>Examination Community</h3>
      </div>
      <div class="col-lg-4 col-sm-12 text-center">
</p>
      </div>
    </div>    
  </div>
  
  </div>
</div>
<footer class="text-center">
  <div class="container">
    <div class="row">
    
         <div class="col-xs-12">
           <h2><strong>Please Login Here 
           </strong></h2>
      </div>
    
        <div class="col-xs-12">
        <?php
		
		if(isset($_GET['a'])){
			echo $_GET['a'];
		}
		
		else if(isset($_GET['b'])){
			echo $_GET['b'];

		}
		
		else if(isset($_GET['c'])){
			echo $_GET['c'];
		}
		else{
		}
		
		?>    
      <form method="post" action="../LoginCheckSystem.php">
      <div class="col-xs-12">
        <label for="username">Username:</label>
          <input name="username" type="text" autofocus required="required" id="textfield" value="Username" size="20" maxlength="20">
      </div>
    
        <div class="col-xs-12">
            <label for="password">Password:</label>
            <input name="password" type="password" required="required" id="password" value="password" size="20" maxlength="20">
      </div>
      
          <div class="col-xs-12">
            <input type="submit" name="submit_exam" id="submit_exam" value="Login">
            <input type="reset" name="reset" id="reset" value="Reset">
           </div>
           </form>
           </div>
    
        
        <div class="col-xs-12">
          <p>&nbsp;</p>
      </div>    
      
      <div class="col-xs-12">
        <p>&nbsp;</p>
      </div>
    
      <div class="col-xs-12">
        <p>&nbsp;</p>
      </div>
      
          <hr>
          <div class="col-xs-12">
            <p>&nbsp;</p>
      </div>
    
         <div class="col-xs-12">
           <p>&nbsp;</p>
         </div>
      <div class="col-xs-12">
        <p><em>Miran Baban © School_Dentistry. All rights reserved.</em></p>
      </div>
    </div>
  </div>
</footer>
<!-- / FOOTER --> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>

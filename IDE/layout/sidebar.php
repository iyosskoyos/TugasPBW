<?php  
$link = $_SESSION['position'];
if ($link == 'student') {
    $link = 'std.php';
}else{
  $link = 'lct.php';
}
?>

<div style="width:18%; height: 100%;position:absolute;" class="w3-theme-l4 w3-padding-left">
    <div style="margin: 10px">
       <text style="margin-top:40px;display:block;">You are Logged in as</text>

       <text  style="margin-top:10px;display:block;font-weight: bold; font-size:19px"><?php echo $_SESSION['userid']; ?></text>

       <text  style="margin-top:10px;display:block;font-weight: bold; font-size:19px"><?php echo $_SESSION['name']; ?></text>

       <hr style="display: block;
       margin-top: 0.3em;
       margin-bottom: 30px;
       margin-left: 0px;
       height:5px;
       width:90%" class="w3-theme-l2">

       <img class="w3-border " src="../../img/profile.png"  width="130" height="130"><br>

       <div class="w3-padding-left w3-margin-top" id="leftnav">
           <a href="<?php echo $link ?>" ><i  class = "fa fa-home " style="font-size:30px;margin-right:20px"></i>
            <text style="font-size:20px;">HOME</text>
        </a><br>

        <a href="#" ><i  class = "fa fa-list " style="font-size:28px;margin-right:20px ;margin-top:17px;"></i>
            <text style="font-size:20px;">MY COURSES</text>
        </a><br>

        <a href="#" ><i  class = "fa fa-user " style="font-size:30px;margin-right:20px ;margin-top:17px;"></i>
            <text style="font-size:20px;">MY PROFILE</text>
        </a><br>

        <a href="../../index.php" ><i  class = "fa fa-power-off " style="font-size:28px;margin-right:20px ;margin-top:17px;"></i>
            <text style="font-size:20px;">LOG OUT</text>
        </a><br>

    </div>
</div>
</div>
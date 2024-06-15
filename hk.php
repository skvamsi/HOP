<?php
session_start();
include("BarAndPie.php");
  include("formsEHC.php");
  include("Notice.php");

   //display user_data
  $Id = $_SESSION['id'];
  if (!isset($Id)) {
    header("Location: index.php");
    exit; 
}
  //user
  $query7="select * from users";
  $result7=mysqli_query($con,$query7);

  //display emergency people
  $query1="select * from emergency order by id desc";
  $result1=mysqli_query($con,$query1);
  //display helped people
  $query2="select * from helped order by id desc";
  $result2=mysqli_query($con,$query2);
  //display committee
  $query3="select * from committee order by id desc";
  $result3=mysqli_query($con,$query3);
 
  $query4="select * from users where id = '$Id' limit 1";
  $result4=mysqli_query($con,$query4);
  $pic_data =  mysqli_fetch_assoc($result4);
  //count of users
  $query5 = "SELECT COUNT(id) FROM users";
  $result5 = mysqli_query($con, $query5);
  $row = mysqli_fetch_row($result5);
  $count = $row[0];

  //count of emergency people
  $q = "SELECT COUNT(id) FROM emergency";
  $r = mysqli_query($con, $q);
  $rom = mysqli_fetch_row($r);
  $cnt = $row[0];

  //fetching donation piechart years
  $query7 = "SELECT * FROM barcharts WHERE id = 1 LIMIT 1";
  $red = mysqli_query($con, $query7);
  $years = mysqli_fetch_assoc($red);

  //fetching donation piechart years
  $query11 = "SELECT * FROM barcharts WHERE id = 2 LIMIT 1";
  $red1 = mysqli_query($con, $query11);
  $years1 = mysqli_fetch_assoc($red1);

  //fetching donation piechart years
  $query12 = "SELECT * FROM barcharts WHERE id = 3 LIMIT 1";
  $red2 = mysqli_query($con, $query12);
  $years2 = mysqli_fetch_assoc($red2);

  //fetching helped people piechart years
  $query8 = "SELECT * FROM piecharts WHERE id = 1 LIMIT 1";
  $red1 = mysqli_query($con, $query8);
  $year = mysqli_fetch_assoc($red1);

  $query9 = "SELECT * FROM piecharts WHERE id = 2 LIMIT 1";
  $red2= mysqli_query($con, $query9);
  $year1 = mysqli_fetch_assoc($red2);

  $query10 = "SELECT * FROM piecharts WHERE id = 3 LIMIT 1";
  $red3 = mysqli_query($con, $query10);
  $year2 = mysqli_fetch_assoc($red3);

  $query11 = "SELECT * FROM private ORDER BY id DESC LIMIT 1";
  $red4 = mysqli_query($con, $query11);
  $row10 = mysqli_fetch_assoc($red4);
  if(isset($row10)){
    $_SESSION['last_privateId'] = $row10['id'];
  }
  else {
    $_SESSION['last_privateId'] = 0;
  }

   $query12 = "SELECT * FROM comments ORDER BY id DESC LIMIT 1";
  $red5 = mysqli_query($con, $query12);
  $row11 = mysqli_fetch_assoc($red5);
  if(isset($row11)){
    $_SESSION['last_publicId'] = $row11['id'];
  }
  else {
    $_SESSION['last_publicId'] = 0;
  }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOP</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/cae14f18b4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="hk.css">
  <link rel="stylesheet" href="mbs.css">
  <style type="text/css">
     input[type="file"]{
            display: none;
        }
        #oc-id23{
          display: none;
        }
        #oc-id24{
          display: none;
        }
        .inner-div25 img{
          border-radius: 1em;
        }

  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="hcall.js"></script>
  <script src="ad.js"></script>
  <script src="import.js"></script>
  <script src="pub.js"></script>
  <script src="privas.js"></script>
   <script src="srec.js"></script>
  <script src="del.js"></script>
  <script src="del1.js"></script>
  <script src="del2.js"></script>
   <script src="sorts.js"></script>
  <script src="msdel.js"></script>
  <script src="mbcl.js"></script>
  <script src="smd_peop.js"></script>
  <script src="smb_search.js"></script>
  <script src="remove_dp.js"></script>
  <script src="update_dp.js"></script>
  <script src="adminValid.js"></script>
  <script src="MbCards.js"></script>

  <script type="text/javascript">
    // Load messages initially
    loadMessages();
  
    window.addEventListener('resize', function() {
      var div = document.querySelector('#mb4'); // Select the element with id "mb4"
       var inputDiv1 = document.getElementById('oc-id1');
      
      if (window.innerWidth > 768 && div.classList.contains('visible')) {
        div.classList.remove('visible'); 
        inputDiv1.style.display = "block"; 
      }
    });

    window.addEventListener('resize', function() {
      var div = document.querySelector('#smd-people'); // Select the element with id "mb4"
       var inputDiv1 = document.getElementById('oc-id11');
      
      if (window.innerWidth > 768 && div.classList.contains('visible')) {
        div.classList.remove('visible'); 
        inputDiv1.style.display = "block"; 
      }
    });

    window.addEventListener('resize', function() {
      var div = document.querySelector('#mb7'); // Select the element with id "mb4"
       var inputDiv1 = document.getElementById('oc-id1');
      
      if (window.innerWidth > 768 && div.classList.contains('visible')) {
        div.classList.remove('visible'); 
        inputDiv1.style.display = "block"; 
      }
    });


    $(document).ready(function() {
  $('.hover-video').hover(
    function() {
      $(this).get(0).play();
      $(this).prop('muted', false);
    },
    function() {
      $(this).get(0).pause();
      $(this).get(0).currentTime = 0;
      $(this).prop('muted', true);
    }
  );
});


//comment deletion private
    function msdel1(arg) {
    $.ajax({
        url: "msdele1.php",
        method: "POST",
        data: { id: arg },
        success: function(response) {
            if (response) {
                alert(response); // If response is not empty, show the response message
            } else {
                alert(response); // If response is empty, show an alert
            }
        }
    });
}

     function retreat() {
    var inputDiv22 = document.getElementById('oc-id22');  
    var inputDiv67 = document.getElementById('oc-id67');  
    var inputDiv23 = document.getElementById('oc-id23');
    var inputDiv24 = document.getElementById('oc-id24');
    var inputDiv7 = document.getElementById('oc-id7');
    var inputDiv8 = document.getElementById('oc-id8');
    var inputDiv9 = document.getElementById('oc-id9');
    
        inputDiv7.style.display = "none";
        inputDiv23.style.display = "none";
        inputDiv24.style.display = "none";
        inputDiv8.style.display = "none";
        inputDiv9.style.display = "none";
        inputDiv22.style.display = "block";
        inputDiv67.style.display = "block";
    }



      function interface(ar) {
         $.ajax({
                url:"interface.php",
                method:"POST",
                data:{id:ar},
                success:function(response){
                  document.getElementById('inter').innerText = response;

                }
            });

      }


     function show_flip(arg) {
  // alert(arg);
    var post = document.getElementById(arg);
    var flipCardInner = post.querySelector('.flip-card-inner');

    if (flipCardInner.style.transform === "rotateY(180deg)") {
      flipCardInner.style.transform = "rotateY(0deg)";
    } else {
      flipCardInner.style.transform = "rotateY(180deg)";
    }
  }

    function show_help(arg) {
    var flipCardInner = document.getElementById('helpers_info_' + arg);

    if (flipCardInner) {
        if (flipCardInner.style.transform === "rotateY(180deg)") {
            flipCardInner.style.transform = "rotateY(0deg)";
        } else {
            flipCardInner.style.transform = "rotateY(180deg)";
        }
    } else {
        console.error("Element with id 'helpers_info_" + arg + "' not found.");
    }
  }

   function show_com(arg) {
    var flipCardInner = document.getElementById('committee_' + arg);

    if (flipCardInner) {
        if (flipCardInner.style.transform === "rotateY(180deg)") {
            flipCardInner.style.transform = "rotateY(0deg)";
        } else {
            flipCardInner.style.transform = "rotateY(180deg)";
        }
    } else {
        console.error("Element with id 'helpers_info_" + arg + "' not found.");
    }
  }

  function show_cm(arg) {
    var flipCardInner = document.getElementById('sort_' + arg);

    if (flipCardInner) {
        if (flipCardInner.style.transform === "rotateY(180deg)") {
            flipCardInner.style.transform = "rotateY(0deg)";
        } else {
            flipCardInner.style.transform = "rotateY(180deg)";
        }
    } else {
        console.error("Element with id 'helpers_info_" + arg + "' not found.");
    }
  }


  //admin cards

    function shflip(arg) {
    var post = document.getElementById(arg);
    var flipCardInner = document.getElementById('eme_' + arg);

    if (flipCardInner.style.transform === "rotateY(180deg)") {
      flipCardInner.style.transform = "rotateY(0deg)";
    } else {
      flipCardInner.style.transform = "rotateY(180deg)";
    }
  }

  //helped admin card
   function shflip1(arg) {
    var post = document.getElementById(arg);
    var flipCardInner = document.getElementById('help_' + arg);

    if (flipCardInner.style.transform === "rotateY(180deg)") {
      flipCardInner.style.transform = "rotateY(0deg)";
    } else {
      flipCardInner.style.transform = "rotateY(180deg)";
    }
  }

    //commit admin card
   function shflip2(arg) {
    var post = document.getElementById(arg);
    var flipCardInner = document.getElementById('commit_' + arg);

    if (flipCardInner.style.transform === "rotateY(180deg)") {
      flipCardInner.style.transform = "rotateY(0deg)";
    } else {
      flipCardInner.style.transform = "rotateY(180deg)";
    }
  }
  </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mb1">
  <div class="container">
    <a class="navbar-brand" href="#">HOP</a>
    <!-- Navbar content -->
    <div class="inner-div1">
        <?php
            if(isset($pic_data)){

                echo "<img src='uploads/".$pic_data['image']."' width='100% ' height='100%'>";
              }else{
                echo "<img src='de.jpg'>";
              }

        ?>
        <div class="inner-div49"><?php echo $pic_data['name'];?> </div>
        <div class="inner-div95"><span>  <input type="file" id="profilePicInput" accept="image/*">
       <label for='pr-img' style="cursor:pointer;" onclick="triggerFileInput()">Update</label></span> || <span onclick="remove_dp(<?php echo $pic_data['id'];?>)">Remove</span></div>
      </div>
      <div class="inner-div2 d-flex">
        <div class="inner-div74" id="n-name">
          
        </div>
        <div class="inner-div75" id="notice">
          ..NOTICE BOARD..
        </div>
     <script type="text/javascript">
        var jsonData = <?php echo $json_data; ?>;
        var index = 0;
        
        function displayData() {
            // Display the data in the scrolling container
            document.getElementById('n-name').innerHTML = jsonData[index].name;
            document.getElementById('notice').innerHTML = jsonData[index].need;
            
            // Increment the index or reset to 0 if reached the end of data
            index = (index + 1) % jsonData.length;
        }
        
        // Call the displayData function every 10 seconds
        setInterval(displayData, 10000);
        
        // Initial call to display data immediately
        displayData();
    </script>
      </div>
  </div>
</nav>

<div class="container-fluid mt-0">
  <div class="row">
    <!-- first one -->
  <div class="col-lg-2 col-md-6 col-sm-12 full-height1" id="mb2">
    <div class="inner-div100">
      <div class="inner-div3 d-flex" onclick="Qucik_Donation()">
       QUICK DONATION
       <i class="fa-solid fa-tower-broadcast"></i>
      </div>
      <div class="inner-div3 d-flex" onclick="Helped_People()">
        HELPED PEOPLE
        <i class="fa-regular fa-hospital"></i>
      </div>
      <div class="inner-div3 d-flex" onclick="Committee_Members()">
        COMMITTEE MEMBERS
        <i class="fa-solid fa-hospital-user"></i>
      </div>
      <div class="inner-div3 d-flex" onclick="Donation(1)">
        DONATION
        <i class="fa-solid fa-hand-holding-heart"></i>
      </div>
      <div class="inner-div3 d-flex" onclick="Messenger()">
        HOP Messenger
        <i class="fa-solid fa-link"></i>
      </div>
      <div class="inner-div3 d-flex" onclick="Admin()">
        HOP-Admin
        <i class="fa-solid fa-lock"></i>
      </div>
    </div>
    </div>
    <div class="mb-div1">
       <i class="fa-solid fa-tower-broadcast" onclick="Qucik_Donation()"></i>
        <i class="fa-regular fa-hospital" onclick="Helped_People()"></i>
        <i class="fa-solid fa-hospital-user" onclick="Committee_Members()"></i>
        <i class="fa-solid fa-hand-holding-heart" onclick="Donation(1)"></i>
        <i class="fa-solid fa-link" onclick="Messenger()"></i>
        <i class="fa-solid fa-lock" onclick="Admin()"></i>
        <i class="fa-regular fa-user" onclick="mb_profile()"></i>
    </div>
      <!-- user section-->
      <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="mb7">
        <div class="mb-div10"></div>
        <div class="mb-div11">
          <div class="mb-div13"><?php echo $pic_data['name'];?></div>
          <div class="mb-div14">
            <div class="mb-div17">
              <div class="mb-div18">
                ID :<br><i><?php echo $pic_data['user_id'];?></i>
              </div>
              <div class="mb-div18">
                Email :<br><i><?php echo $pic_data['email'];?></i>
              </div>
            </div>
            <div class="mb-div19">
              ..Quick Donation Status..<br>
              <?php echo $cnt;?>
            </div>
          </div>
          <div class="mb-div15">
            <div class="mb-div16" onclick="triggerFileInput()">Update Dp</div>
            <div class="mb-div16" onclick="remove_dp(<?php echo $pic_data['id'];?>)">Delete Dp</div>
        </div>

        </div>
        <div class="mb-div12"><?php
            if(isset($pic_data)){

                echo "<img src='uploads/".$pic_data['image']."' width='100% ' height='100%'>";
              }else{
                echo "<img src='de.jpg'>";
              }

        ?></div>

      </div>
       <div class="col-lg-8 col-md-6 col-sm-12 full-height2 vk" id="mb4">
          <div class="mb-div3">
            <div class="mb-div4">
            <label>Committee Members</label>
              <div class="mb-div5">
                <div class="mb-div6" onclick="Sort('core')">
                  <label>CORE</label>
                </div>
                <div class="mb-div6" onclick="Sort('AHR')">
                  <label>AHR</label>
                </div>
                <div class="mb-div6" onclick="Sort('HR')">
                  <label>HR</label>
                </div>
              </div>
            </div>
            <div class="mb-div4">
               <label>Donation Status</label>
              <div class="mb-div5">
                <div class="mb-div6" onclick="pies123(<?php echo $years['years'];?>)">
                  <label><?php echo $years['years'];?></label>
                </div>
                <div class="mb-div6" onclick="pies_formation(<?php echo $years1['years'];?>)">
                  <label><?php echo $years1['years'];?></label>
                </div>
                <div class="mb-div6" onclick="pies_creation(<?php echo $years2['years'];?>)">
                  <label><?php echo $years2['years'];?></label>
                </div>
              </div>
            </div>
            <div class="mb-div4">
               <label>Helped People</label>
              <div class="mb-div5">
                <div class="mb-div6" onclick="helped_pie1(<?php echo $year['years'];?>)">
                 <label><?php echo $year['years'];?></</label> 
                </div>
                <div class="mb-div6" onclick="helped_pie2(<?php echo $year1['years'];?>)">
                  <label><?php echo $year1['years'];?></label>
                </div>
                <div class="mb-div6" onclick="helped_pie3(<?php echo $year2['years'];?>)">
                  <label><?php echo $year2['years'];?></label>
                </div>
              </div>
            </div>
          </div>
       </div>
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2 vk" id="oc-id1">
      <div class="inner-div50" id="mb5">
        <?php //emergency people

          foreach($result1 as $ROW1)
          {
            include("item-e.php");
          }

          ?>
   
      </div>
    </div>

    <!-- helped people -->
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id2">
      <div class="inner-div50">
      
        <?php //helped people

          foreach($result2 as $ROW2)
          {
            include("item-h.php");
          }

          ?>
      
    </div>
    </div>

    <!-- committee members -->
    
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id3">
      <div class="inner-div50">
      <?php //committee people

          foreach($result3 as $ROW3)
          {
            include("item-c.php");
          }

          ?>

    </div>
    </div>
<div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id20">
      <div class="inner-div50" id="oc-id21">
         <!-- sorted included position -->
      </div>
    </div>
    <!-- donation -->
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id4">
      <div class="inner-div23 d-flex">
        ..The best way to find yourself is to lose yourself in the service of others..
      </div>
      <div class="inner-div22 d-flex">
        <div class="inner-div24 d-flex">
          Help as Much as You Can
          <img src="Scanner.jpg">
        </div>
        <div class="mb-div7">
          <!-- mobile div data donation  -->
          <div class="mb-div30">
            ..YEARLY DATA..
          </div>
          <div class="mb-div31" id="mb-id1">
            <div class="mb-div32">
              <div class="mb-div33"><?php echo $years['years'];?></div>
              <div class="mb-div33"><?php echo $years1['years'];?></div>
              <div class="mb-div33"><?php echo $years2['years'];?></div>
            </div>
            <div class="mb-div35">
              <div class="mb-div34"><?php echo $years['data'];?></div>
              <div class="mb-div34"><?php echo $years1['data'];?></div>
              <div class="mb-div34"><?php echo $years2['data'];?></div>
            </div>
          </div>

          <div class="mb-div31" id="mb-id2">
            <div class="mb-div32">
              <div class="mb-div33"><?php echo $year['years'];?></div>
              <div class="mb-div33"><?php echo $year1['years'];?></div>
              <div class="mb-div33"><?php echo $year2['years'];?></div>
            </div>
            <div class="mb-div35">
              <div class="mb-div34"><?php echo $year['data'];?></div>
              <div class="mb-div34"><?php echo $year1['data'];?></div>
              <div class="mb-div34"><?php echo $year2['data'];?></div>
            </div>
          </div>

        </div>
        <div class="inner-div25 d-flex" id="code">
           <!-- cheked important charts -->
           Stay tuned! We're working behind the scenes to make things happen. Thanks for hanging tight!
        </div>
      </div>
    </div>

    <!-- messenger -->
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id5">
       <div class="inner-div23 d-flex">
        ..Turn your Wounds into Wisdom..
      </div>
      <div class="inner-div22 d-flex">

        <div class="inner-div26">
          <div class="inner-div27">
             <input type="text" name="ms" id= "srch"class="form-control" placeholder="Search..">
            <div class="inner-div28 d-flex"><?php echo $count?></div>  
          </div>
          <div class="inner-div90" id="oc-id100">
             <!-- chat people included area -->
          </div>
    
        </div>
        
       <div class="inner-div60" id="oc-id13">

              <i class="fa-brands fa-searchengin" style="float:left" id ="smd" onclick="smd_people()"></i>
        
          <div class="inner-div61">
            <center>On Public Chat Room</center>
          </div>

          <div class="inner-div62" id="smd-people">

             <div class="inner-div27">
             <input type="text" name="ms" id= "srch1"class="form-control" placeholder="Search..">
            <div class="inner-div28 d-flex"><?php echo $count?></div>  
          </div>
          <div class="inner-div90" id="oc-id101">
             <!-- chat people included area -->
          </div>
            <!-- private persons area -->
          </div>

          <div class="inner-div62" id="oc-id11">

            <!-- comments including area -->
          </div>
          <div class="inner-div63">
              <div class="inner-div88"><input type="file" name="pu_img" id="p-img" accept="image/*"><label for="p-img"><i class="fa-solid fa-photo-film" id="i1"></i></label>
             <input type="file" name="pu_vid" id="p-vid" accept="video/*"><label for="p-vid"><i class="fa-solid fa-film" id="i2"></i></label></div>
              <input type="textarea" name="comment" placeholder="Share with us.." class="form-control" id="message">
              <button type="submit" name="cmt-btn" class="btn btn-secondary" onclick="Msg(<?php echo $Id;?>)"><i class="fa-solid fa-paper-plane"></i></button>

          </div>
       </div>

       <!-- pesonal comments system -->
       <div class="inner-div60" id="oc-id14">
        <i class="fa-solid fa-backward-step" style="float:left"  onclick="reverse()" id ="rer"></i>
          <div class="inner-div61" id="inter" style="justify-content: center; text-align: center;overflow: hidden;">
            
          </div>
          <div class="inner-div62" id="oc-id12">
            <!-- private system -->
          </div>
          <div class="inner-div63">
              <div class="inner-div88">
                  <input type="file" name="pu_img" id="pimg" accept="image/*"><label for="pimg"><i class="fa-solid fa-photo-film" id="i1"></i></label>

                  <input type="file" name="pu_vid" id="pvid" accept="video/*"><label for="pvid"><i class="fa-solid fa-film" id="i2"></i></label>
              </div>
              <input type="textarea" name="comment" placeholder="share with us.." class="form-control" id="message1">
              <input type="hidden" name="Chat_id" value="" id="chater">
              <button type="submit" name="cmt-btn" class="btn btn-secondary" onclick="Msg1(<?php echo $Id;?>)"><i class="fa-solid fa-paper-plane"></i></button>

          </div>
       </div>
       
      </div>
    </div>

    <!-- admin -->
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id6">
      <div class="inner-div47">
  
        <center><b>Admin Access Only</b></center>
        <label for="adNa-1">Name:</label>
        <input type="text" class="form-control" placeholder="Enter Admin Name.." name = "Ad-name" id="ad-1">
        <label for="adNa-2">Password:</label>
        <input type="password" class="form-control" placeholder="Enter Admin password.." name = "Ad-password" id="ad-2">
        <div class="inner-div48">
          <center><button type="button" class="btn btn-primary " id="sub4" onclick="admi()">Submit</button></center>
        </div>

      </div>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-12 full-height2" id="oc-id10">
       <center><b> WElCOME TO THE ADMIN ACCESS AREA</b></center>
        <div class="inner-div80" id="oc-id22">
          <div class="inner-div81" onclick="charts()"><label>Barcharts data</label></div>
          <div class="inner-div82" onclick="chart()"><label>Piecharts data</label></div>
        </div>
        <div class="inner-div200" id="oc-id67">
          <img src="fey.jpg" width="100%" height="100%">
        </div>
        <div class="inner-div83" id="oc-id23">
          
          <i class="fa-solid fa-backward-step" onclick="retreat()" style="float:left;cursor: pointer;"></i>
          <form method="post" onsubmit="return validateForm()">
          <center><b>..BARCHARTS DATA ENTRY..</b></center>
          
          <div class="inner-div84">
            <div class="inner-div85">
              <div class="inner-div86">
                *Year one :
                <input type="text" name="y1" id="bid1" class="form-control" placeholder="Enter year one..">
              </div>
              <div class="inner-div86">
                *Year Two :
                <input type="text" name="y2"id="bid2"v class="form-control" placeholder="Enter year two..">
              </div>
              <div class="inner-div86">
                *Year three :
                <input type="text" name="y3" id="bid3" class="form-control" placeholder="Enter year three..">
              </div>
            </div>
            <div class="inner-div85">
              <div class="inner-div86">
                *Year one data :
                <input type="text" name="y4" id="did1" class="form-control"placeholder="Enter year one data..">
              </div>
              <div class="inner-div86">
                *Year Two data :
                <input type="text" name="y5" id="did2" class="form-control" placeholder="Enter year two data..">
              </div>
              <div class="inner-div86">
                *Year three data :
                <input type="text" name="y6" id="did3" class="form-control" placeholder="Enter year three data..">
              </div>
            </div>
          </div>
           <div class="inner-div87"><button type="submit" class="btn btn-primary" name="z-btn">submit</button></div>
         </form>
        </div>
        <div class="inner-div83" id="oc-id24">
          <i class="fa-solid fa-backward-step" style="float:left;cursor: pointer"  onclick="retreat()"></i>
           <center><b>..PIECHARTS DATA ENTRY..</b></center>
            <form method="post" onsubmit="return validateForm1()">
          <div class="inner-div84">
           
            <div class="inner-div85">
              <div class="inner-div86">
                *Year one :
                <input type="text" name="p1" id="bid4" class="form-control" placeholder="Enter year one..">
              </div>
              <div class="inner-div86">
                *Year Two :
                <input type="text" name="p2" id="bid5" class="form-control" placeholder="Enter year two..">
              </div>
              <div class="inner-div86">
                *Year three :
                <input type="text" name="p3" id="bid6" class="form-control" placeholder="Enter year three..">
              </div>
            </div>
            <div class="inner-div85">
              <div class="inner-div86">
                *Year one data :
                <input type="text" name="p4" id="did4" class="form-control" placeholder="Enter year one data..">
              </div>
              <div class="inner-div86">
                *Year Two data :
                <input type="text" name="p5" id="did5" class="form-control" placeholder="Enter year two data..">
              </div>
              <div class="inner-div86">
                *Year three data :
                <input type="text" name="p6" id="did6" class="form-control" placeholder="Enter year three data..">
              </div>
            </div>
          </div>
          <div class="inner-div87"><button type="submit" class="btn btn-primary" name="p-btn">submit</button></div>
        </form>
        </div>
      <div class="inner-div46" id="oc-id7">
        <i class="fa-solid fa-backward-step" style="float:left;cursor: pointer"  onclick="retreat()" ></i><i class="fa-solid fa-address-card" id="ic-mb" onclick="cards1()"></i>
        <center><b>Emergency</b></center>


      <!-- emergecy cards -->
       <div class="inner-div72" id="mb-id3">
         <?php //emergency people

          foreach($result1 as $ROW1)
          {
            include("item-eA.php");
          }

          ?>
       </div>
       <div class="inner-div45" id="mb-id4">
        <form method="post" enctype="multipart/form-data" onsubmit="return emeValid()">
         <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control H" id="Name0" placeholder="Enter name.." name="e-name">
          </div>
          <div class="form-group">
            <label for="Id">Id:</label>
            <input type="text" class="form-control H" id="Id0" placeholder="Enter Id Number.." name="e-id">
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control H" id="city0" placeholder="Enter City.." name="e-city">
          </div>
          <div class="form-group">
            <label for="city">Help:</label>
            <textarea  class="form-control H" id="Em-txt" placeholder="Enter Need.." rows="3" name="e-txt"></textarea>
          </div>
           <div class="form-group" id="upic">
            <i class="fa-solid fa-id-badge"></i>
            <input type="file" name="e-image" id="e-img" accept="image/*">
            <label for="e-img" style="cursor:pointer;">Update pic</label>
        </div>

         <center><button type="submit" class="btn btn-primary" id="sub1" name="e-btn">Submit</button></center>
        </form>
      </div>

      </div>

      <div class="inner-div46" id="oc-id8">
           <i class="fa-solid fa-backward-step" style="float:left;cursor: pointer"  onclick="retreat()" ></i><i class="fa-solid fa-address-card" id="ic-mb" onclick="cards2()"></i>
      <center><b> Helped People</b></center>
   
      <!-- //cared of helped -->
      <div class="inner-div72" id="mb-id5">
         <?php 

          foreach($result2 as $ROW2)
          {
            include("item-hA.php");
          }

          ?>
       </div>

      <div class="inner-div45" id="mb-id6">
        <form method="post" enctype="multipart/form-data" onsubmit="return helValid()">
          <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control H" id="Name1" placeholder="Enter name.." name="h-name">
          </div>
          <div class="form-group">
            <label for="Id">Id:</label>
            <input type="text" class="form-control H" id="Id1" placeholder="Enter Id Number.." name="h-id">
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control H" id="city1" placeholder="Enter City.." name="h-city">
          </div>
          <div class="form-group">
            <label for="campus1">Campus:</label>
            <input type="text" class="form-control H" id="campus1" placeholder="Enter Campus.." name="h-campus">
          </div>
          <div class="form-group">
            <label for="Em-txt2">Personal Information:</label>
            <textarea  class="form-control H" id="Em-txt2" placeholder="Enter Need.." rows="3" name="h-txt"></textarea>
          </div>
          <div class="form-group" id="upic">
            <i class="fa-solid fa-id-badge"></i>
            <input type="file" name="h-image" id="h-img" accept="image/*">
            <label for="h-img" style="cursor:pointer;">Update pic</label>
        </div>
         <center><button type="submit" class="btn btn-secondary" id="sub2" name="h-btn">Submit</button></center>
        </form>
      </div>
    </div>
    <div class="inner-div46" id="oc-id9">
      <i class="fa-solid fa-backward-step" style="float:left;cursor: pointer"  onclick="retreat()" ></i><i class="fa-solid fa-address-card" id="ic-mb" onclick="cards3()"></i>

      <center><b>Committee</b></center>
      
       <div class="inner-div72" id="mb-id7">
         <?php 

          foreach($result3 as $ROW3)
          {
            include("item-cA.php");
          }

          ?>
       </div>
     
      <div class="inner-div45" id="mb-id8">
        <form method="post" enctype="multipart/form-data" onsubmit="return cmtValid()">
          <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control H" id="Name2" placeholder="Enter name.." name="c-name">
          </div>
          <div class="form-group">
            <label for="Id">Id:</label>
            <input type="text" class="form-control H" id="Id2" placeholder="Enter Id Number.." name="c-id">
          </div>
          <div class="form-group">
            <label for="core">Position:</label>
            <input type="text" class="form-control H" id="core2" placeholder="Enter Position.." name="c-city">
          </div>
          <div class="form-group">
            <label for="campus2">Campus:</label>
            <input type="text" class="form-control H" id="campus2" placeholder="Enter Campus.." name="c-campus">
          </div>
          <div class="form-group">
            <label for="city">Personal Information:</label>
            <textarea  class="form-control H" id="Em-txt3" placeholder="Enter Need.." rows="3" name="c-txt"></textarea>
          </div>
           <div class="form-group" id="upic">
            <i class="fa-solid fa-id-badge"></i>
            <input type="file" name="c-image" id="c-img1" accept="image/*">
            <label for="c-img1" style="cursor:pointer;">Update pic</label>
        </div>

         <center><button type="submit" class="btn btn-button " id="sub3" name="c-btn">Submit</button></center>
        </form>
      </div>

</div>
  
  
      <div class="inner-div41 d-flex">
        <div class="inner-div42 d-flex" onclick="Emergency()">
          Emergency
        </div>
        <div class="inner-div43 d-flex" onclick="Helpers()">
          Helped 
        </div>
        <div class="inner-div44 d-flex" onclick="Commit()">
          Committee
        </div>

      </div>
    </div>

      <!-- thrid one -->

      <div class="mb-div2" onclick="chargeSheet()">
        <center>Stastical Data</center>
      </div>
    <div class="col-lg-2 col-md-6 col-sm-12 full-height3" id="mb3">
     
     <div class="inner-div9 d-flex">
        ..Committee Members..
        <div class="inner-div78">
          <div class="inner-div79 d-flex" onclick="Sort('core')">Core Members</div>
          <div class="inner-div79 d-flex" onclick="Sort('hr')">HR Members</div>
          <div class="inner-div79 d-flex" onclick="Sort('ahr')">AHR Members</div>
        </div>
      </div>
       <div class="inner-div10 d-flex">
        ..Donation Status..
        <div class="inner-div78">
          <div class="inner-div79 d-flex" onclick="pies123(<?php echo $years['years'];?>)"><?php echo $years['years'];?></div>
          <div class="inner-div79 d-flex" onclick="pies_formation(<?php echo $years1['years'];?>)"><?php echo $years1['years'];?></div>
          <div class="inner-div79 d-flex" onclick="pies_creation(<?php echo $years2['years'];?>)"><?php echo $years2['years'];?></div>
        </div>
      </div>
       <div class="inner-div11 d-flex">
        ..Helped People..
        <div class="inner-div78">
          <div class="inner-div79 d-flex" onclick="helped_pie1(<?php echo $year['years'];?>)"><?php echo $year['years'];?></div>
          <div class="inner-div79 d-flex" onclick="helped_pie2(<?php echo $year1['years'];?>)"><?php echo $year1['years'];?></div>
          <div class="inner-div79 d-flex" onclick="helped_pie3(<?php echo $year2['years'];?>)"><?php echo $year2['years'];?></div>
        </div>
      </div>


    </div>
  </div>
</div>

<script type="text/javascript">

  //Donation
    function Donation(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var itr1 = document.getElementById("mb-id1");
        var itr2 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        var div7 = document.querySelector('#mb7');
        itr2.style.display="none";
        itr1.style.display="inline-flex";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            
            div.classList.remove('visible');
            div7.classList.remove('visible');
        }

        $.ajax({
            url: "fileExport.php",
            method: "POST",
            data: { id: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }

  //pie charts data modification handle with care
      function pies123(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var inputDiv21 = document.getElementById("mb-id1");
        var inputDiv22 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        inputDiv21.style.display="inline-flex";
        inputDiv22.style.display="none";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            
            div.classList.remove('visible');
        }

        $.ajax({
            url: "pies.php",
            method: "POST",
            data: { year: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }


    function pies_formation(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var inputDiv21 = document.getElementById("mb-id1");
        var inputDiv22 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        inputDiv21.style.display="inline-flex";
        inputDiv22.style.display="none";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            inputDiv5.style.display="none";
            
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            
            div.classList.remove('visible');
        }
   
        $.ajax({
            url: "pies_data.php",
            method: "POST",
            data: { year: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }


    //thrid donations staus year

     function pies_creation(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var inputDiv21 = document.getElementById("mb-id1");
        var inputDiv22 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        inputDiv21.style.display="inline-flex";
        inputDiv22.style.display="none";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            div.classList.remove('visible');
        }
   
        $.ajax({
            url: "pies_info.php",
            method: "POST",
            data: { year: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }


     //first helped year staus year

     function helped_pie1(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var inputDiv21 = document.getElementById("mb-id1");
        var inputDiv22 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        inputDiv21.style.display="none";
        inputDiv22.style.display="inline-flex";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            div.classList.remove('visible');
        }
   
        $.ajax({
            url: "helped_one.php",
            method: "POST",
            data: { year: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }

     //second helped year staus year

     function helped_pie2(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var inputDiv21 = document.getElementById("mb-id1");
        var inputDiv22 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        inputDiv21.style.display="none";
        inputDiv22.style.display="inline-flex";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            div.classList.remove('visible');
        }
   
        $.ajax({
            url: "helped_two.php",
            method: "POST",
            data: { year: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }


     //third helped year staus year

     function helped_pie3(arg) {
        var inputDiv1=document.getElementById('oc-id1');
        var inputDiv2=document.getElementById('oc-id2');
        var inputDiv3=document.getElementById('oc-id3');
        var inputDiv4=document.getElementById('oc-id4');
        var inputDiv5=document.getElementById('oc-id5');
        var inputDiv6=document.getElementById('oc-id6');
        var inputDiv10=document.getElementById('oc-id10');
        var inputDiv20 = document.getElementById("oc-id20");
        var inputDiv21 = document.getElementById("mb-id1");
        var inputDiv22 = document.getElementById("mb-id2");
        var div = document.querySelector('#mb4');
        inputDiv22.style.display="inline-flex";
        inputDiv21.style.display="none";
        if(inputDiv4.style.display==="none"||inputDiv4.style.display==="")
        {
            inputDiv1.style.display="none";
            inputDiv2.style.display="none";
            inputDiv3.style.display="none";
            inputDiv4.style.display="block";
            inputDiv5.style.display="none";
            inputDiv6.style.display="none";
            inputDiv10.style.display="none";
            inputDiv20.style.display="none";
            div.classList.remove('visible');
        }
   
        $.ajax({
            url: "helped_three.php",
            method: "POST",
            data: { year: arg },
            success: function(response) {
                  if (response.trim() !== "") {
                     

                         $("#code").html(response);
                      
                        } else {
                            alert(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error if needed
                    }
                });
    }



     document.getElementById('srch').addEventListener('input', function() {
      var inputValue = this.value.trim(); // Get the trimmed value of the input field
      if (inputValue !== "") {
         
          search(1);
      } else {
       
          search(0);
      }
    });
     search(0);

     document.getElementById('srch1').addEventListener('input', function() {
      var inputValue = this.value.trim(); // Get the trimmed value of the input field
      if (inputValue !== "") {
         
          search1(1);
      } else {
       
          search1(0);
      }
    });
     search1(0);

</script>
</body>
</html>

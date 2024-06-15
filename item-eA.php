
<div class="flip-card5">
        <div class="flip-card-inner" id="eme_<?php echo$ROW1['id'];?>">
          <div class="flip-card-front">
           <div class="inner-div76" onclick="imported(<?php echo $ROW1['id'];?>)">Helped</div>
          <?php
            if(isset($ROW1['image'])){

                echo "<img src='upload/".$ROW1['image']."' width='100% ' height='100%'>";
              }else{
                echo "<img src='de.jpg'>";
              }

        ?>
          <label id="la1" onclick="Donation(1)" style="cursor: pointer;">Donate</label>
          <div class="inner-div13 d-flex">
          <div class="inner-div14 d-flex" onclick="shflip(<?php echo $ROW1['id'];?>)">..<?php echo $ROW1['name'];?>..</div>
            <div class="inner-div15 d-flex">
              <label id="la2">Id:</label><span id="sp1"><i><?php echo $ROW1['R_id'];?></i></span>
              <label id="la3">City:</label><span id="sp2"><i><?php echo $ROW1['city'];?></i></span>
              <label id="la4">Help:</label><br>
              <p id="p1">
              <?php echo $ROW1['need'];?></p>
            </div>
          </div>
      </div>

      <div class="flip-card-back p-3">
        <div class="inner-div52 d-flex" onclick="shflip(<?php echo $ROW1['id'];?>)" >..<?php echo $ROW1['name'];?>..</div><div class="inner-div77" onclick="delA(<?php echo $ROW1['id'];?>)"><center><i class="fa-solid fa-square-xmark"></i></center></div><br>
          <?php echo $ROW1['need'];?>
      </div>
    </div>
  </div>
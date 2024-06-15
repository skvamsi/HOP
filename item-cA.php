
	<div class="flip-card6">
        <div class="flip-card-inner2" id="commit_<?php echo $ROW3['id'];?>">
          <div class="inner-div19 d-flex">
            <div class="inner-div21 d-flex" onclick="shflip2(<?php echo $ROW3['id'];?>)">..<?php echo $ROW3['name'];?>..</div>
            <?php
            if(isset($ROW3['image'])){

                echo "<img src='upload/".$ROW3['image']."' width='100% ' height='100%'>";
              }else{
                echo "<img src='de.jpg'>";
              }

        ?>
            <div class="inner-div20 d-flex">
              <label id="la5">Id:</label><span id="sp3"><i><?php echo $ROW3['R_id'];?></i></span>
              <label id="la6">Position:</label><span id="sp5"><i><?php echo $ROW3['city'];?></i></span>
              <label id="la7">Campus:</label><br><br>
              <p id="p2"><?php echo $ROW3['campus'];?></p>
            </div>
          </div>
          <div class="flip-card-back2 p-3">
              <div class="inner-div52 d-flex" onclick="shflip2(<?php echo $ROW3['id'];?>)" >..<?php echo $ROW3['name'];?>..</div><div class="inner-div77" onclick="delC(<?php echo $ROW3['id'];?>)"><center><i class="fa-solid fa-square-xmark"></i></center></div><br>
            	<?php echo $ROW3['need'];?>
          </div>
        </div>
      </div>

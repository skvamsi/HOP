<div class="flip-card1" id="flip_card_<?php echo $ROW2['id'];?>">
    <div class="helpers_info" id="helpers_info_<?php echo $ROW2['id'];?>"> 
        <!-- flipcard inner1 -->
        <div class="inner-div16 d-flex">
            <div class="inner-div18 d-flex" onclick="show_help(<?php echo $ROW2['id'];?>)">..<?php echo $ROW2['name'];?>..</div>
            <?php
            if(isset($ROW2['image'])){

                echo "<img src='upload/".$ROW2['image']."' width='100% ' height='100%'>";
              }else{
                echo "<img src='de.jpg'>";
              }

        ?>
            <div class="inner-div17 d-flex">
                <label id="la5">Id:</label><span id="sp3"><i><?php echo $ROW2['R_id'];?></i></span>
                <label id="la6">City:</label><span id="sp4"><i><?php echo $ROW2['city'];?></i></span>
                <label id="la7">Campus:</label><br><br>
                <p id="p2"><?php echo $ROW2['campus'];?></p>
            </div>
        </div>
        <div class="flip-card-back1 p-3">
            <div class="inner-div52 d-flex" onclick="show_help(<?php echo $ROW2['id'];?>)" >..<?php echo $ROW2['name'];?>..</div><br>
            <?php echo $ROW2['need'];?>
        </div>
    </div>
</div>

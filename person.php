<div class="inner-div29 d-flex" onclick="Chat(<?php echo $ROW7['id'];?>)">
    <?php
            if(isset($ROW7['image'])){

                echo "<img src='uploads/".$ROW7['image']."' width='100% ' height='100%'>";
              }else{
                echo "<img src='de.jpg'>";
              }

        ?>
    <div class="inner-div30 d-flex">
     <?php echo $ROW7['name'];?><br><?php echo $ROW7['user_id'];?>
    </div>
</div>
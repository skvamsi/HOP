<?php
$date = DateTime::createFromFormat('Y-m-d H:i:s', $ROW6['date']);
if ($date !== false) {
    $timestamp = $date->getTimestamp();
    
}

 $timestamp = strtotime($ROW6['date']);
     $timestamp=$timestamp-12600;   
        if ($timestamp === false) {
            echo "Invalid timestamp: " . $ROW6['date'] . "<br>";
        } else {
            $current_time = time();
            $time_difference = $current_time - $timestamp;

            // Format the time difference
            if ($time_difference < 60) {
                $formatted_time = $time_difference . " sec ago";
            } elseif ($time_difference < 3600) {
                $formatted_time = round($time_difference / 60) . " min ago";
            } elseif ($time_difference < 86400) {
                $formatted_time = round($time_difference / 3600) . " hours ago";
            } elseif ($time_difference < 2592000) {
                $formatted_time = round($time_difference / 86400) . " days ago";
            } elseif ($time_difference < 31536000) {
                $formatted_time = round($time_difference / 2592000) . " months ago";
            } else {
                $formatted_time = round($time_difference / 31536000) . " years ago";
            }
  }

  $sql = "SELECT * FROM users WHERE id = '" . $ROW6['user_id'] . "'";
$re = mysqli_query($con, $sql);
$da = mysqli_fetch_assoc($re);

?>
<div class="inner-div68">
  <div class="inner-div69">
    <div class="inner-div70">
     <label> <?php
              echo $formatted_time;
          ?></label>
      <span><?php echo $da['name'];?> </span>
    </div>
    <!-- <div class="inner-div151" id="vm_<?php echo $ROW6['id'];?>"></div> -->
    <div class="inner-div71">

        <?php 
        if($ROW6['grade'] == 2)
          {
             
        echo "<video class='hover-video' src='msg/".$ROW6['image']."' width='100%' height='100%' controls></video>";
              
          }  
          elseif($ROW6['grade'] == 1){
              echo "<img src='msg/".$ROW6['image']."' width='100% ' height='100%'>";
          }
          else{
             echo $ROW6['comment'];
          }

       ?>
    </div>
  
  </div>
   <?php
      if(isset($pic_data)){

          echo "<img src='uploads/".$da['image']."' width='100% ' height='100%'>";
        }else{
          echo "<img src='de.jpg'>";
        }

  ?>
</div>
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
?>

<div class="inner-div64">
  <?php
      if(isset($pic_data)){

          echo "<img src='uploads/".$pic_data['image']."' width='100% ' height='100%'>";
        }else{
          echo "<img src='de.jpg'>";
        }

  ?>
  <div class="inner-div65">
    <div class="inner-div66">
     <span><?php echo $pic_data['name'];?> </span>
     <label><?php
              echo $formatted_time;
          ?></label>
    </div>
   
    <div class="inner-div67" id="#info">
         <div class="inner-div91"  onclick="msdel(<?php echo $ROW6['id'];?>)">
            <center><i class="fa-solid fa-ban" id="mrg"></i></center>
         </div>
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

       ?>    </div>
  </div>
 
</div>
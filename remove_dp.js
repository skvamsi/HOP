function remove_dp(id) {
			 $.ajax({
                url:"remove_dp.php",
                method:"POST",
                data:{id_1:id},
                success:function(response){
                   alert(response);
                   window.location.href = window.location.href;
                }
            });

		}
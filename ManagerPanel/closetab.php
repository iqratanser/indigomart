<script type="text/javascript">
         $(document).ready(function() {

            
           $(window).on("beforeunload", function() { 
              $.ajax({
                      url:"function.php",
                      method:"post",
                      dataType:"json",
                      data:{opp:"logoutmanager"},
                      success:function(response){
                       

        }
     });
            });
        });
    </script>
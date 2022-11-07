<html>
   <head>
      <title>Ajax Example</title>

      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>


   </head>

   <body>
      <div id = 'msg'>Teste de mensagem.</div>

      <select class="form-control" name="city_id" id="city_id" onchange="getMessage()">

          <option value="1">A</option>
          <option value="2">B</option>
      </select>
   </body>

   <script>
    function getMessage() {

       $.ajax({
         type:'POST',
          url:'/getmsg',
          data:'_token = <?php echo csrf_token() ?>',
          success:function(data) {
             $("#msg").html(data.msg);
          }
       });
    }
 </script>

</html>

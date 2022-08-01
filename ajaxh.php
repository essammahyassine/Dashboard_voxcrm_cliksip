<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
        function returnwasset(){
            alert('return sent');
            $.ajax({
                type: "POST",
                url: "calchourcmp.php?campp="+4,
                success: function(data) {
                  alert(data); 
                  $('#tco').text(data);
                }
            });
        }
        returnwasset();

    </script>
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
  <p id="tco"></p>
  </body>
  </html>
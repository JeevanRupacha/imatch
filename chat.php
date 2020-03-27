<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type ="text/css" href = "index.css">
</head>
<body>
    <div class="persondiv" id="chatdiv">
    </div>  
</body>
</html>


<?php 
   $conn = mysqli_connect("localhost","root");
   mysqli_select_db($conn,'myweb'); 
   $sql = "select first_name,second_name from signup_form";
   $result = mysqli_query($conn,$sql);
   $php_arr = array();
   while($row = mysqli_fetch_assoc($result)){
      $fname = $row['first_name'];
      $sname = $row['second_name']; 
      $name = $fname." ". $sname."     ";
      array_push($php_arr,$name);
   }

?>
<script type="text/javascript" language="javascript">
 
    let chatperson = new Array();
    <?php foreach($php_arr as $key => $val){ ?>
        chatperson.push("<?php echo $val; ?>");
    <?php } mysqli_close($conn); ?>
//     alert(chatperson);
//    chatperson.sort();
//     alert(chatperson);
        for(let i =0;i<chatperson.length;i++){
    document.querySelector(".persondiv").innerHTML += `<div id="per" class="person middle">${chatperson[i]}</div`;
        }

</script>
    

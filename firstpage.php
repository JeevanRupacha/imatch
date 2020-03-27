

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type ="text/css" href = "index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script type="text/javascript" src="bootstrap/js/jQuery.min.js"></script>

</head>
<body>
    <div id= "conatiner">
        <div class="login_box">
       <form action ="login.php" method ="post">
            <input type="text" name="user_name" class ="user_name" id="user_name" placeholder ="User name">
            <input type="password" name ="password" id="password" placeholder ="password">
            <input id="login-btn" class="submit_button btn btn-primary" type="submit" value="Login">
        </form>
    </div>
    <div class="vertical_line"></div>
    <button id="signup-btn" class="btn btn-primary middle" data-toggle="collapse" data-target="#content" aria-expanded="false" aria-controls="content" >Sign up</button>
        <div class="collapse" id="content">
           
            <div id="inner_singup">
            <form onsubmit="return validFunction()" action="signup.php" method="post">
       <input required="required" type="text" name= "fname" id="first_name" placeholder="First Name">
       <input required="required" type="text" name ="sname" id="second_name" placeholder="Second Name">
       <label for="male" id="lmale">Male</label>
       <input type="radio" id="male" name="gender" value="male">
       <label for="female" id="lfemale">Female</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="other" id="lother">Other</label>
        <input type="radio" id="other" name="gender" value="other">
       <input required="required" type="text" name="email" id="email" id="email" placeholder ="Email">
       <input required="required" type="password" name="pass1" id ="password1" placeholder="Enter password">
       <input required="required" type="password" name="pass2" id ="password2" placeholder="Confirm password">
       <input type="submit" id="form_submit" class="submit_button fsubmit btn btn-primary">
       </form>
</div>
        </div>
  
    </div>
  
  
    <script src="jsindex.js" type="text/javascript"></script>
    <script type="text/javascript" src="bootstrap/js/jQuery.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

<script>
let password1 = document.getElementById("password1");
let password2 = document.getElementById("password2");
function validFunction(){
if(password1.value === password2.value){
    console.log("true");
    return true;
}else{
    alert("password doesn't match..");
    return false;
}
}//test
</script>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href = "index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<div class ="container-home">
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".rdiv">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    <div id="ldivid" class="ldiv left-div-main clearfix">
        <div id="header">
            <div class="logo">logo</div>
            <div id="logout" class="clearfix"> 
                <form action="logout.php" method="post">
                    <input type="submit" id="logoutbtn" class="clearfix btn-primary btn" value="Logout">
                </form>
            </div>
        </div>
           <div class="innerwrap">
        <button id ="match-btn" class="btn btn-primary clearfix" data-toggle="collapse" data-target="#collapse-form-id">Match</button>
        <button onclick ="generateMatch();" id ="see-match-btn" class="btn btn-primary clearfix">See Match</button>
       </div>
       <div id="rowform">
       </div>
        <div class="match-form collapse" id="collapse-form-id">
            <div id="c-match-form" class="interestform middle">
                <h3 class="middle">Fill the  form as your interest</h3>
                <span>Note: <br>1.Remember atmost 3 items are allowed.<br>2.You must put ( , ) for item seperator. <br>3.No blanck is allowed.<br>4.No any case sensitive.</span><br><br>
            <form  class="form1" action="matchform.php" method="post">
                <label class="">What's your favourite books? </label>
                <input required="required" type="text" class="" name="books" placeholder="80/20 principle,5 A.M. o'clock,Made in America,Zero to one">
                <label class="">What's your favourite movies? </label>
                <input required="required" type="text" class="" name="movies" placeholder="Forrest Gump, The Matrix etc">
                <label class="">What's your favourite songs? </label>
                <input required="required" type="text" class="" name="songs" placeholder="Yummy yummy,Up all night... etc">
                <label class="">Your favourite weather? </label>
                <input required="required" type="text" class="" name="weather" placeholder="sunny,rainy, etc">
                <label class="">Your favourite singer? </label>
                <input required="required" type="text" class="" name="singer" placeholder="charlie puth, Dua lipa">
                <input type="submit" id="submitformbtn" class="btn btn-primary" data-toggle="collapse" data-target="#form2">
            </form>
            </div>
        </div>     
      
    </div>
    <div class="rdiv right-chat-people clearfix collapse" id="rdiv">
  
       <iframe src="chat.php" frameborder="0"></iframe>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

<script>  
let matchlist = {books: " ",movies: " ", songs: " ",weather:" ",singer: " "};
let i=0;

let matchpercentSpan;
let othernameSpan;
let isformpresent;

  </script>


<?php 
   session_start();
   $conn = mysqli_connect("localhost","root");
   mysqli_select_db($conn,'myweb'); 
   $email = $_SESSION['mysession'];
   $sql = "select books,movies,songs,weather,singer from matchform where email='$email'";
   $result = mysqli_query($conn,$sql);
  
   $row = mysqli_fetch_assoc($result);
      $books = $row['books'];
      $movies = $row['movies']; 
      $songs = $row['songs']; 
      $weather = $row['weather']; 
      $singer = $row['singer']; 
      ?>
     <script>
       

        matchlist.books = "<?php echo $books;?>";
        matchlist.movies = "<?php echo $movies;?>";
        matchlist.songs = "<?php echo $songs;?>";
        matchlist.weather = "<?php echo $weather;?>";
        matchlist.singer = "<?php echo $singer;?>";
        var peoplelist =[];
        var yourname;
        var matchpercent;
        var othername;
        var totalper;
        var othernamearray = [];
   
     </script>
<?php
      $sql2 = "select email,books,movies,songs from matchform where email !='$email'";
      $result2 = mysqli_query($conn,$sql2);
     
     
     while($row = mysqli_fetch_assoc($result2)){
         $email = $row['email'];
         $books1 = $row['books'];
         $movies1 = $row['movies']; 
         $songs1 = $row['songs']; 
       
    ?>


     <script>
        // let matchlist = [];
       totalper = (function(){
       let percent = 20;
       console.log(matchlist.books.split(","));
       let booksarray = matchlist.books.split(",");
       let moviesarray = matchlist.movies.split(",");
       let songsarray = matchlist.songs.split(",");

       
       let books1array = "<?php echo $books1?>".split(",");
       let movies1array = "<?php echo $movies1?>".split(",");
       let songs1array = "<?php echo $songs1?>".split(",");
       console.log("<?php echo $books1?>".split(","));

           let text1;
           let text2;
       for(let i=0;i<booksarray.length; i++){
           for(let j=0;j<books1array.length; j++){
               text1 = booksarray[i].replace(/\s/g,'').toLowerCase();
               text2 = books1array[j].replace(/\s/g,'').toLowerCase();
               console.log("books " +text2);
               console.log("books " +text1);
            if(text1 ==" " || text2 ==" "){
                  percent += 0;
                  console.log("white space");
                }
       else if(text1.includes(text2) || text2.includes(text1)){
            percent += 8;
            console.log("includes");
            console.log("books" + percent);
        }else{
            console.log("not includes");
            percent += 0;
             }
           }
       }

       for(let i=0;i<moviesarray.length; i++){
           for(let j=0;j<movies1array.length; j++){
         
            text1 = moviesarray[i].replace(/\s/g,'').toLowerCase();
               text2 = movies1array[j].replace(/\s/g,'').toLowerCase();
               console.log("movies " +text2);
               console.log("movies " +text1);

            if(text1 ==" " || text2 ==" "){
                  percent += 0;
                  console.log("white space");
                }
       else if(text1.includes(text2) || text2.includes(text1)){
            percent += 8;
            console.log("includes");
          
        }else{
            console.log("not includes");
            percent += 0;
             }
           }
       }

       for(let i=0;i<songsarray.length; i++){
           for(let j=0;j<songs1array.length; j++){
           
              text1 = songsarray[i].replace(/\s/g,'').toLowerCase();
               text2 = songs1array[j].replace(/\s/g,'').toLowerCase();
               console.log("songs " +text2);
               console.log("songs " +text1);
            if(text1 ==" " || text2 ==" "){
                  percent += 0;
                  console.log("white space");
                }
       else if(text1.includes(text2) || text2.includes(text1)){
            percent += 8;
            console.log("includes");
           
        }else{
            console.log("not includes");
            percent += 0;
             }
           }
       }
        return percent;
     
    })();

</script>
      
     <?php 
$sql3 ="select * from signup_form where email='$email'";
$result3 = mysqli_query($conn,$sql3);

while($row2 = mysqli_fetch_assoc($result3)){
    $oname= $row2['first_name']." ".$row2['second_name'];
?>
<script>

othernamearray.push({name : "<?php echo $oname ?>",percent: totalper});
</script>

        
  

     <?php 
           }
    }?>


<?php 
$cemail = $_SESSION['mysession'];
$sql4 ="select * from signup_form where email='$cemail'";
$result4 = mysqli_query($conn,$sql4);

while($row3 = mysqli_fetch_assoc($result4)){
    $yourname= $row3['first_name']." ".$row3['second_name'];
}

?>
  <?php
  $qury_selecte = "SELECT email FROM matchform WHERE email ='$cemail'";
$resulte = mysqli_query($conn, $qury_selecte);
$ispresente = mysqli_num_rows($resulte);
if($ispresente>0){
?>
<script>
isformpresent = true;
</script>
    <?php
}else{
?>
<script>
isformpresent = false;
</script>
    <?php
}
?>
<script>
// let subbtn = document.querySelector("#subbtn");
yourname = "<?php echo $yourname;  ?> ";
console.log(peoplelist);
console.log(othernamearray);
othernamearray.sort(function(a,b){
    if(a.percent > b.percent) return -1;
    if(a.percent <b.percent) return 1;
    return 0;
});

console.log("i=" + i);
othername = othernamearray[i].name;
matchpercent = othernamearray[i].percent;

     matchpercentSpan  = document.querySelector('#matchpercent-span'); 
     othernameSpan  = document.querySelector('#othername-span'); 
    
function next(){
    if(i< othernamearray.length){
     matchpercentSpan  = document.querySelector('#matchpercent-span'); 
     othernameSpan  = document.querySelector('#othername-span'); 
    flag = true;
    i++;
    othername = othernamearray[i].name;
    matchpercent = othernamearray[i].percent;
    matchpercentSpan.innerText = matchpercent+"%";
    othernameSpan.innerText = othername;
  
    }

}

function prev(){
    if(i<othernamearray.length && i>=0){
     matchpercentSpan  = document.querySelector('#matchpercent-span'); 
     othernameSpan  = document.querySelector('#othername-span'); 
    flag =true;
    i--;
  
    othername = othernamearray[i].name;
    matchpercent = othernamearray[i].percent;
    matchpercentSpan.innerText = matchpercent+"%";
    othernameSpan.innerText = othername;

    }
}

console.log(othernamearray);
let html;
// let html2 =  ` <div class="match-form formdiv2" id="formdiv2">
//                <div id="c-match-form" class="interestform middle">

//                 <form  class="formsecond" action="" method="post">
//                 <label class="">What's your favourite books? </label>
//                 <input required="required" type="text" class="form2c" name="books" placeholder="80/20 principle,5 A.M. o'clock,Made in America,Zero to one">
//                 <label class="">What's your favourite movies? </label>
//                 <input required="required" type="text" class="form2c" name="movies" placeholder="Forrest Gump, The Matrix etc">
//                 <label class="">What's your favourite songs? </label>
//                 <input required="required" type="text" class="form2c" name="songs" placeholder="Yummy yummy,Up all night... etc">
//                 <label class="">Your favourite weather? </label>
//                 <input required="required" type="text" class="form2c" name="weather" placeholder="sunny,rainy, etc">
//                 <label class="">Your favourite singer? </label>
//                 <input required="required" type="text" class="form2c" name="singer" placeholder="charlie puth, Dua lipa">
//                 <input type="submit" id="submitformbtn2" class="btn btn-primary" data-toggle="collapse" data-target="#form2">
                
//                 </form>
//                  </div>
//                 </div>`;
//                 document.querySelector('#rowform').innerHTML = html2;
// subbtn.addEventListener('click',generateMatch);
var flag =true;


function generateMatch(){

    html = `
<div class="maindiv">
<div class="yourprofile clearfix">
<div style="height: 80%;">
<span class="" id="yourname" >${yourname}</span>
</div>

</div>
<div class="percent clearfix">
<div>
<span class="center" id="matchpercent-span" style ="text-align: center; font-size: 500%;color:white;
">${matchpercent}%</span>
</div>

</div>

<div class="otherprofile clearfix">
<div style="height: 80%;width: 100%;">
<span class="" id="othername-span" >${othername}</span>
</div>
   <div style="background-color: blue;height: 20%;">
     <span><button onclick ="prev()" id="prev" class="prevbtn">prev</button></span>
      <span><button onclick="next()" id="next" class="nextbtn">next</button></span>
    </div>  
</div>
</div>


`;
    if(flag){
        if(isformpresent){
    flag = false;
   let ldiv = document.querySelector(".ldiv");
   
   // document.querySelector(".interesrform").style.visiblity = "hidden";
     ldiv.innerHTML += html;
    // maindiv.style.display = "block";
    //left_div_main.addpendChild(document.createElement(html));
    }
}
   


}
// let myform = document.querySelectorAll(".form2c");
// if(myform.value !== ""){
// let form22=  document.querySelector(".formdiv2");
// document.querySelector("#submitformbtn2").addEventListener('click',changevisible);
//  function changevisible(){
//              alert("test");
//             form22.style.display= "none";
//       }
//     }

</script>

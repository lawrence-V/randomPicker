<?php
require 'functions.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lottery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
</head>

</head>

<body>
  <div class="">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Winner Picker</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./all_List.php">All list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./list_Winner.php">List Winner</a>
          </li>

        </ul>
      </div>
    </nav>
  </div>

  <div class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="card">
            <h5 class="card-header text-center">Single draw</h5>
            <div class="card-body text-center">
              <h5 class="card-title">Click Draw Button</h5>
            
              <input type="submit" class="btn btn-primary" id="button1" value="Draw">
            </div>
          </div>
        </div>
     
        <div class="col-lg">
          <div class="card ">
            <h5 class="card-header text-center">Group draw</h5>
            <div class="card-body text-center">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <input type="submit" class="btn btn-primary" id="button2" value="Draw">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="card">
            <h5 class="card-header text-center">Single draw</h5>
            <ol class="list-group list-group-numbered" id="display">
              <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li> -->
            </ol>

          </div>
        </div>
        <div class="col-lg">
          <div class="card ">
            <h5 class="card-header text-center">Group draw</h5>
            <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Subheading</div>
                  Content for list item
                </div>
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ol>

          </div>
        </div>
      </div>
    </div>
  </div>




<script type="text/javascript">

$(document).ready(function(){

//////For Single Draw

let haveIt = [];
function random_number() {
     //Generate random number
     var maxNr = 25
     let random = Math.floor(Math.random() * maxNr) + 1;

//Coerce to number by boxing
random = Number(random);

if(!haveIt.includes(random)) {
    haveIt.push(random);
    return random;
} else {
    if(haveIt.length < maxNr) {
      //Recursively generate number
      console.log("Duplicated")
      return null;
    //  return  generateUniqueRandom(maxNr);
    } else {
      console.log('No more numbers available.')
      return false;
    }

}
}
  $("#button1").click(function(){
      var id = random_number();
      console.log(id)
      if(id != null){
      var currentdate = new Date(); 
    var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

                // console.log(datetime)
                $("#result").val(id);
      $.ajax({
        url: 'functions.php',
        type: 'post',
        data: {id:id, datetime: datetime},
        dataType: 'JSON',
        success: function(response){
        
             var len = response.length;
  
            for(var i=0; i<len; i++){
                var id = response[i].id;
                var first_name = response[i].first_name;
                var last_name = response[i].last_name;
                var address = response[i].address;
               

                setTimeout(function() { 

                  $("#display").append(`<li class="list-group-item d-flex justify-content-between align-items-start"><div class="ms-2 me-auto"><div class="fw-bold" id="list">${first_name}  ${last_name}</div> ${address}</div><span class="badge bg-primary rounded-pill">14</span></li>`)
                
    }, 1500);
               
            }
            
            }
          
       
    });
    
  }else{
    alert("The Picked Player already a WINNER!");
  }
  
     
        }); 
        ////end for single DRaw

  ///// For Group Draw
        
        let haveItGroup = [];
      
function random_numberGroup() {
     //Generate random number
     let picked = [];
     var maxNr = 25
     for(var i = 0; i<5; i++){
     let random = Math.floor(Math.random() * maxNr) + 1;

     random = Number(random);
            if(!haveItGroup.includes(random)) {
            haveItGroup.push(random);
            picked.push(random);
            // return random;
        } else {
            if(haveItGroup.length < maxNr) {
              let randomAnother = Math.floor(Math.random() * maxNr) + 1;
              if(!haveItGroup.includes(randomAnother)){
              picked.push(randomAnother);
              }
            } else {
              console.log('No more numbers available.')
              return false;
            }

        }
    //  picked.push(random);
     }
//Coerce to number by boxing
// for(var i = 0; i<1; i++){
//      console.log(picked);
//      }

     return picked

}
  $("#button2").click(function(){
      var id = random_numberGroup();
      console.log(id)
      if(id != null){
      var currentdate = new Date(); 
    var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

                // console.log(datetime)
                $("#result").val(id);
      $.ajax({
        url: 'functions.php',
        type: 'post',
        data: {id:id, datetime: datetime},
        dataType: 'JSON',
        success: function(response){
        
             var len = response.length;
  
            for(var i=0; i<len; i++){
                var id = response[i].id;
                var first_name = response[i].first_name;
                var last_name = response[i].last_name;
                var address = response[i].address;
               

                setTimeout(function() { 

                  $("#display").append(`<li class="list-group-item d-flex justify-content-between align-items-start"><div class="ms-2 me-auto"><div class="fw-bold" id="list">${first_name}  ${last_name}</div> ${address}</div><span class="badge bg-primary rounded-pill">14</span></li>`)
                
    }, 1500);
               
            }
            
            }
          
       
    });
    
  }else{
    alert("The Picked Player already a WINNER!");
  }
  
     
        }); 
       
})
</script>


</body>

</html>
<!DOCTYPE html>
<html>
<?php
session_start();
include "../back-end/config.php";
?>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Test MKM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="card">
    <div id="card-content">
       <div class="jam-digital">
          <div class="kotak">
            <p id="jam"></p>
          </div>
          <div class="kotak">
            <p id="menit"></p>
          </div>
          <div class="kotak">
            <p id="detik"></p>
          </div>
        </div>
        <div class="underline-title"></div>
        <p style="text-align: center;">
            <input id="myBtn" type="submit" name="submit" value="HELLO" />
           <?php
            if(isset($_SESSION['status_login_user']) == 'login'){
            ?>
            <a href="../back-end/action.php?action=logout&id=<?php echo $_SESSION['id_user'] ?>">
              <input id="submit-btn" type="submit" name="submit" value="LOGOUT"/>
            </a>
            <?php
            }
            ?>
        </p>
    </div>
  </div>
  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <?php
    if(isset($_SESSION['status_login_user']) == 'login'){
    ?>
    <span class="close">&times;</span>
    <p>Hai, <?php echo $_SESSION['username']; ?>, Waktu Login Anda <?php echo $_SESSION['waktu_login_user']; ?> WIB</p>
    <?php
    }else{
    ?>
    <span class="close">&times;</span>
    <p>Anda belum melakukan Login, login terlebih dahulu ! <br> 
    <a href="../front-end/login.php">
      <input id="submit-btn" type="submit" name="submit" value="LOGIN"/>
    </a>
    </p>
    <?php
    }
    ?>
  </div>
</div>
<script>
window.setTimeout("waktu()", 1000);
function waktu() {
  var waktu = new Date();
  setTimeout("waktu()", 1000);
  document.getElementById("jam").innerHTML = waktu.getHours();
  document.getElementById("menit").innerHTML = waktu.getMinutes();
  document.getElementById("detik").innerHTML = waktu.getSeconds();
}
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
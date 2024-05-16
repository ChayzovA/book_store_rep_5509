
<?php
session_start();
if(isset($_SESSION['busket'])){
    $_SESSION['busket'] = [];
    header ("Location: ../message.php");
}
?>

<!-- <p id="r">5 секунд осталось</p>
<script>
    let t = 5;
let timer = setInterval(() => {
  t--;
  document.querySelector("#r").textContent = `${t} секунд осталось`;
  if(t === 0){
    clearInterval(timer);
  }
}, 1000);
</script> -->
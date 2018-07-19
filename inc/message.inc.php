<?php
    if(!empty($_SESSION['message'])){
        echo '<div id="message">
<span>'.$_SESSION['message'].'</span>
<a href="javascript:closeMessage();">X</a>
</div>
<script>
setTimeout(function(){
    closeMessage();
}, 2000);
</script>
';
unset($_SESSION['message']);
    }
?>
<script type="text/javascript">
function closeMessage(){
    document.getElementById('message').style.display = "none";
}
</script>


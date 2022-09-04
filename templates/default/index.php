<?php
    if($isLoggedIn) {
        echo "<a href='/authentication/logout'>Logout</a>";
    }
    else{
        echo "ausgeloggt";
    }
    if (isset($authenticationSuccess)) {
    }
?>

<!--
<div class="notification-box">
    <div class="notification-content">
        <i class="bx bx-check-circle bxn"></i>

        <div class="notification-message">
            <span class="notification-title">Authentifizierung</span>
            <span class="notification-text">Erfolgreich eingeloggt.</span>
        </div>

        <i class="bx bx-x bxc"></i>
    </div>
</div>
-->
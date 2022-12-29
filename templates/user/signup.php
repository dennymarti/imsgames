<div class="form-wrapper">
    <form action="/user/create/" class="form" method="post" onsubmit="validateForm()">
        <div class="form-heading">
            <h2 class="form-title"><?= $heading ?></h2>
        </div>

        <?php
        if (isset($error)) {
            echo "
<div class='error-box'>
    <i class='bx bx-error-circle'></i>
    <p class='error-message'>$error</p>
</div>";
            unset($_SESSION['notification']);
        }
        ?>

        <div class="form-field">
            <input class="form-input" name="username" placeholder="Benutzername" type="text" onkeyup="validateUsername(event)" onfocusout="validateUsername(event)" required>
            <i class="bx bx-user bxf"></i>
            <i class="bx bx-x-circle bx-vw"></i>
            <i class="bx bx-check-circle bx-vs"></i>

            <div class="tooltip-box">
                <p class="tooltip-message"></p>
            </div>
        </div>
        <div class="form-field">
            <input class="form-input" id="password" name="password" placeholder="Passwort" type="password" onkeyup="validatePassword(event)" onfocusout="validatePassword(event)" required>
            <i class="bx bx-lock-alt bxf"></i>
            <i class="bx bx-x-circle bx-vw"></i>
            <i class="bx bx-check-circle bx-vs"></i>
            <i class="bx bx-hide bxp" onclick="visualizePassword(event)"></i>

            <div class="tooltip-box">
                <p class="tooltip-message"></p>
            </div>
        </div>
        <div class="form-field">
            <input class="form-input" placeholder="Passwort bestätigen" type="password" onkeyup="validateConfirmedPassword(event)" onfocusout="validateConfirmedPassword(event)" required>
            <i class="bx bx-lock-alt bxf"></i>
            <i class="bx bx-x-circle bx-vw"></i>
            <i class="bx bx-check-circle bx-vs"></i>
            <i class="bx bx-hide bxp" onclick="visualizePassword(event)"></i>

            <div class="tooltip-box">
                <p class="tooltip-message"></p>
            </div>
        </div>

        <div class="form-text">
            <p>Hast du bereits einen Account?</p>
            <p>Dann melde dich <a class="link" href="/authentication">hier</a> an</p>
        </div>

        <button class="form-submit" id="submit" name="send" type="submit" disabled>Registrieren</button>
    </form>
</div>
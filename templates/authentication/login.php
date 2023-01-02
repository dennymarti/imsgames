<div class="form-wrapper">
    <form action="/authentication/login" class="form" method="post">
        <div class="form-heading">
            <h2 class="form-title"><?= $heading ?></h2>
        </div>

        <?php
        if (isset($error)) {
            echo "
<div class='error-box'>
    <i class='bx bx-error-circle bxi'></i>
    <p class='error-message'>$error</p>
</div>";
        }
        ?>
        <div class="form-field">
            <input class="form-input" name="username" type="text" placeholder="Benutzername" required>
            <i class="bx bx-user bxf bxd"></i>
        </div>

        <div class="form-field">
            <input class="form-input" name="password" type="password" placeholder="Passwort" required>
            <i class="bx bx-lock-alt bxf bxd"></i>
            <i class="bx bx-hide bxf bxp" onclick="visualizePassword(event)"></i>
        </div>

        <div class="form-text">
            <p>Hast du noch keinen Account?</p>
            <p>Dann registriere dich <a class="link" href="/user/signup">hier</a></p>
        </div>
        <input class="form-submit" type="submit" value="Anmelden">
    </form>
</div>
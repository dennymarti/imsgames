<div class="form-wrapper">
    <form action="/request/create/" method="post" class="form request-form">
        <div class="form-heading">
            <h2 class="form-title"><?= $heading ?></h2>
        </div>

        <div class="form-content">
            <div class="form-inputs">
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
                    <input class="form-input" type="text" name="email" placeholder="Email" value="<?php if (isset($email)) { echo $email; } ?>" required>
                    <i class="bx bx-at bxf bxd"></i>

                    <div class="tooltip-box">
                        <p class="tooltip-message"></p>
                    </div>
                </div>

                <div class="form-field">
                    <input class="form-input" type="text" name="link" placeholder="Github Repository" value="<?php if (isset($link)) { echo $link; } ?>" required>
                    <i class="bx bxl-github bxf bxd"></i>

                    <div class="tooltip-box">
                        <p class="tooltip-message"></p>
                    </div>
                </div>

                <div class="form-field">
                    <textarea class="form-input form-textarea" type="text" name="description"
                  placeholder="Beschreibung" value="<?php if (isset($description)) { echo $description; } ?>" required></textarea>
                    <i class="bx bxs-pencil bxf bxd"></i>

                    <div class="tooltip-box">
                        <p class="tooltip-message"></p>
                    </div>
                </div>

                <button class="form-submit" type="submit" name="send">Einreichen</button>
            </div>

<!--            <div class="form-info">-->
<!--                <p class="form-description">-->
<!--                    Unsere Website entstand in einer Projektwoche im Fr??hling 2022. Unser Ziel war, dass die Games, welche die IMS Sch??ler w??hrend der Ausbildung programmieren, auch publiziert und-->
<!--                    gespielt werden k??nnen. Ohne diese Website wurden die Games mit viel Aufwand und Zeit programmiert, aber nach dem Abschluss nicht mehr gebraucht. Dies fanden wir sehr schade.-->
<!--                    Wenn du auch ein Game hast, dann schick uns doch deine Emailaddresse und die URL deines Github Repositorys, in welchem du dein gesamtes Game gespeichert hast. Wir w??rden uns-->
<!--                    ??ber neue Games freuen. Die Entwickler:-->
<!--                </p>-->
<!--                <p class="form-author">-->
<!--                    Denny Marti, Ivan Horvath, Amelie Zeller und Nathalie Krieg-->
<!--                </p>-->
<!--            </div>-->
        </div>
    </form>
</div>


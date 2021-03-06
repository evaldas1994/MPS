<main>
    <section class="section-left">
        <h2 class="login-title">Prisijungimas</h2>
        <form class="login-form" method="post" action="/user/login">
            <div class="login-email-block">
                <input class="login-email-input" name="login-email-input" type="text" placeholder="El. Paštas">
            </div>

            <div class="login-password-block">
                <input class="login-password-input" name="login-password-input" type="password" placeholder="Slaptažodis">
            </div>

            <div class="login-submit-block">
                <input class="login-submit" type="submit" value="Prisijungti">
            </div>
        </form>
    </section>

    <section class="section-right">
        <h2 class="register-title">Registracija</h2>
        <form class="register-form"  method="post" action="/user/create">
            <div class="register-email-block">
                <input class="register-email-input" name="register-email-input" type="text" placeholder="El. Paštas">
            </div>

            <div class="register-password-block">
                <input class="register-password-input" name="register-password-input" type="password" placeholder="Slaptažodis">
            </div>

            <div class="register-password-block-2">
                <input class="register-password-input-2" name="register-password-input-2" type="password" placeholder="Slaptažodis (pakartoti)">
            </div>

            <div class="register-submit-block">
                <input class="register-submit" type="submit" value="Registruotis">
            </div>
        </form>


        <?php echo Helper\Notification\ErrorSuccessBuilder::getSuccessNotificationTemplate(); ?>
        <?php echo Helper\Notification\ErrorSuccessBuilder::getErrorNotificationTemplate(); ?>
    </section>
</main>
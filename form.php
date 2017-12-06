<?php include('form_process.php'); ?>

<link href="css/form.css" rel="stylesheet">
        
<div class="container">  
    <form id="contact" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <h3>Contact met claass</h3>
        <h4>Maak vandaag contact en ontvang binnen 24 uur een antwoord!</h4>
        <fieldset>
            <input placeholder="Uw naam" type="text" tabindex="1" value="<?= $naam ?>" name="naam">
            <span class="error"><?= $name_error ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Uw emailadres" type="text" name="email" value="<?= $email ?>" tabindex="2">
            <span class="error"><?= $email_error ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Uw telefoonnummer" type="text" name="telefoon" value="<?= $telefoon ?>" tabindex="3">
            <span class="error"><?= $phone_error ?></span>
        </fieldset>
        <fieldset>
            <textarea placeholder="Waar kunnen wij u mee helpen?" type="text" name="bericht" tabindex="4"></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Verstuur</button>
        </fieldset>
        <div class="succes"><?= $success ?></div>
    </form>
</div>

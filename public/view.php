<?php if ($_SERVER["SCRIPT_NAME"] == "/public/view.php") header("Location: ../view?" . $_SERVER["QUERY_STRING"]); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
    <link rel="icon" type="image/x-icon" href="<?= getInstallationPath(); ?>/public/assets/img/favicon-100x100.png">
    <meta name="description" content="<?= translate(htmlspecialchars("An extremely simple, one-time view encrypted message system. Send anybody passwords, or secret messages on a one-time view basis.")); ?>">
    <title>Quickblaze Encrypt</title>

    <!-- Site CSS -->
    <link href="<?= getInstallationPath(); ?>/public/assets/css/style.css" rel="stylesheet">
    <link href="<?= getInstallationPath(); ?>/public/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Site Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="global-container">
        <div class="main-form">
            <form onsubmit="return false;">
                <div class="page-title-container">
                    <a href="<?= getInstallationPath(); ?>">
                        <img class="form-icon fa-fade" id="form-icon" draggable="false" alt="Quickblaze Encrypt" aria-label="Quickblaze Encrypt" title="Quickblaze Encrypt" src="<?= getInstallationPath(); ?>/public/assets/img/favicon-100x100.png">
                    </a>
                    <h2>Quickblaze Encrypt</h2>
                </div>
                <h5 class="text-muted"><?= translate(htmlspecialchars("One-time view encrypted message sharing system")); ?></h5>

                <!-- Snackbar -->
                <div class="alert snackbar-container" id="snackbar-container">
                    <div id="snackbar"></div>
                </div>

                <!-- Main Form Content -->
                <div id="form_confirmation">
                    <div class="input-container">
                        <label for="input_password_attempt"><?= translate(htmlspecialchars("Decrypt & View Message?")); ?></label>
                        <input class="form-control form-input-item size-single" type="password" id="input_password_attempt" placeholder="<?= translate(htmlspecialchars("Enter decryption password")); ?>" required></input>
                    </div>
                    <button class="btn btn-primary submit-button button-50" onclick="formValidateDisplay();">
                        <?= translate(htmlspecialchars("Decrypt Message")); ?>
                    </button>
                </div>

                <div id="form_content" style="display:none">
                    <h6>
                        <?= translate(htmlspecialchars("This message has now been destroyed!")); ?>
                    </h6>
                    <div class="input-container">
                        <textarea disabled type="text" class="form-control form-input-item size-max" id="valuetextbox" name="data"></textarea>
                        <br>
                    </div>
                    <div class="buttons-inline">
                        <button type="button" class="btn btn-primary submit-button button-50" onclick="copyToClipboard('valuetextbox', 'snackbar_message')">
                            <?= translate(htmlspecialchars("Copy Message")); ?>
                        </button>
                        <a class="btn btn-secondary submit-button button-50" href="./">
                            <?= translate(htmlspecialchars("Return Home")); ?>
                        </a>
                    </div>
                </div>

                <div id="form_error" style="display:none">
                    <p><?= translate(htmlspecialchars("You will now be redirected..")); ?></p>
                </div>

                <p class="mt-5 mb-3 text-muted">
                    <a href="https://github.com/arizon-dev/quickblaze-encrypt" class="text-muted no-decoration">GitHub</a> •
                    <a href="https://discord.gg/dP3MuBATGc" class="text-muted no-decoration">Discord</a> •
                    <a href="https://github.com/arizon-dev/quickblaze-encrypt/releases" class="text-muted no-decoration"><?= determineSystemVersion(); ?></a>
                </p>

            </form>
        </div>
    </div>

    <!-- Snackbar Notifications -->
    <div class="snackbar-messages">
        <div id="snackbar_info">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fas fa-info-circle mr-5"></i> <?= translate(htmlspecialchars("This message was created " . getMessageCreationDate($_GET["key"])) . "."); ?>
            </span>
        </div>
        <div id="snackbar_password">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fas fa-check mr-5"></i> <?= translate(htmlspecialchars("Password has been copied to clipboard!")); ?>
            </span>
        </div>
        <div id="snackbar_message">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fas fa-check mr-5"></i> <?= translate(htmlspecialchars("Message has been copied to clipboard!")); ?>
            </span>
        </div>
        <div id="snackbar_empty_fields">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fas fa-times mr-5"></i> <?= translate(htmlspecialchars(" Error! One or more fields are empty!")); ?>
            </span>
        </div>
        <div id="snackbar_message_nonexist">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fas fa-times mr-5"></i> <?= translate(htmlspecialchars("Error! The requested message does not exist!")); ?>
            </span>
        </div>
        <div id="snackbar_incorrect_password">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fas fa-times mr-5"></i> <?= translate(htmlspecialchars("Error! The password you entered is incorrect!")); ?>
            </span>
        </div>
    </div>

    <!-- Darkmode Widget -->
    <div class="darkmode-widget">
        <button class="darkmode-widget-button" id="darkSwitch"></button>
    </div>

    <!-- Site Javascript -->
    <script src="<?= getInstallationPath(); ?>/public/assets/js/globalFunctions.js"></script>
    <script src="<?= getInstallationPath(); ?>/public/assets/js/buttonSnackbar.js"></script>
    <script src="<?= getInstallationPath(); ?>/public/assets/js/formContentUpdate.js"></script>
    <script src="<?= getInstallationPath(); ?>/public/assets/js/darkModeWidget.js"></script>
    <script src="<?= getInstallationPath(); ?>/public/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?= getInstallationPath(); ?>/public/assets/js/jquery-2.1.1.min.js"></script>
    <script src="<?= getInstallationPath(); ?>/public/assets/js/momentjs.min.js"></script>
    <script>
        checkEncryptionStatus(); // Check if encryption exists
    </script>

</body>

</html>
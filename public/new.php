<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon-100x100.png">
    <meta name="description"
        content="An extremely simple, one-time view encrypted message system. Send anybody passwords, or secret messages on a one-time view basis.">
    <title>NexusEncrypt</title>

    <!-- Site CSS -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Site Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="global-container">
        <div class="main-form">
            <form onsubmit="return false;">
                <div class="page-title-container">
                    <a href="/">
                        <img class="form-icon fa-fade" id="form-icon" draggable="false" alt="NexusEncrypt"
                            aria-label="NexusEncrypt" title="NexusEncrypt" src="/assets/img/favicon-100x100.png">
                    </a>
                    <h2>NexusEncrypt</h2>
                </div>
                <h5 class="text-muted">One-time view encrypted message sharing system</h5>

                <!-- Snackbar -->
                <div class="alert snackbar-container" id="snackbar-container">
                    <div id="snackbar"></div>
                </div>

                <!-- Main Form Content -->
                <div id="form_submission" class="form-area">
                    <div class="input-container">
                        <label for="submission_text_box">Share Link</label>
                        <textarea type="text" class="form-control form-input-item size-max" id="submission_text_box"
                            disabled></textarea>
                        <label for="submission_password">Decryption Password</label>
                        <input type="text" class="form-control form-input-item size-single" id="submission_password"
                            disabled></input>
                    </div>
                    <p class="text-muted">
                        Share this link and decryption password anywhere on the internet. The message will be
                        automatically destroyed once viewed.
                    </p>
                    <div class="buttons-inline">
                        <button type="button" class="btn btn-primary submit-button button-50"
                            onclick="copyToClipboard('submission_text_box', 'snackbar_link')">
                            Copy Link
                        </button>
                        <button type="button" class="btn btn-primary submit-button button-50"
                            onclick="copyToClipboard('submission_password', 'snackbar_password')">
                            Copy Password
                        </button>
                    </div>
                    <a class="btn btn-secondary submit-button button-100" href="./">
                        Create New Message
                    </a>
                </div>

                <p class="mt-5 mb-3 text-muted">
                    <a href="https://github.com/arizon-dev/quickblaze-encrypt"
                        class="text-muted no-decoration">GitHub</a>
                    •
                    <a href="https://discord.gg/dP3MuBATGc" class="text-muted no-decoration">Discord</a>
                    •
                    <a href="https://github.com/arizon-dev/quickblaze-encrypt/releases"
                        class="text-muted no-decoration">
                        {{version.label}}
                    </a>
                </p>

            </form>

        </div>
    </div>

    <!-- Snackbar Notifications -->
    <div class="snackbar-messages">
        <div id="snackbar_link">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fa-solid fa-check mr-5"></i>
                Link has been copied to clipboard!
            </span>
        </div>

        <div id="snackbar_password">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fa-solid fa-check mr-5"></i>
                Password has been copied to clipboard!
            </span>
        </div>

        <div id="snackbar_empty_fields">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fa-solid fa-xmark mr-5"></i>
                Error! One or more fields are empty!
            </span>
        </div>

        <div id="snackbar_error">
            <span class="snackbar-text" id="snackbar-text">
                <i class="fa-solid fa-xmark mr-5"></i>
                Error! An error occurred processing your message!
            </span>
        </div>
    </div>

    <!-- Darkmode Widget -->
    <div class="darkmode-widget">
        <div class="darkmode-btn-wrapper">
            <button class="darkmode-btn" id="darkSwitch"></button>
        </div>
    </div>

    <!-- Site Javascript -->
    <script src="/assets/js/globalFunctions.js"></script>
    <script src="/assets/js/buttonSnackbar.js"></script>
    <script src="/assets/js/formContentUpdate.js"></script>

    <script src="/assets/js/darkModeWidget.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-2.1.1.min.js"></script>
    <script src="/assets/js/momentjs.min.js"></script>
</body>

</html>
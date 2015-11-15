<?php
    include "config.php";

    function getKey($file) {
        $key = file_get_contents($file);
        return json_encode($key);
    }

    $PUBKEY = getKey($KEYFILE);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Easy PGP composer</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Easy PGP composer</a>
            </div>
          </div>
        </nav>
        <div class="container">
            <div class="">
                <h2>Write a secure message to <e><?php echo $CONTACTNAME; ?></e></h2>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Your message:</h3>
                        <form onsubmit="return false;">
                            <label for="mailfrom" class="sr-only">Your email</label>
                            <input type="text" name="mailfrom" id="mailfrom" class="form-control" placeholder="Your email" required="required" autofocus="">
                            <br>
                            <label for="message" class="sr-only">Your message</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Your message" required=""></textarea>
                        </form>
                        <p>All data is encrypted in your browser and not sent to a server.</p>
                    </div>
                    <div class="col-md-6">
                        <h3>PGP message:</h3>
                        <pre id="output"></pre>
                        <p>This is a PGP encrypted message. You can send this over an unsecure channel.</p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
          <div class="container">
            <p class="text-muted">With &hearts; from <a href="https://0day.work">0day.work</a> - <a href="https://github.com/gehaxelt/PHP-Easy-PGP-Composer">Fork me on GitHub</a></p>
          </div>
        </footer>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/openpgp.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script>
            var publicKey = openpgp.key.readArmored(<?php echo $PUBKEY; ?>);
        </script>
    </body>
</html>
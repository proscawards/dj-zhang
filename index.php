<?php
    require "vendor/autoload.php";
    $error = "";
    session_start();
    if (isset($_SESSION['success'])) {
        header("Location: home.php");
    }
    if (isset($_POST['submit'])) {
        $secret = $_POST['secret'];
        if (md5($secret) == getenv("SECRET_KEY")){
            $error = "";
            $_SESSION['success'] = true;
            header("Location: home.php");
        }
        else{
            $error = "Invalid secret key!";
        }
    }
?>
<html>
    <head>
        <title>🎧 DJ Ah Zhang</title>
        <link rel="icon" href="images/twitch.ico">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.2/sweetalert2.min.js" integrity="sha512-PSn4XRfPQ1f3lzNxuLYp08+/zDlpruSRVeWqZB1/DBZ86Vyl7BEYxqMSxoONvAQNyV57NetUyDv5QJD7qGNBGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.2/sweetalert2.min.css" integrity="sha512-OkYLbkJ4DB7ewvcpNLF9DSFmhdmxFXQ1Cs+XyjMsMMC94LynFJaA9cPXOokugkmZo6O6lwZg+V5dwQMH4S5/3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css"/>
        <script defer src="scripts/index.js"></script>
    </head>
    <body>
        <div class="row col-md-12" id="login">
            <div class="col-md-3 form-group">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="secret">Secret</label>
                    <input type="password" class="form-control" id="secret" name="secret" aria-describedby="secret" placeholder="Enter secret key" required>
                    <small id="secretHelp" class="form-text text-muted">Secret can be obtained from Qiqi.</small>
                    <span id="error" name="error"><?php echo $error; ?></span><br/>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
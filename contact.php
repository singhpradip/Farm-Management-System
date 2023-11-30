<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contact.css">

    <title>Farm Management System</title>
    <!-- <script >
        function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8 || key == 32);
        };
    </script> -->

    <style >
    .contact-form {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
        border-top-right-radius: 10% 50%;
        border-bottom-right-radius: 10% 50%;
    }
    </style>
</head>
<body>
<?php include "_topnav.php" ?>

    <div class="container2 contact-form" style="font-family: 'IBM Plex Sans', sans-serif;">
            <form method="post" action="contact.php">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div>
                        <div>
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" onkeydown="return alphaOnly(event);" required/>
                        </div>
                        <div>
                            <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *" value="" required />
                        </div>
                        <div>
                            <input type="tel" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" minlength="10" maxlength="10" required />
                        </div>
                        <div >
                            <input type="submit" name="btnSubmit" class="btnContact"   value="Send Message" />
                        </div>
                    </div>
                    <div>
                        <div >
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>


    <script src="script.js"></script>
</body>
</html>

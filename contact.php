<!DOCTYPE html5>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Auza photography website">
        <meta name="keywords" content="photos, photography">
        <meta name="author" content="Laura Iesalniece">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auza photography</title>
        <link rel="stylesheet" href="./resources/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">   
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Josefin+Sans:wght@100;400&display=swap" rel="stylesheet">
        <link rel="icon" href="./resources/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <header>
            <!--Navigation-->
            <div class="nav">
                <a href="./index.html" class="logo logo-name">Auza photography</a>
                <a class="nav-a logo" href="./contact.php">Contacts <i class="fa fa-address-book" aria-hidden="true"></i></a>
                <div class="dropdown">
                    <a class="nav-a logo" href="./index.html">More <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-content">
                        <a href="./photos.html" class="logo">More photos</a>
                        <a href="./blog.html" class="logo">Blog</a>
                        <a href="./courses.html" class="logo">Courses</a>
                    </div>
                </div>
            </div>
        </header>
        <!--Form-->
        <Main class="main-section-form">
            <h4 class="sent-notification"></h4>
            <form id="form">
                <div class="form-field">
                    <label for="name"></label>
                    <i class="fa fa-user icon" aria-hidden="true"></i>
                    <input class="field" type="text" placeholder="Name" id="name" name="name" required>    
                </div>
                <div class="form-field">
                    <label for="email"></label>
                    <i class="fa fa-envelope icon" aria-hidden="true"></i>
                    <input class="field" type="text" placeholder="E-mail" id="email" name="email" required>
                </div>
                <div class="form-field"> 
                    <label for="subject"></label>
                    <i class="fa fa-info icon" aria-hidden="true"></i>
                    <input class="field" type="text" placeholder="Subject" id="subject" name="subject" required>
                </div>
                <div class="form-field">
                    <label for="message"></label>
                    <i class="fa fa-commenting icon" aria-hidden="true"></i>
                    <textarea class="field" name="message" id="message" placeholder="Write your message" required></textarea>
                </div>
                <div class="submit-btn">
                    <button class="btn-form" onclick="sendEmail()" type="button" name="submit" id="submit" value="Send">Send</button>
                </div>
            </form>
            <!--For PHPMailer-->
            <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script type="text/javascript">
                function sendEmail() {
                    var name = $("#name");
                    var email = $("#email");
                    var subject = $("#subject");
                    var message = $("#message");

                    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(message)) {
                        $.ajax({
                            url: 'sendemail.php',
                            method: 'POST',
                            dataType: 'json',
                            data:{
                                name: name.val(),
                                email: email.val(),
                                subject: subject.val(),
                                message: message.val()
                            }, success: function(response){
                                $('#form')[0].reset();
                                $('.sent-notification').text("Message sent successfully!");
                            }
                        })
                    }

                }
                function isNotEmpty(caller){
                    if(caller.val()==""){
                        caller.css('border', '1px solid red');
                        return false;
                    } else {
                        caller.css('border', '');
                        return true;
                    } 
                }
            </script>

        <!--Footer section-->
        <div class="footer">
            <hr>
            <footer>
                <p>&copy; Auza photography 2021</p>
            </footer>
        </div>
        </Main>
    </body>
</html>
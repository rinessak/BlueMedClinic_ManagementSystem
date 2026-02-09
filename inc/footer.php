<footer class="main-footer">
        <div class="main-footer container">
            <div>
                <p>&copy; BlueMed Clinic. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="jquery-3.6.0.js"></script>
    <script src="slick.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            fjalekalimi: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            fjalekalimi: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please provide an email",
                email: "Please enter a valid email address"
            }
        }
    });

    $('#dalja').click(function(){
        $.ajax({
            url: './inc/functions.php?argument=dalja',
            success: function(data) {
                window.location.href = data;
            }
        });
    });
    $("#message").fadeOut(8000,function(){
        $.ajax({
            url: './inc/functions.php?argument=message',
        });
    });
    </script>    
</body>
</html>
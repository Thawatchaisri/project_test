<!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//oss.maxcdn.com/libs/html5shiv/r29/html5.min.js"></script>
            <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>

            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="form" role="form">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Login</h4>
                            </div>
                            <div class="modal-body">
                                <div id="messages"></div>
                                YOUR FORM ELEMENTS HERE
                            Username: <input type="text" name="username">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $('#form').submit(function(e) {

                var form = $(this);
                var formdata = false;
                if(window.FormData){
                    formdata = new FormData(form[0]);
                }

                var formAction = form.attr('action');

                $.ajax({
                    type        : 'POST',
                    url         : 'login.php',
                    cache       : false,
                    data        : formdata ? formdata : form.serialize(),
                    contentType : false,
                    processData : false,
                    dataType: 'json',

                    success: function(response) {
                        //TARGET THE MESSAGES DIV IN THE MODAL
                        if(response.type == 'success') {
                            $('#messages').addClass('alert alert-success').text(response.message);
                        } else {
                            $('#messages').addClass('alert alert-danger').text(response.message);
                        }
                    }
                });
                e.preventDefault();
            });
        </script>
    </body>
</html>
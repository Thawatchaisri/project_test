
<meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            body{
                padding: 7;
                margin: 7;
                ;
            }
            h3.indent{ padding-left: 1.8em }
        /* Note: Try to remove the following lines to see the effect of CSS positioning */
        .affix {
            top: 0;
            width: 100%;
            z-index: 9999 !important;
        }

        .affix + .container-fluid {
            padding-top: 70px;
        }

        * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
 font-size: 14.5px;
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  font-size: 14.5px;
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}h4{
  color :red;
  font-size :12px;
}



        </style>
      <body>
          
    
        <div class="container-fluid" style="background-color:#999999	;color:#000000;height:200px;">
            <h1>: : ระบบแจ้งซ่อม</h1>
            <h3  class="indent"> SYSTEM REPAIR ONLINE </h3>
        </div>

        <nav class="navbar navbar-inverse" style="background-color:black;  data-spy="affix" data-offset-top="197">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">แจ้งซ่อม</a></li>
                <li><a href="#">ติดตามสถานะ</a></li>
                <li><a href="#">ข่าวสาร</a></li>

   <!--             ********************       ส่วนของ AJAX LOGIN         *************       -->

                <li ><a herf class="btn btn-primary" data-toggle="modal" style ="background-color:black; border-color:black" data-target="#myModal">Login</a></li>
                <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="form" role="form">
                            <div class="modal-header">
                                <button type="button"  class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" style="color:RED; font-size: 20px">Login</h4>
                            </div>
                            <div class="modal-body">
                                <div id="messages"></div>
                                
                            Username: <input type="text" name="username">
                            Password       <input type="text" name="username"> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
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
                            header_location('admin.php');
                        } else {
                            $('#messages').addClass('alert alert-danger').text(response.message);
                        }
                    }
                });
                e.preventDefault();
            });
         
        </script>
            </ul>
        </nav>
<!--                 *************       สิ้นสุดส่วนของ AJAX LOGIN         *************        -->
        <div class="container">
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="name">ชื่อคนแจ้ง</label> 
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" placeholder="Your name..">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="name">Email คนแจ้ง</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" placeholder="Your email..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="plance">สถานที่</label>
    </div>
    <div class="col-75">
      <input type="text" id="plance" name="plance" placeholder="ที่ตั้ง . .">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="typeitem">เลือกฝ่ายที่รับผิดชอบ</label> 
    </div>
    <div class="col-75">
      <select id="typeitem" name="typeitem">
        <option value="it">IT</option>
        <option value="EN">EN </option>
        <option value="Repair">ซ่อมบำรุง</option>
      </select>
      </div></div>

    <div class="row">
    <div class="col-25">
      <label for="typeitem">อุปกรณ์</label> 
    </div>

<?php 
include "condb.php";
$qry = "select id, name from item_en";
$rs = $conn->query($qry);
$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);
?>
 <div class="col-75">
	<select id="typeitem-list">
		<option value="0"> ----</option>
		<?php
		foreach($fetchAllData as $personInformation)
		{
			$personID = $personInformation['id'];
			$createFullName = $personInformation['name'];
			echo '<option value = "'.$personID.'">'.$createFullName.'</option>';
		} 
		?>
	</select>
  </div>
</div>

  <!--div class="row">
    <div class="col-25">
      <label for="typeitem">อุปกรณ์ที่เสีย</label>
    </div>
    <div class="col-75">
      <select id="typeitem" name="typeitem">
        <option value="it">**query อุปกรณ์ที่แต่ละฝ่ายรับผิดชอบมาแสดง</option>
        <option value="EN">**query อุปกรณ์ที่แต่ละฝ่ายรับผิดชอบมาแสดง </option>
        <option value="Repair">**query อุปกรณ์ที่แต่ละฝ่ายรับผิดชอบมาแสดง</option>
      </select>
    </div>
  </div-->


  <div class="row">
    <div class="col-25">
      <label for="subject">รายละเอียด</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label for="imgaes">อัพโหลดภาพ</label>
    </div>
    <div class="col-75">
    <input type="file" name="fileToUpload" id="fileToUpload"> <h4>**จำเป็นต้องอัพโหลด</h4>
    </div>
    </div>
    


        <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js">
      
         </script>
        <script src="/bootstrap/js/bootstrap.min.js">

        </script>
     
        </body>
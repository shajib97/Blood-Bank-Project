<?php include 'inc/header.php';?>

<section class="homepage">

        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                    <?php 
            if ($_SERVER['REQUEST_METHOD']=='POST') {  
            $name =  $fm->validation($_POST['name']);    
            $blood_type =  $fm->validation($_POST['blood_type']);    
            $division =  $fm->validation($_POST['division']);  
            $contact =  $fm->validation($_POST['contact']);  
            $priority =  $fm->validation($_POST['priority']);  
            $area =  $fm->validation($_POST['area']);  
            $comment =  $fm->validation($_POST['comment']);  

            $name =  mysqli_real_escape_string($db->link,$name);
            $blood_type =  mysqli_real_escape_string($db->link,$blood_type);
            $division =  mysqli_real_escape_string($db->link,$division);
            $contact =  mysqli_real_escape_string($db->link,$contact);
            $priority =  mysqli_real_escape_string($db->link,$priority);
            $area =  mysqli_real_escape_string($db->link,$area);
            $comment =  mysqli_real_escape_string($db->link,$comment);
         
           if(empty($name) || empty($blood_type) || empty($division) || empty($contact) || empty($priority) || empty($area) || empty($comment) ){
            echo "<span class='label label-danger'>Field must not be empty  !!!</span><br><br>";
           }else{
            
           $query = "INSERT INTO  tbl_blood_request(name,blood_type,division,contact,priority,area,comment) VALUES ('$name','$blood_type','$division','$contact','$priority','$area','$comment')";
                $userinsert = $db->insert($query);
                if($userinsert){
                   echo "<center><span class='label label-success'>Request Successfully Sent...!!!</span></center><br><br>";
            
                          }    
            }
          }
  
            ?>
                        <form action="search.php" class="form-horizontal" role="form" method="get">
            <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Search:</label>
      <div class="col-md-7">          
         <select name="blood_group" class="form-control" id="sel1"  required="required">
                <option value="">Select Blood Group</option>
                <option value="A negative(-)">A negative(-) blood donars</option>
                <option value="A positive(+)">A positive(+) blood donars</option>
                <option value="AB negative(-)">AB negative(-) blood donars</option>
                <option value="AB positive(+)">AB positive(+) blood donars</option>
                <option value="B negative(-)">B negative(-) blood donars</option>
                <option value="B positive(+)">B positive(+) blood donars</option>
                <option value="O negative(-)">O negative(-) blood donars</option>
                <option value="O positive(+)">O positive(+) blood donars</option>
      </select>
      </div>
      <div class="col-md-3">
      <input type="submit" value="Search" class="btn btn-link navy-bg request_blood"/>
      </div>

    </div>
        </form>
                    </div>
            </div>
        </div>

        

      </section><hr>

        <section id="request" class="comments gray-section" style="margin-top: 10px;padding-top:30px;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center wow zoomIn animated" style="visibility: visible;">
                    <i class="fa fa-tint" style="color:#ff424a;font-size: 60px"></i>
                    <h1>
                        Looking for Blood?
                    </h1>
                    <div class="testimonials-text">
                        <i>"Kindly leave us the required information and we will contact you shortly."</i>
                    </div><br>
                    <button style="padding:10px;" type="button" class="btn btn-link navy-bg request_blood" data-toggle="modal" data-target="#myModal">Request now</button>
                </div>
            </div>
        </div>
    </section><hr>

<section class="navy-section testimonials" style="margin-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                     <?php 
          $query = "SELECT * from tbl_blood_request WHERE approve=1 order by id DESC LIMIT 1";
          $donors = $db->select($query);
          if($donors){ 
            while ($result = $donors->fetch_assoc()) {?>
                    <h1>Currenlty Looking for..</h1>
                    <h2><?php echo $result['blood_type']; ?> blood for <?php echo $result['name']; ?></h2>
                        <p><?php echo $result['comment']; ?></p>
            <?php } } ?>
                </div>
            </div>
                       
                    <div class="row text-center m-t-lg" style="margin-bottom:-10px;">
                <a href="viewallrequests.php" class="btn btn-danger">View All</a>
            </div>
            </section><br>
        
        

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myLargeModalLabel">Request Donors</h4>
            </div>
            <form method="POST" action="" accept-charset="UTF-8" data-remote-request="" id="req_form">
            <div class="modal-body">
                <div id="mbody">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group name">
                                <label for="name" class="control-label">Full Name</label>
                                <input class="form-control" placeholder="Contact name" name="name" type="text" required>

                                <span class="help-block name"></span>
                            </div>
                            <div class="form-group blood_type">
                                <label for="blood_type" class="control-label">Blood Group</label>
                                <select class="form-control" name="blood_type" required> <option value="A negative(-)">A negative(-)</option>
                    <option value="A positive(+)">A positive(+)</option>
                    <option value="AB negative(-)">AB negative(-)</option>
                    <option value="AB positive(+)">AB positive(+)</option>
                    <option value="B negative(-)">B negative(-)</option>
                    <option value="B positive(+)">B positive(+)</option>
                    <option value="O negative(-)">O negative(-)</option>
                    <option value="O positive(+)">O positive(+)</option>
                    </select>
                                <span class="help-block blood_type"></span>
                            </div>
                            <div class="form-group division_id">
                                <lable class="control-label">Division</lable>
                                <select class="form-control" id="division_id" name="division" required>
								<option value="Dhaka">Dhaka</option>							
								<option value="Rajshahi">Rajshahi</option>							
								<option value="Khulna">Khulna</option>							
								<option value="Barishal">Barishal</option>							
								<option value="Chattagram">Chattagram</option>							
								<option value="Mymensingh">Mymensingh</option>							
								<option value="Sylhet">Sylhet</option>							
								<option value="Rangpur">Rangpur</option>							
								</select>
                                <span class="help-block division_id"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group contact">
                                <label for="contact" class="control-label">Contact Number</label>
                                <input data-mask="9999999" class="form-control" placeholder="Contact Number" name="contact" type="text" required>
                                <span class="help-block contact"></span>
                            </div>
                            <div class="form-group priority">
                                <label for="priority" class="control-label">Priority</label>
                                <select class="form-control" name="priority" required><option value="Urgent">Urgent</option><option value="Normal">Normal</option></select>
                                <span class="help-block priority"></span>
                            </div>
                            <div class="form-group area_id">
                                <lable for="area_id" class="control-label">Area</lable>
                                <div id="area">
                                    <select class="form-control" id="area_id" name="area" required>
									<option value="Barguna">Barguna</option>
									<option value="Barisal">Barisal</option>
									<option value="Bhola">Bhola</option>
									<option value="Bandarban">Bandarban</option>
									<option value="Brahmanbaria">Brahmanbaria</option>
									<option value="Bagerhat">Bagerhat</option>
									<option value="Bogra">Bogra</option>
									<option value="Chandpur">Chandpur</option>
									<option value="Chittagong">Chittagong</option>
									<option value="Comilla">Comilla</option>
									<option value="Cox's Bazar">Cox's Bazar</option>
									<option value="Dhaka">Dhaka</option>
									<option value="Dinajpur">Dinajpur</option>
									<option value="Faridpur">Faridpur</option>
									<option value="Feni">Feni</option>
									<option value="Gazipur">Gazipur</option>
									<option value="Gaibandha">Gaibandha</option>
									<option value="Gopalganj">Gopalganj</option>
									<option value="Gaibandha">Gaibandha</option>
									<option value="Habiganj">Habiganj</option>
									<option value="Jhalokati">Jhalokati</option>
									<option value="Jessore">Jessore</option>
									<option value="Jhenaidah">Jhenaidah</option>
									<option value="Jamalpur">Jamalpur</option>
									<option value="Joypurhat">Joypurhat</option>
									<option value="Khagrachhari">Khagrachhari</option>
									<option value="Kishoreganj">Kishoreganj</option>
									<option value="Khulna">Khulna</option>
									<option value="Kustia">Kustia</option>
									<option value="Kurigram">Kurigram</option>
									<option value="Lakshmipur">Lakshmipur</option>
									<option value="Lalmonirhat">Lalmonirhat</option>
									<option value="Madaripur">Madaripur</option>
									<option value="Manikganj">Manikganj</option>
									<option value="Munshiganj">Munshiganj</option>
									<option value="Mymensingh">Mymensingh</option>
									<option value="Moulvibazar">Moulvibazar</option>
									<option value="Noakhali">Noakhali</option>
									<option value="Narayanganj">Narayanganj</option>
									<option value="Narsingdi">Narsingdi</option>
									<option value="Netrakona">Netrakona</option>
									<option value="Naogaon">Naogaon</option>
									<option value="Natore">Natore</option>
									<option value="Pabna">Pabna</option>
									<option value="Panchagarh">Panchagarh</option>
									<option value="Patuakhali">Patuakhali</option>
									<option value="Pirojpur">Pirojpur</option>
									<option value="Rangamati">Rangamati</option>
									<option value="Rajbari">Rajbari</option>
									<option value="Rajshahi">Rajshahi</option>
									<option value="Rangpur">Rangpur</option>
									<option value="Shariatpur">Shariatpur</option>
									<option value="Satkhira">Satkhira</option>
									<option value="Sherpur">Sherpur</option>
									<option value="Sirajganj">Sirajganj</option>
									<option value="Sunamganj">Sunamganj</option>
									<option value="Sylhet">Sylhet</option>
									<option value="Thakurgaon">Thakurgaon</option>
								
									</select>
                                </div>
                                
                                <span class="help-block area_id"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group comment">
                        <label for="comment" class="control-label">Exact Location & Date</label>
                        <textarea class="form-control" rows="6" placeholder="Comment..." name="comment" cols="50" required></textarea>
                            <span class="help-block comment"></span>
                    </div>
                </div>
                <div class="row text-center">
                    <span id="result" class="text-navy">All Fields are required</span>
                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-link navy-bg">Send</button>
            </div>
            </form>
        </div>
    </div>
  </div>

<script src="js/loadareas.js"></script>

<?php include 'inc/footer.php';?>
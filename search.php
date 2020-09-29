
<?php include 'inc/header.php';?>

<?php
          //   $query2 = "SELECT * from tbl_donors WHERE donor_group='A negative(-)'";
          // $donors2 = $db->select($query2);
          // echo "<pre>";
          // print_r($donors2);

          // foreach ($donors2 as  $dnr) {
          //    $test = explode("|",$dnr['map']);
             // echo $test[0];
             // echo $test[1];
             // break;
          // }

          // exit;

          ?>

<body class="searchpage" onload = "loadMap()">

        <?php 
           if (isset($_GET['blood_group']) || $_GET['blood_group'] != NULL) {
                $blood_group = $_GET['blood_group'];
            }
         ?>

        <?php 
          $query = "SELECT * from tbl_donors WHERE donor_group='$blood_group' AND approve=1 order by id DESC";
          $donors = $db->select($query);
          if($donors){ ?>
             <center><h2 style="color:green">Showing <?php echo $blood_group; ?> blood donors</h2></center><hr>

              <div class="container">
                  <div class="row">
                          <div class="col-md-12" style="width: 100%">
                            <table class="table table-bordered" id="example" style="    width: 50%;
    float: left;
    display: block;
    overflow: hidden;">
                <thead>
                  <tr>
                    
                    <th width="8%">Full Name</th>
                    <th width="8%">Mobile Number</th>
                        

                    <?php if(Session::get("login") == true){
                     ?>
                    <th width="4%">Request For Blood</th>
                    <?php }
                     ?>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                      while ($result = $donors->fetch_assoc()) { $i++;?>

                        <tr class="odd gradeX">
                          
                          <td><?php echo $result['full_name']; ?></td>
            
                          <td><?php echo $result['mobile_number']; ?></td>
                          
                          

                          
                          <?php if(Session::get("login") == true){ ?>
                          <td><a href="sendbloodrequest.php?id=<?php echo $result['id']; ?>" style="color:green">Send</a></td>
                          <?php } ?>
                        </tr>

                     <?php }
                    }else{
                      echo '<center><h2 style="color:red">No '.$blood_group.' donor found...</h2></center>';
                    }
                  

                     ?>
                </tbody>
              </table>

              <div style="width: 50%;float:left ;" class="location" >
                <script>
         function loadMap() {
      
            var mapOptions = {
               center:new google.maps.LatLng(22.8724, 91.0973),
               zoom:11
            }
        
            var map = new google.maps.Map(document.getElementById("sample"),mapOptions);
            
            <?php 
              $query2 = "SELECT * from tbl_donors WHERE donor_group='$blood_group'";
              $donors2 = $db->select($query2);
              foreach ($donors2 as  $dnr) {
              $lng = $dnr['lng']; 
              $lat = $dnr['lat']; 

              $title = $dnr['full_name'].' '.$dnr['mobile_number'];

              ?>

              
              var marker1 = new google.maps.Marker({
               position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>),
               map: map,
               title: '<?php echo $title; ?>'
            });
             
               <?php }

             ?>   
     }
      </script>
      <div id = "sample" style = "width:580px; height:400px;"></div>
              </div>
            </div>
          </div>
        </div>
    </body>

<?php include 'inc/footer.php';?>




<?php
$menu = "animeList"
?>
<?php include("header.php"); ?>

<?php 

$a_id = $_GET['a_id'];

$query_product = "SELECT * FROM tbl_anime WHERE a_id = $a_id"  
or die("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
$row=mysqli_fetch_array($rs_product);
?>


<script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Anime</h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขอนิเมะ</h3>
              <div class="row">
                 
                 <div class="col-md-8">
             
            </div>
            <br>
            <div class="card-body">

                    <form action="anime_db.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="anime" value="edit">
                    <input type="hidden" name="a_id" value="<?php echo $row['a_id'];?>">
                    <input name="file1" type="hidden" id="file1" value="<?php echo $row['a_img']; ?>" />
                   

                    <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
              <div class="col-sm-10">
                <input  name="a_name" type="text" required class="form-control"  placeholder="anime name" value="<?php echo $row['a_name'];?>" minlength="3"/>
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">เรื่องย่อ </label>
            <div class="col-sm-10">
              <textarea name="a_detail" rows="3" class="form-control" ><?php echo $row['a_detail'];?></textarea>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">จำนวนตอน </label>
            <div class="col-sm-10">
              <input  name="a_episode" type="number" min="0" required class="form-control"  placeholder="จำนวนตอน"  value="<?php echo $row['a_episode'];?>" minlength="3"/>
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ฤดูกาล</label>
              <div class="col-sm-10">
              <select class="form-control" name="a_seasonal" id="a_seasonal"  value="<?php echo $row['a_seasonal'];?>" required>
                  <option value="">-- เลือกฤดูกาล --</option>
                  
                  <option value="winter" <?php if ($row['a_seasonal']=='winter') {echo "selected";}?>>winter</option>
                  <option value="spring" <?php if ($row['a_seasonal']=='spring') {echo "selected";}?>>spring</option>
                  <option value="summer" <?php if ($row['a_seasonal']=='summer') {echo "selected";}?>>summer</option>
                  <option value="autumn" <?php if ($row['a_seasonal']=='autumn') {echo "selected";}?>>autumn</option>
                  
                </select>
                
              </div>
            </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">img</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  ภาพเก่า<br>

                        <img src="../a_img/<?php echo $row['a_img'];?>" width="150px">
                        <input type="hidden" name="a_img2" value="<?php echo $row['a_img'];?>">
                        <br><br>


                   

                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">img</label>
                    <div class="col-sm-10">
                     
                  
                  
            
                  เลือกไฟล์ใหม่<br>


                  <div class="custom-file">
                          <input type="file" class="custom-file-input" id="a_img" name="a_img" onchange="readURL(this);" >
                          <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        <br><br>


                    <img id="blah" src="#" alt="your image" width="300" />


                    </div>
                  </div>




                  <button type="submit" class="btn btn-danger btn-block">Update</button>



                  </form>

                    

                  
                 
            
                    
                 </div>
                 
              </div>


            </div>
            <div class="card-footer">
                     
            </div>


              
    </div>



          

          
        

          



    </section>
    <!-- /.content -->





    

    
<?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>


<!-- http://fordev22.com/ -->
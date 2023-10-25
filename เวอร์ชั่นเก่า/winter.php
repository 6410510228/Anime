<?php
$menu = "product"
?>

<?php
$query_product = "
SELECT * FROM tbl_anime as p
" or die
("Error : ".mysqlierror($query_product));

//echo $query_product;
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
    <h1>Winter Anime List</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">รายการอนิเมะ</h3>
        <div align="right">
          
          
          
 
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-12">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="5%"><center>No.</center></th>
                  <th width="10%">Img</th>
                  
                  <th width="20%">Name</th>
                  <th width="10%">Episode</th>
                  <th width="10%">Description</th>
                  

                </tr>
              </thead>
              <tbody>

                
                
                <tr>
                  <td><?php echo @$l+=1; ?></td>
                  <td><img src="../a_img/<?php echo $row_product['a_img']; ?>" width="100%"></td>
                  <td><?php echo $row_product['a_name']; ?></td>
                  
                  <td><?php echo $row_product['a_episode']; ?></td>
                  <td><?php echo $row_product['a_seasonal']; ?></td>
                  
   
                  </td>
                 
                  
                </tr>
                <?php
                @$total+=$row_product['p_qty'];
                
                //echo $total;
                ?>
              </tbody>
            </table>
            <?php if(isset($_GET['d'])){ ?>
            <div class="flash-data" data-flashdata="<?php echo $_GET['d'];?>"></div>
            <?php } ?>
            <script>
            $('.del-btn').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
            imageUrl: '../logo_fordev22_2.png',
            imageWidth: 250,
            //imageHeight: 100,
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
            document.location.href = href;
            
            }
            })
            })
            const flashdata = $('.flash-data').data('flashdata')
            if(flashdata){
            swal.fire({
            type : 'success',
            title : 'Record Deleted',
            text : 'Record has been deleted',
            icon: 'success'
            })
            }
            </script>
            
            
            
          </div>
          
        </div>
      </div>
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
 



</body>
</html>
<!-- http://fordev22.com/ -->
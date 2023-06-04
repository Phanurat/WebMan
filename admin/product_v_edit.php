<?php 
$menu = "product"
?>
<?php include("header.php"); ?>

<?php 
$p_vid = $_GET['p_vid'];

$query_product = "SELECT * FROM tbl_vproduct 

WHERE p_vid = $p_vid"  
or die("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
$row=mysqli_fetch_array($rs_product);
//echo $row['mem_name'];
//echo ($query_member);//test query
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
        <h1>Product</h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขสินค้า</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
                  <div class="col-md-8"> 
                   <form action="product_v_db.php" method="POST">
                    <input type="hidden" name="product" value="edit">
                    <input type="hidden" name="p_vid" value="<?php echo $row['p_vid'];?>">
                    <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ชนิดสายไฟ </label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="pv_l_id" id="pv_l_id" required>
                        <option value="<?php echo $row['pv_l_id'];?>"> <?php if ($row['pv_l_id']==1) {
                          echo "VCT";
                        }else{
                          echo "VCT-G";
                        } ?> </option>



                          <option value="">-- เลือกชนิดสายไฟ --</option>
                         
                          <option value="1">VCT</option>
                          <option value="2">VCT-G</option>
                      </select>
                    </div>  
                  </div>  
                  

                  <!-- <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ขนาด </label>
                    <div class="col-sm-10">
                      
                    <select class="form-control select2" name="p_vsize" required>
                      
                      <option value="4x1">4x1</option>
                      <option value="4x1.5">4x1.5</option>  
                      <option value="4x2.5">4x2.5</option>
                    </select> 
                    </div>  
                  </div>  -->
                  
                  


                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ขนาด </label>
                    <div class="col-sm-10">
                      <input  name="p_vsize" type="text" required class="form-control"  placeholder="ขนาด" value="<?php echo $row['p_vsize']; ?>"  minlength="3"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ความยาว </label>
                    <div class="col-sm-10">
                      <input  name="p_vlength" type="number" min="0" required class="form-control"  placeholder="ระบุความยาว" value="<?php echo $row['p_vlength']; ?>"  minlength="3"/>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ตำแหน่ง </label>
                    <div class="col-sm-10">
                      <input  name="p_vloca" type="number" min="0" required class="form-control"  placeholder="ตำแหน่ง" value="<?php echo $row['p_vloca']; ?>"  minlength="3"/>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">หมายเหตุ </label>
                    <div class="col-sm-10">
                      <textarea name="p_vdetail" class="form-control"><?php echo $row['p_vdetail']; ?></textarea>
                    </div>
                  </div>





                  <!-- <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Qty </label>
                    <div class="col-sm-10">
                      <input  name="p_qty" type="number" min="0" required class="form-control"  placeholder="Qty" value="<?php echo $row['p_qty']; ?>"  minlength="3"/>
                    </div>
                  </div> -->



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

    // });
  });
</script>
  
</body>
</html>





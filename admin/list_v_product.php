<?php
$menu = "product"
?>

<?php include("header.php"); ?>
<?php
$query_product = "
SELECT * FROM tbl_vproduct as p
" or die
("Error : ".mysqlierror($query_product));
$rs_product = mysqli_query($condb, $query_product);
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
    <h1>Product VCT - VCT-G</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card-gray">
      <div class="card-header ">
        <h3 class="card-title">รายการสินค้า</h3>
        <div align="right">
          
          
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล สินค้า</button>
          
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-8">
            <table id="example1" class="table table-bordered  table-hover table-striped">
              <thead>
                <tr class="danger">
                  <th width="2%"><center>No.</center></th>
                  <th width="5%">ชนิดสายไฟ</th>
                  <!-- <th width="5%">test</th> -->
                  <th width="5%">ขนาด</th>
                  <th width="5%">ความยาว (เมตร)</th>
                  <th width="5%">ตำแหน่ง</th> 
                  <th width="10%">หมายเหตุ</th> 
                  <th width="2%">แก้ไข</th>
                  <th width="2%">ลบ</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_product as $row_product) { ?>
                
                
                <tr>
                  <td><?php echo @$l+=1; ?></td>
                  <!-- <td><?php echo $row_product['p_vname']; ?></td> -->
                  <td><?php echo $row_['pv_l_id'];?> <?php if ($row_product['pv_l_id']==1) {
                          echo "VCT";
                        }else{
                          echo "VCT-G";
                        } ?> </option>
                  </td>
                  <!-- <td><?php echo $row_product['pv_l_id']; ?></td> -->
                  <td><?php echo $row_product['p_vsize']; ?></td>
                  <td><?php echo $row_product['p_vlength']; ?></td>
                  <td><?php echo $row_product['p_vloca']; ?></td>
                  <td><?php echo $row_product['p_vdetail']; ?></td> 
                  
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="product_v_edit.php?p_vid=<?php echo $row_product['p_vid']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a>
                    </p>
                    
                    <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_product['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                  </td>
                  <td><a href="product_v_db.php?p_vid=<?php echo $row_product['p_vid']; ?>&&product=del" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> del</a></td>
                  
                </tr>
                <?php
                @$total+=$row_product['p_vlength'];
                }
                
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
            title: 'คุณต้องการลบใช่หรือไม่ ?',
            text: "จะไม่สามารถกู้คืนได้",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ใช่ ต้องการลบ'
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="product_v_db.php" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="product" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สินค้า</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
              <div class="col-sm-10">
                <select class="form-control select2" name="pv_l_id" value="pv_l_id" required>
                  <option value="">-- เลือกชนิดสายไฟ --</option>
                  <option value="1">VCT</option>
                  <option value="2">VCT-G</option>
                </select>  
                <!-- <input  name="p_vloca" type="text" required class="form-control"  placeholder="ชนิดสายไฟ"  minlength="3"/> -->
              </div>
            </div>
            
            <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ขนาด </label>
            <div class="col-sm-10">
              <input  name="p_vsize"" type="text" min="0" required class="form-control"  placeholder="ขนาด"  minlength="3"/>
            </div>
          </div>

            <!-- <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ขนาด </label>
              <div class="col-sm-10">
                
                <select class="form-control select2" name="p_vsize" id="p_vsize" required>
                  <option value="4x1">4x1</option>
                  <option value="4x1.5">4x1.5</option>
                  <option value="4x2.5">4x2.5</option>
                </select>  
              </div>
            </div> -->

          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ความยาว </label>
            <div class="col-sm-10">
              <input  name="p_vlength"" type="number" min="0" required class="form-control"  placeholder="ระบุความยาว"  minlength="3"/>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ตำแหน่ง </label>
            <div class="col-sm-10">
              <input  name="p_vloca"" type="number" min="0" required class="form-control"  placeholder="ตำแหน่ง"  minlength="3"/>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">หมายเหตุ </label>
            <div class="col-sm-10">
              <textarea name="p_vdetail" rows="3" class="form-control"></textarea>
            </div>
          </div>
          
          <!-- <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Qty </label>
            <div class="col-sm-10">
              <input  name="p_qty" type="number" min="0" required class="form-control"  placeholder="Qty"  minlength="3"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">img</label>
            <div class="col-sm-10"> -->
              
              
              
              
              <!-- เลือกไฟล์ใหม่<br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="p_img" name="p_img" onchange="readURL(this);" >
                <label class="custom-file-label" for="file">Choose file</label>
              </div>
              <br><br>
              <img id="blah" src="#" alt="your image" width="300" />
            </div>
          </div> -->
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>
</div>

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

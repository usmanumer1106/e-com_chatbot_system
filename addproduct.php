<!-- PHP code in this page is  contributed by Muhammad Usman Umer -->
<?php 
require_once("header.php");
require_once('./config/dbconfig.php');
$db= new operationsproduct();
?>  
 <div class="content-wrapper">
<div class="container-fluid">
               <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                    <div class="custom-title-wrap bar-primary">
                                        <div class="custom-title text-center"><h2> Add Product</h2></div>
                                    </div>
                                </div>
                                <?php $db->Store_Record(); ?>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="first"><b>Product Name</b></label>
                                                <input required type="input" name="name" class="form-control rounded-0" id="first" >
                                          
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="last"><b>Product Price</b></label>
                                                <input type="input" name="price" class="form-control rounded-0" id="last" >
                                          
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone"><b>Discount Price</b></label>
                                                <input type="input" name="dprice" class="form-control rounded-0" id="phone" >
                                          
                                            </div>
                                        </div>

                                          <div class="col-md-12" >
                                          <div class="form-group">
                                                <label for="sprice"><b>Show Price</b></label>
                                                    <select class="form-control rounded-0" id="type" name="sprice">
                                                    <option value="NULL">Select Option</option>    
                                                    <option value="0">Show Actual Price</option>
                                                        <option value="1">Show Discounted Price</option> 
                                                    </select>
                                        
                                          </div>
                                        </div>    
                                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country"><b>Main Category</b></label>
                                        <select id="mcat"  class="form-control rounded-0" name="maincat">
                                            <option value="">Select Main Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="state"><b>Subategory</b></label>
                                        <select id="scat"  class="form-control rounded-0" name="subcat">
                                        <option value="">Select Subcategory</option>
                                        </select>
                                    </div>
                                </div>

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="detail"><b>Description</b></label>
                                                    <textarea name="detail" class="form-control rounded-0" id="detail" rows="3"></textarea>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="file"><b>Product Image</b></label>
                                                    <input type="file" name="file" class="form-control rounded-0" id="file"/>
                                                </div>
                                        </div>
                                        <div class="col-md-12">

                                        <div class="text-right">
                                            <button type="submit" name="btn_addproduct" class="btn btn-purple rounded-0">Add Product</button>
                                        </div>
                                </div>
                                    </form>
                                </div>
                         </div>
                </div>
</div>
</div>  

<script type="text/javascript">
    $(document).ready(function() {
        function loadData(type, mcatid) {
            $.ajax({
                url: "config/catsubcat.php",
                type: "POST",
                data: {
                    type: type,
                    id: mcatid
                },
                success: function(data) {
                    if (type == "mcat") {
                        $("#scat").html(data);
                    } else {
                        $("#mcat").append(data);
                    }

                }
            });
        }

        loadData();

        $("#mcat").on("change", function() {
            var mcat = $("#mcat").val();

            if (mcat != "") {
                loadData("mcat", mcat);
            } else {
                $("#scat").html("");
            }


        })
    });
</script>

<?php
require_once("footer.php");
?>

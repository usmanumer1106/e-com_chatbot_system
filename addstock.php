<!-- PHP code in this page is  contributed by Muhammad Usman Umer -->
<?php
if (isset($_GET['P_ID'])) {
    include_once('header.php');
    $id = $_GET['P_ID']; 
} else 
{
    header("location:index.php");
}
if ($id == $_SESSION['addstockid']) {  
    $db = new operationsproduct();
    $result = $db->get_record($id);
    $data = mysqli_fetch_assoc($result);  
if(isset($_POST['btn_addstock']))
{
    require_once('./config/dbconfig.php');
    $db = new operationsproduct();
    $S=$_POST['S'];
    $M=$_POST['M'];
    $L=$_POST['L'];
    $XL=$_POST['XL'];
    $db->add_stock($id,$S,$M,$L,$XL);
}
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card card-shadow mb-4">
                
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center">
                                <h2> Add Stock</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                             <td class="alert alert-success"><b> Product Name: </b><?php echo $data['product_name']; ?></td>
                        </tr>
                    </table>

                        <form method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="s"><b>Small Size Quantity</b></label>
                                    <input required type="input" name="S" class="form-control rounded-0" id="s" value="0">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="m"><b>Medium Size Quantity</b></label>
                                    <input type="input" name="M" class="form-control rounded-0" id="m" value="0"> 

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="l"><b>Large Size Quantity</b></label>
                                    <input type="input" name="L" class="form-control rounded-0" id="l" value="0">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="xl"><b>Extra Large Size Quantity</b></label>
                                    <input type="input" name="XL" class="form-control rounded-0" id="xl" value="0">

                                </div>
                            </div>

                            <div class="col-md-12">

                            <div class="text-left">
                                    <a href="productdetail.php?D_ID=<?php echo $id; ?>" class="btn btn-purple rounded-0">back</a>
                                </div>
                                <div class="text-right" style="margin-top: -42px;">
                                    <button type="submit" name="btn_addstock" class="btn btn-purple rounded-0">Add Stock</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>
 

<?php
require_once('./config/dbconfig.php');
$db = new dbconfig();
class operationscart extends dbconfig
{
    // Store Record in Session
    public function Store_Record()
    {

        if (isset($_POST['btn_cart'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity'] + 1;
            } else {
                $_SESSION['cart'][$id] = array("quantity" => 1, "name" => $name, "image" => $image, "price" => $price, "id" => $id, "size" => 'M');
            }
            header('location:shope.php');
        }
        if (isset($_POST['addtocartsingle'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $image = $_POST['image'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $size = $_POST['size'];
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
                $_SESSION['cart'][$id]['size'] = $size;
            } else {
                $_SESSION['cart'][$id] = array("quantity" => $quantity, "name" => $name, "image" => $image, "price" => $price, "id" => $id, "size" => $size);
            }
        }
        if (isset($_POST['btn_plus'])) {
            $id = $_POST['id'];
            $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity'] + 1;
            header('location:cart.php');
        }
        if (isset($_POST['btn_minus'])) {
            $id = $_POST['id'];

            $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity'] - 1;
            if ($_SESSION['cart'][$id]['quantity'] == 0) {
                unset($_SESSION['cart'][$id]);
            }
            header('location:cart.php');
        }
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            unset($_SESSION['cart'][$id]);
            header('location:cart.php');
        }
    }

    public function placeorder()
    {


        if (isset($_SESSION['cart'])) {

            global $db;
            $id = $_SESSION['user_id'];
            $phone = $_POST['dphone'];
            $name = $_POST['dname'];
            $address = $_POST['daddress'];
            $payment = $_POST['dpayment'];

            $query = "INSERT INTO `order`(`user_id`, `address`,`phone`,`name`,`payment`) VALUES ('$id','$address', '$phone','$name','$payment')";

            $result = mysqli_query($db->connection, $query);
            if ($result) {
                $id = $_SESSION['user_id'];
                $query = "SELECT * FROM `order` where user_id='$id' ORDER BY order_id DESC LIMIT 1";

                $result = mysqli_query($db->connection, $query);
                $data = mysqli_fetch_assoc($result);
                $orderid = $data['order_id'];
                foreach ($_SESSION['cart'] as $id => $CartData) {
                    $pid = $CartData['id'];
                    $qty = $CartData['quantity'];
                    $image = $CartData['image'];
                    $name = $CartData['name'];
                    $price = $CartData['price'];
                    $size = $CartData['size'];
                    $query = "INSERT INTO `order_detail`(`order_id`, `product_id`, `product_quantity`,`product_image`,`product_name`,`product_price`,`product_size`)
             VALUES ('$orderid', '$pid', '$qty', '$image' , '$name', '$price','$size' )";
                    
                    $result = mysqli_query($db->connection, $query);
                }
                unset($_SESSION['cart']);
                unset($_SESSION['payment']);
                unset($_SESSION['orderdata']);
                require_once("../css.php");
                require_once("../javascript.php");
                $to = $_SESSION['user_email'];
           
                $Subject = " " . "Order Placed";
                $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                $Body = "Hi," . $_SESSION['user_name'] ." Your Order is Placed";

                mail($to, $Subject, $Body, $headers);

?>


                <script>
                    $(document).ready(function() {
                        $("#exampleModal").modal('show');
                    });
                </script>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Success!</h5>

                            </div>
                            <div class="modal-body">
                                Order Placed Successfully!
                            </div>
                            <div class="modal-footer">
                                <a href="notprocess.php" class="btn btn-primary">Okay</a>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
            } else {
                return false;
            }
        }
    }
}

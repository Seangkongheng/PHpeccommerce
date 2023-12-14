   <!-- sweet alert in php -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'booksell');
    if (isset($_POST['btnOrder'])) {

      $cart = $_SESSION["carts"];
      $user = $_SESSION['user'];

      $currentDate = date('Y-m-d H:i');
      $fistName = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $phoneNumber = $_POST['phonNumber'];
      $address = $_POST['address'];
      $country = $_POST['country'];
      //get user
      $result = ("SELECT * from userregister where username ='$user'");
      $get_result = mysqli_query($conn, $result);
      $row_fecth = mysqli_fetch_assoc($get_result);
      $userID = $row_fecth['id'];
      //invoice
      $invoce_number = mt_rand();

      // get from cart
      $carts = $_SESSION["carts"];
    }

    // select qty price from carts by emplote id in carts
    $ids = explode(',', $carts);

    $qty = 0;
    $newArrayCarts = array();

    foreach ($ids as $mainID) {
      foreach ($ids as $compaireID) {
        if ($mainID == $compaireID) {
          $qty++;
        }
      }
      $newArrayCarts[$mainID] = $qty;
      $qty = 0;
    }
    $total = 0;
    $subtotal = 0;

    foreach ($newArrayCarts as $id => $qty) :


      $sqlItem = "SELECT *
                  FROM book where book_id ={$id} limit 1";
      $resultsetItem = $conn->query($sqlItem);
      if ($conn->errno > 0) {
        die($conn->error);
      }

      $row_ITem = $resultsetItem->fetch_object();
      $total = $qty * $row_ITem->price;
      $priceProduct = $row_ITem->price;
      $productId = explode(',', $id);

    endforeach;
    // end  select qty price from carts by emplote id in carts


    // insert to table order when customer order product
    foreach ($productId as $id) {
      $sql = "INSERT INTO `order` (invoiceNumber,user,productId,quanity,price,fistname,lastName,email,PhoneNumber,Address,country,OrderDate) 
      VALUES ('$invoce_number','$userID','$id','$qty','$priceProduct','$fistName','$lastname','$email','$phoneNumber','$address','$country','$currentDate')";

      $query_run = Mysqli_query($conn, $sql);

      if ($query_run) {
        // echo "successfull";
        echo "<script>
        swal('Good job!', 'You clicked the button!', 'success');
       </script>";
        header("location:thankpage.php");
        if (!isset($_SESSION['carts'])) {
          echo "Not item in cart";
        } else {
          unset($_SESSION['carts']);
        }
      } else {
        
        echo "not successfull";
      }
    }

    // inster stm

    ?>
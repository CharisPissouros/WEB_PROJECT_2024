<?php

session_start();

include("get_from_database.php");
include("functions.php");
include("json_to_sql.php");

$user = login_sessions($connection);

if (isset($_SESSION['role']) && ($_SESSION['role'] === "admin")){

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Check if username exists
            $query = "select * from user where username = '$username'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0)
            {
                echo "Username: $username already exists! Try a different one.";
            }
            else 
            {
                //Username acceptable.
                $role = 'diasostis';
                $query = "insert into user (username, password, role) values ('$username', '$password', '$role')";
                mysqli_query($connection, $query);
                echo "Neo melos diasosti!";
            }
        } elseif (isset($_POST['load_json_from_url'])){
            url();
        } elseif (isset($_FILES['json_file'])){
            $file = $_FILES['json_file'];
            upload($file);
        } elseif (isset($_POST['category']) && isset( $_POST['products'])){
            $category = $_POST['category'];
            $products_id = $_POST['products'];
            foreach ($products_id as $product){
                //$category_id = find_product_category_id($connection, $product);
                //echo "Katigoria: $category_id";
                //echo "<br> Product: $product";
                $query = "UPDATE products SET product_category_name = '$category' WHERE product_category_id = '$product'";
                mysqli_query($connection, $query);
            }
            echo "Succesfully added category";
        }

    }
} else {
    //Redirect to previous page (No access if role is not admin)
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    // Output JavaScript to redirect back
    echo '<script type="text/javascript">
            alert("You do not have permission to access this page.");
            history.back();
          </script>';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indexnig</title>
    <style>
        @import "../css/general_css.css";
        h2 {
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Welcome to the main admin page.</h1>
    <br><br>
    Hello, <?php echo $user['username'];?>
    <br><br>
    <div id="signup">
    <!-- Sign Up Diasosti Form -->
    <h2>Eggrafi neou diasosti</h2>   
    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <input type="submit" id="login" name="Log In">
    </form>
    </div>
    <br><br>

    <div id="load_json">
    <!-- Load JSON From Url -->
    <h2>Load Json File From Url</h2>
    <form method="POST">
        <input type="submit" name="load_json_from_url" value="Load JSON From URL">
    </form>
    </div>

    <br><br>
    <div id="upload_json">
    <!-- Upload JSON form -->
    <h2>Upload a JSON File</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="json_file">JSON File</label>
        <input type="file" id="json_file" name="json_file" required>
        <br><br>
        <input type="submit" value="Upload JSON">
    </form>
    </div>

    <br><br>
    <div id="map">
    <!-- Show map in admin page not working yet -->
    <h2>Map</h2>
    <!-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src=./map.js></script> -->
    <button class="map-button" onclick="window.location.href='./map.php';">Go to Map</button>
    </div>
    <br><br>
    <br><br>
    <!-- Add a category Form -->
    <h2>Category name and products form</h2>   
    <form method="POST">
        <label for="category">Category Name</label>
        <input type="text" id="category" name="category" required>
        <br>
        <br>
        <label for="products_select">Choose Products to add to the category <br> *Every similar product will automatically get the same category name</label>
        <select id="products" name="products[]" multiple required>
            <!-- Products showing here using AJAX (JQUERY) -->
        </select>
        <br>
        <br>
        <input type="submit" value="Submit selected products">
    </form>
    </div>
    <br><br>

    <div id="Add Product">
    <!-- Add Product to Base Form -->
    <h2>Prosthiki Neou Proiontos</h2>   
    <form method="GET" action="./add_product.php">
        <label for="product">Product Name</label>
        <input type="text" id="product_name" name="product_name" required>
        <br>
        <br>
        <label for="product_category">Product Category</label>
        <input type="text" id="product_category" name="product_category" required>
        <br>
        <br>
        <input type="submit" id="Add_product" name="Add Product to Base">
    </form>
    </div>
    <br><br>

    <div id="Delete Product">
    <!-- Delete Product from Base Form -->
    <h2>Diagrafi Proiontos</h2>   
    <form method="GET">
        <label for="product">Give the name of the product you want to delete</label>
        <input type="text" id="product_name" name="product_name" required>
        <br>
        <br>
        <input type="submit" id="Delete_product" name="Delete Product from Base">
    </form>
    </div>
    <br><br>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'get_products.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        data.forEach(function(product) {
                            $('#products').append('<option value="' + product.product_category_id + '">' + product.product_name + '</option>');
                        });
                    }
                },
                error: function() {
                    alert('Error loading products');
                }
            });
        });
    </script>

    <a href="logout.php">Logout</a>
</body>
</html>
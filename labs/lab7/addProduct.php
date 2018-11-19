<?php
session_start();

if(!isset($_SESSION['adminName']))
{
    header("Location:login.php");
}
include 'dbConnection.php';

$conn=getDatabaseConnection("ottermart");

function getCategories()
{
    global $conn;
    $sql="SELECT catId, catName FROM om_category ORDER BY catName";
    $statement=$conn->prepare($sql);
    $statement->execute();
    $records=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($records as $record)
    {
        echo "<option value='".$record['catId']."'>".$record['catName']."</option>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <form>
        <strong>Product name</strong><input type="text" class="form-control" name="productName"><br>
        <strong>Description</strong><textarea name="description" class="form-control" cols=50 rows=4></textarea><br>
        <strong>Price</strong><input type="text" class="form-control" name="price"><br>
        <strong>Category</strong><select name="catId" class="form-control">
            <option value="">Select One</option>
            <?php getCategories();?>
        </select><br/>
        <strong>Set Image Url</strong><input type="text" name="productImage" class="form-control"><br>
        <input type="submit" name="submitProduct" class='btn btn-primary' value="Add Product">
    </form>
    <?php
    if(isset($_GET['submitProduct']))
    {
        $productName=$_GET['productName'];
        $productDescription=$_GET['description'];
        $productImage=$_GET['productImage'];
        $productPrice=$_GET['price'];
        $catId=$_GET['catId'];
        
        $sql="INSERT INTO om_product (productName, productDescription, productImage, price, catId) 
                VALUES (:productName, :productDescription, :productImage, :price, :catId)";
                
        $namedParameters=array();
        $namedParameters[':productName']=$productName;
        $namedParameters[':productDescription']=$productDescription;
        $namedParameters[':productImage']=$productImage;
        $namedParameters[':price']=$productPrice;
        $namedParameters[':catId']=$catId;
        
        $statement=$conn->prepare($sql);
        $statement->execute($namedParameters);
        echo "<h3 style='color:blue'> Product added Successfully!</h3>";
    }
    
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>

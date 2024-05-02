<h2>Add Category</h2>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'travelerdb');

$sql = "INSERT INTO categories(title) VALUES('$title')";
echo $sql;
if (mysqli_query($conn, $sql)) {
    //in thong bao thanh cong
    header("location:?controller=admin&action=category");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
// nạp file kết nối CSDL
include_once "index.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $query = mysqli_query($connection,$sql);
    while ($data = mysqli_fetch_array($query)){
        $name = $data['name'];
        $address = $data['address'];
        $salary = $data['salary'];
    }
    if (isset($_POST['submit'])) {
        $sqlDelete = "DELETE FROM employees WHERE id = $id";
        $result = $connection -> query($sqlDelete);
        if ($result == true){
            echo "<div class='alert alert-success'>Xóa nhân viên thành công ! <a href='index.php'>Trang chủ</a></div>";
            ?>
            <script type="text/javascript">
                window.location = "http://localhost/PHP1902_Duong/CRUD_App/index.php";
            </script>
            <?php
        } else echo "<div class='alert alert-danger'>Xóa thất bại ! </div>";
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h3>Bạn có chắc chắn xóa nhân viên ?</h3>
            <form name="delete" action="" method="post">
                <div class="form-group">
                    <label>Tên nhân viên: <?php echo $name ;?> </label>
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Xóa nhân viên</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
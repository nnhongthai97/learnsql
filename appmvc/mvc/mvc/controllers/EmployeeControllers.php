<?php
namespace MVC\Controllers;
use MVC\Models\EmployeeModel;
class EmployeeController {
    /**
     * Dùng để điều hướng cho phần hiển thị tất cả các nhận viên
     */
    public function index() {
        $model = new EmployeeModel();
        $resul = $model->getAll();

        // trả về view cho phần hiển thị
        include_once "mvc/views/employee/index.php";
    }
    public function create() {
        if (isset($_POST) && !empty($_POST)) {
            $model = new EmployeeModel();
            $result = $model->insert($_POST);
            if ($result == true) {
                header("Location: index.php?controller=employee&action=index");
                exit;
            }
            echo "<br> Lưu dữ liệu không thành công";
        }

        // trả về view cho phần hiển thị;

        include_once "mvc/views/employee/create.php";
    }
    public function edit() {
        if (isset($_POST) && !empty($_POST)) {
            $model = new EmployeeModel();
            $result = $model->update($_POST);
            if ($result == true) {
                header("Location: index.php?controller=employee&action=index");
                exit;
            }
            echo "<br> Cập nhật dữ liệu không thành công";
        }
        if (isset($_GET["id"])) {
            $model = new EmployeeModel();
            $row = $model->getRow($_GET["id"]);
            // trả về view cho phần hiển thị
            include_once "mvc/views/edit.php";
        }
        echo "URL không hợp lệ";
        exit;
        // trả về view cho phần hiển thị
        include_once "mvc/views/employee/edit.php";
    }
    public function delete() {
        if (isset($_POST) && !empty($_POST["id"])) {
            $model = new EmployeeModel();
            $result = $model->delete($_POST["id"]);
            if ($result == true) {
                header("Location: index.php?controller=employee&action=index");
                exit;
            }
            echo "<br> Xóa dữ liệu không thành công";
        }
        // trả về view cho phần hiển thị
            // trả về view cho phần hiển thị
        include_once "mvc/views/employee/delete.php";
    }
}
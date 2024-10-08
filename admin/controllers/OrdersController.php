<?php
include "models/OrdersModel.php";
class OrdersController extends Controller
{
    use OrdersModel;
    public function index()
    {
        $recordPerPage = 5;
        $numPage = ceil($this->modelTotal() / $recordPerPage);
        $listRecord = $this->modelRead($recordPerPage);
        $this->loadView("OrdersView.php", ["listRecord" => $listRecord, "numPage" => $numPage]);
    }

    //update
    public function update()
    {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $action = "index.php?controller=orders&action=updatePost&id=$id";
        $record = $this->modelGetRecord($id);
        $this->loadView("OrdersFormView.php", ["record" => $record, "action" => $action]);
    }

    //update - POST
    public function updatePost()
    {
        $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? $_GET["id"] : 0;
        $this->modelUpdate($id);
        echo '<script>alert("Cập nhật thành công!");
			window.location.href="index.php?controller=orders";</script>';
    }
}

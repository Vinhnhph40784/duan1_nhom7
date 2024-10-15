<?php
trait OrdersModel
{
    public function modelRead($recordPerPage)
    {
        $total = $this->modelTotal();
        $numPage = ceil($total / $recordPerPage);
        $page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"] - 1 : 0;
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        // $query = $conn->query("SELECT * from orders, order_details, product
        //                                 where order_details.order_id=orders.id and product.id=order_details.product_id ORDER BY order_date DESC limit $from, $recordPerPage");
        $query = $conn->query("SELECT * from orders
                                             ORDER BY order_date DESC limit $from, $recordPerPage");
        return $query->fetchAll();
    }
    public function modelTotal()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select id from orders");
        return $query->rowCount();
    }

    public function modelFeatureProducts()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product");
        $result = $query->fetchAll();
        return $result;
    }
    public function modelFeatureUser()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from user");
        $result = $query->fetchAll();
        return $result;
    }
    public function modelFeatureOrderDetail()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from order_details");
        $result = $query->fetchAll();
        return $result;
    }

    public function modelGetCategories()
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from category");
        $result = $query->fetchAll();
        return $result;
    }

    public function modelUpdate($id)
    {
        $status = $_POST["status"];
        $conn = Connection::getInstance();
        // $query = $conn->prepare("update order_details set status=:_status where order_id=:_id");
        $query = $conn->prepare("update orders set status=:_status where id=:_id");
        $query->execute([":_status" => $status, ":_id" => $id]);
    }

    public function modelGetRecord($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * from orders, order_details, product
                                                where order_details.order_id=orders.id and product.id=order_details.product_id and order_id=$id");
        return $query->fetchAll();
    }
}

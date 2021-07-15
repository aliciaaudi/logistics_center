<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Orders_model");
    }
    
    public function index()
    {
        $this->data['orders'] = $this->Orders_model->getAllOrders();
        
        $this->load->view('orders/list_orders', $this);
    }
    
    public function info($id){
        $aResultat = $this->Orders_model->getOrderById($id);
        
        echo json_encode($aResultat);
    }
    
    public function edit($id, $state){
        
        $aResultat = $this->Orders_model->changeState($id, $state);
        
        echo json_encode($aResultat);
    }
    
    
}

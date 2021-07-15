<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function getAllOrders(){

        $sql = "SELECT 	orders.id_order,
                		DATE_FORMAT(orders.date_add, '%d/%m/%Y %H:%i') as date_add,
                        add1.firstname, 
                        add1.lastname,
                        add2.address1,
                        add2.address2,
                        add1.id_country,
                        country_lang.name as country,
                        GROUP_CONCAT(order_detail.product_name SEPARATOR ', ') as products,
                        order_state_lang.name,
                        orders.current_state
                        FROM orders
                RIGHT JOIN order_state_lang ON orders.current_state = order_state_lang.id_order_state
                INNER JOIN address as add1 ON orders.id_customer = add1.id_customer
                INNER JOIN address as add2  ON orders.id_address_delivery = add2.id_address
                INNER JOIN country_lang ON country_lang.id_country = add1.id_country
                INNER JOIN order_detail ON orders.id_order = order_detail.id_order
                              

                GROUP BY orders.id_order
                HAVING COUNT(orders.id_order)>=1;";
        
        $query = $this->db->query($sql);
                        
        return $query->result_array();
    }
    
    public function getOrderById($id){
        $sql = "SELECT 	orders.id_order,
                		DATE_FORMAT(orders.date_add, '%d/%m/%Y %H:%i') as date_add,
                        add1.firstname,
                        add1.lastname,
                        add2.address1,
                        add2.address2,
                        add1.id_country,
                        country_lang.name as country,
                        GROUP_CONCAT(order_detail.product_name SEPARATOR ', ') as products,
                        order_state_lang.name,
                        orders.current_state
                        FROM orders
                RIGHT JOIN order_state_lang ON orders.current_state = order_state_lang.id_order_state
                INNER JOIN address as add1 ON orders.id_customer = add1.id_customer
                INNER JOIN address as add2  ON orders.id_address_delivery = add2.id_address
                INNER JOIN country_lang ON country_lang.id_country = add1.id_country
                INNER JOIN order_detail ON orders.id_order = order_detail.id_order

                WHERE orders.id_order=$id;";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    
    public function changeState($id, $state){
        $sql = "UPDATE orders SET current_state='$state' WHERE id_order='$id'";
        
        $query = $this->db->query($sql);
        
        return $query;    
        
    }
    
}

?>
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProductModel
 * 
 * Automatically generated via CLI.
 */
class ProductModel extends Model {
    protected $table = '';
    protected $primary_key = 'id';
    protected $fillable = [];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    public function read(){
        return $this->db->table('products')->get_all();
    }

    public function find($id){
        return $this->db->table('products')->where('id', $id)->get();
    }

    public function create($product_name, $description, $price, $quantity){
        $data = array(
            'product_name' => $product_name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity
        );

        $this->db->table('products')->insert($data);
    }

    public function update($id, $product_name, $description, $price, $quantity){
        $data = array(
            'product_name' => $product_name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity
        );

        return $this->db->table('products')->where('id', $id)->update($data);
    }

    public function delete($id){
        return $this->db->table('products')->where('id', $id)->delete();
    }
}
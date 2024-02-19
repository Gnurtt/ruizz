<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class ProductRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    } 
    public function get_all(){
        return DB::table('product')->get(); 
    }
    public function get_all_new(){
        return DB::table('product')
            ->orderBy('created_at', 'ASC')
            ->limit(20)
            ->get(); 
    }
    public function get_best_sale(){
        $sql = " SELECT order_detail.product_id, 
                        sum(order_detail.quantity) as total, 
                        warehouse.quantity,
                        product.name,
                        product.slug,
                        product.prices,
                        product.images
                    FROM order_list
                    LEFT JOIN order_detail
                    ON order_list.id = order_detail.order_id
                    LEFT JOIN warehouse
                    ON warehouse.product_id = order_detail.product_id
                    LEFT JOIN product
                    ON order_detail.product_id = product.id
                    WHERE order_status <> 7 
                    GROUP BY order_detail.product_id, 
                            warehouse.quantity,
                            product.name,
                            product.slug,
                            product.prices,
                            product.images
                    ORDER BY total DESC LIMIT 5";
        return DB::select($sql);
    }
    public function get_related($category_id, $id, $limit){ 
        return DB::table('product') 
                ->select("product.*", 'brand.name as brand_name') 
                ->leftjoin('brand', 'product.brand_id', '=', 'brand.id')
                ->where([["product.brand_id", "=", $category_id], ["product.id", "<>", $id]])
                ->orderByDesc('product.updated_at')  
                ->limit($limit)
                ->get();
    }

    public function find_real_time($slug, $category){
        $where_category = $category == 0 ? "" : " AND category_id = ".$category;
        $sql = "SELECT *
                FROM product 
                WHERE slug like '%".$slug."%'".$where_category."
                LIMIT 5";
        return DB::select($sql);
    }
    public function get_one($id){
        return DB::table('product')
                ->where("product.id", "=", $id)
                ->first(); 
    }
    public function get_one_slug($slug){
        return DB::table('product')
                ->select("product.*", "brand.name as brand_name")
                ->leftjoin("brand", "brand.id", "=", "product.brand_id")
                ->where("product.slug", "=", $slug)
                ->first(); 
    }
    public function get_color($id){
        return DB::table('product_color')
                ->where("product_color.product_id", "=", $id)
                ->leftjoin("color", "product_color.color_id", "=", "color.id")
                ->get(); 
    }

    public function can_comment($id, $product_id){
        if (!$id["id"]) {
            return false;
        }else{
            $data = DB::table('order_list') 
                ->leftjoin('order_detail', 'order_detail.order_id', '=', 'order_list.id') 
                ->where([['order_list.customer_id', $id["id"]], ['order_detail.product_id', $product_id]])
                ->get();
            if (count($data) > 0) {
                return true;
            }else{
                return false;
            }
        }
    }

    public function get_all_condition($request){
        $brand_id    = $request->tag;
        $keyword        = $request->keyword;
        $sort           = $request->sort;
        $prices_from = 1;
        $prices_to = 1000;
        if ($request->prices) {
            list($prices_from, $prices_to) = explode('-', $request->prices, 2);
        }
        

        return DB::table('product') 
            ->select("product.*", 'brand.name as brand_name') 
            ->leftjoin('brand', 'product.brand_id', '=', 'brand.id') 
            ->when($brand_id > 0, function ($query) use ($brand_id) {
                return $query->where('product.brand_id', $brand_id);
            }) 
            ->when($keyword != "", function ($query) use ($keyword) {
                $query->where('product.search_name', "like", "%".$keyword."%");
            })  
            ->whereBetween('product.prices', [$prices_from, $prices_to])
            ->get(); 
    }
    public function get_condition($request, $count){
        $brand_id    = $request->tag;
        $keyword        = $request->keyword;
        $sort           = $request->sort;
        $page           = $request->page;
        
        $prices_from = 0;
        $prices_to = 1000;
        if ($request->prices) {
            list($prices_from, $prices_to) = explode('-', $request->prices, 2);
        }

        return DB::table('product') 
            ->select("product.*", 'brand.name as brand_name') 
            ->leftjoin('brand', 'product.brand_id', '=', 'brand.id') 
            ->when($brand_id > 0, function ($query) use ($brand_id) { 
                $query->where('product.brand_id', "=", $brand_id); 
            }) 
            ->when($keyword != "", function ($query) use ($keyword) {
                $query->where('product.search_name', "like", "%".$keyword."%");
            }) 
            ->whereBetween('product.prices', [$prices_from, $prices_to])
            ->offset(($page-1) * 6)
            ->limit(6)
            ->get();  
    }
 
}

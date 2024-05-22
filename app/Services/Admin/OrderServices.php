<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Services\BaseService;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Support\Facades\DB;

class OrderServices extends BaseService
{
    protected $order;
    protected $productOrder;
    protected $product;
    public function __construct(Order $order, ProductOrder $productOrder,Product $product)
    {
        $this->order = $order;
        $this->productOrder = $productOrder;
        $this->product = $product;
    }
    public function getAllOrderOK()
    {
        $order = $this->order->where('status', 1)->get();
        return $order;
    }
    public function getAllOrderConfirm()
    {
        $orderConfirm = $this->order->where('status', "0")->get();
        return $orderConfirm;
    }
    public function confirmed($id)
    {
        $order = $this->order->find($id);
        $order->status = "1";
        $order->save();
    }
    public function orderDetailAnalysis()
    {
        $startDate = Carbon::now()->subDays(7);
        $endDate = Carbon::now();
        $orderDetail = $this->productOrder
        ->select(DB::raw('DATE(created_at) as sale_date, product_id, SUM(quantity) as total_sales'))
        ->whereDate('created_at', '>', Carbon::now()->subDays(7))
        ->groupBy('sale_date', 'product_id')
        ->orderBy('sale_date', 'desc')
        ->orderBy('total_sales', 'desc')
        ->get()
        ->groupBy('sale_date');
        $bestSellingProductsByDay = [];
        foreach ($orderDetail as $date => $sales) {
            $bestSellingProduct = $sales->first();
            $bestSellingProductsByDay[$date] = $bestSellingProduct;
        }
        $lastSevenDays = Carbon::now()->subDays(7);
        $totalRevenueByDay = $this->productOrder
            ->select(DB::raw('DATE(created_at) as sale_date, SUM(total) as total_revenue'))
             ->where('created_at', '>=', $lastSevenDays)
                ->groupBy('sale_date')
             ->orderBy('sale_date', 'desc')
            ->get();
        $dateRange = Carbon::now()->subDays(7);
        $bestSellingProducts = DB::table('product_order')
            ->select('product_order.product_id', DB::raw('SUM(quantity) as total_sales'))
            ->where('product_order.created_at', '>=', $dateRange)
            ->groupBy('product_order.product_id')
            ->orderBy('total_sales', 'desc')
            ->limit(5)
            ->get();
        $data=[];
        foreach($bestSellingProductsByDay as $dataProduct){
            $sale_date = $dataProduct['sale_date'];
            if($totalRevenueByDay->contains('sale_date', $sale_date)){
                $productName = Product::where('id',$dataProduct['product_id'])->first();
                $total_renuve = $totalRevenueByDay->where('sale_date', $sale_date)->first()['total_revenue'];
                $data[] = [
                    'sale_date' => $sale_date,
                    'product_id' => $dataProduct['product_id'],
                    'name' => $productName['name'],
                    'total_sales' => $dataProduct['total_sales'],
                    'total_revenue' => $total_renuve,
                ];
            }
        }
        $totalSales = $totalPirce = $date = $name = [];
        
        foreach($data as $arrayTotal){
            $totalSales[] = $arrayTotal['total_sales'];
            $name[] = $arrayTotal['name'];
            $totalPirce [] = $arrayTotal['total_revenue'];
            $date [] = $arrayTotal['sale_date'];
        }
        $productIds = $bestSellingProducts->pluck('product_id')->toArray();
        $totalSales1 = $bestSellingProducts->pluck('total_sales')->toArray();
        $productNames = Product::whereIn('id', $productIds)->pluck('name')->toArray();
        $totalSales1 = collect($totalSales1)->map(function ($item) {
            return intval($item);
        })->toArray();
        
        // dd($totalSales1,$productNames);
        return compact('data','totalSales','totalPirce','date','name','productNames','totalSales1');
    }
    public function dasboard(){
        $productSale = $this->productOrder->whereDate(DB::raw('DATE(created_at)'),today())->sum('quantity');
        $productSaleSub = $this->productOrder->whereDate(DB::raw('DATE(created_at)'),today()->sub(new DateInterval('P1D'))->format('Y-m-d'))->sum('quantity');
        $percent = 0;
        if( $productSaleSub !== 0){
            $percent = 100 * $productSale / $productSaleSub;
        } 
        $total = $this->productOrder->whereDate(DB::raw('DATE(created_at)'),today())->sum('total');
        $totalSub = $this->productOrder->whereDate(DB::raw('DATE(created_at)'),today()->sub(new DateInterval('P1D'))->format('Y-m-d'))->sum('total');
        $percentTotal = 0;
        if($percentTotal !== 0 ){
            $percentTotal =  100 * $total / $totalSub;
        }
        $percentTotal = number_format($percentTotal ,2);
        $category = Category::count();
        $product1 = $this->product->sum('quantity') ;
        // dd($product);
        $data  = [
            'quantity' => $productSale,
            'percent' => $percent,
            'total' => $total,
            'percentTotal' => $percentTotal
        ];
        $topBestSell = $this->productOrder->select('product_id', DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(total) as total_sales'))
        ->whereDate('created_at',  Carbon::now('Asia/Ho_Chi_Minh'))
        ->groupBy('product_id')
        ->orderBy('total_quantity', 'desc')
        ->get();
        // dd(today(),$topBestSell);
        $bestSellToDay = [];
        foreach($topBestSell as $item){
            $product = Product::where('id', $item->product_id)->first();
            $bestSellToDay [] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'total' => $item['total_quantity'],
                'sale' => $item['total_sales'],
            ];
        }
        // dd($bestSellToDay);
        return compact('data','category','product1','bestSellToDay');
    }
}
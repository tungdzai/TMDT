<?php

namespace App\Services\Web;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Services\BaseService;

class OrderServices extends BaseService
{
    protected $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function create($data)
    {
        $data = $data->all();
        $cart = session()->get('cart');
        $total = 0;
        // 'name','phone','address','address','total','quantity','status','user_id','payment'
        $quantity = 0;
        foreach ($cart as $cartItem) {
            $total += $cartItem['price'] * $cartItem['quantity'];
            $quantity += $cartItem['quantity'];
        }

        $data['user_id'] = auth()->user()->id;
        $data['name'] = auth()->user()->name;
        $data['total'] = $total;
        $data['quantity'] = $quantity;
        $data['status'] = "0";
        if ($data['payment'] == "1") {
            $data['status'] = "1";
            $dataset = [];
            $order = $this->order->create($data);
            foreach ($cart as $productId => $cartItem) {
                $product = Product::find($productId);
                $product['quantity'] = $product['quantity'] - (int) $cartItem['quantity'];
                $product = $product->save();
                $dataset['order_id'] = $order['id'];
                $dataset['product_id'] = $productId;
                $dataset['quantity'] = (int) $cartItem['quantity'];
                $dataset['total'] = $dataset['quantity'] * $cartItem['price'];
                $dataset['status'] = 1;
                $productOrder = ProductOrder::create($dataset);
            }
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/order/vnpay";
            $vnp_TmnCode = "W1B32QI3";
            $vnp_HashSecret = "MCHJPGYONBDQLAQTQRNAFIVUFLSENBTG";
            $vnp_TxnRef = rand(100, 1000);
            $vnp_OrderInfo = "Thanh toán đơn hàng test";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = $total;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version

            //Billing
            // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            // $vnp_Bill_Email = $_POST['txt_billing_email'];
            // $fullName = trim($_POST['txt_billing_fullname']);
            // if (isset($fullName) && trim($fullName) != '') {
            //     $name = explode(' ', $fullName);
            //     $vnp_Bill_FirstName = array_shift($name);
            //     $vnp_Bill_LastName = array_pop($name);
            // }
            // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
            // $vnp_Bill_City = $_POST['txt_bill_city'];
            // $vnp_Bill_Country = $_POST['txt_bill_country'];
            // $vnp_Bill_State = $_POST['txt_bill_state'];
            // Invoice
            // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
            // $vnp_Inv_Email = $_POST['txt_inv_email'];
            // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
            // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
            // $vnp_Inv_Company = $_POST['txt_inv_company'];
            // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
            // $vnp_Inv_Type = $_POST['cbo_inv_type'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount * 100,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00'
                ,
                'message' => 'success'
                ,
                'data' => $vnp_Url
            );

            if (isset($_POST['payment']) && $_POST['payment'] == "1") {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        } else {
            $order = $this->order->create($data);
            foreach ($cart as $productId => $cartItem) {
                $product = Product::find($productId);
                $product['quantity'] = $product['quantity'] - (int) $cartItem['quantity'];
                $product = $product->save();
                $dataset['order_id'] = $order['id'];
                $dataset['product_id'] = $productId;
                $dataset['quantity'] = (int) $cartItem['quantity'];
                $dataset['total'] = $dataset['quantity'] * $cartItem['price'];
                $productOrder = ProductOrder::create($dataset);
            }
            return $cart;
        }
    }
    public function checkVN($id)
    {
        $product = Product::find($id);

    }
    public function backDetail()
    {
        $cart = session()->get('cart');
        session()->forget('cart');
    }
}

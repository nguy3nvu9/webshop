<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thông báo đặt hàng</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        text-align: center;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
        text-align: left;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    
                    <table>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="title">
                                <h2>BANMEXANH</h2>
                            </td>
                            
                            <td>
                                Số #: {{$order->id}}<br>
                                Thời gian: {{$order->created_at}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                Địa chỉ giao :{{$order->address}}
                            </td>
                            
                            <td>
                                Tên khách hàng : {{$order->name}} <br>
                                Email : {{Session::get('client')->email}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            
            
            <table>
                <tr class="heading">
                    <td>
                        Sản phẩm
                    </td>
                    <td>
                        Số lượng
                    </td>
                    <td>
                        Giá sản phẩm
                    </td>
                    <td>
                        Tổng giá
                    </td>
                </tr>

                @foreach ($orders as $order)
                    @foreach ($order->cart->items as $item)
                        <tr class="item">
                            <td>
                               {{$item['product_name']}}
                            </td>
                            <td>{{$item['qty']}}</td>
                            <td>{{$item['product_price']}}</td>
                            <td>
                                {{$item['product_price']*$item['qty']}} VNĐ
                            </td>
                        </tr>  
                    @endforeach
                    <tr class="total">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                           Tổng cộng : {{$order->cart->totalPrice}} VNĐ
                        </td>
                    </tr>
                @endforeach
               
            </table>
        </table>
        <p>Cảm ơn quý khách đã mua hàng của BanMeXanh, nếu có thắc mắc xin vui lòng liên hệ support@banmexanh.com</p>
    </div>
</body>
</html>

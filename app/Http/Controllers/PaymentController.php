<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\ItemList;
use PayPal\Api\Item;
use PayPal\Api\Details;
use PayPal\Exception\PayPalConnectionException;

class PaymentController extends Controller
{
    protected $_apiContext;

    public function __construct()
    {
        $this->_apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // Client ID
                config('services.paypal.secret')         // Secret
            )
        );
    }

    public function createPayment(Request $request)
    {
        // Khởi tạo đối tượng Payer
        $payer = new Payer();
        $payer->setPaymentMethod('paypal'); // Chọn phương thức thanh toán PayPal

        // Tạo Amount (số tiền thanh toán)
        $amount = new Amount();
        $amount->setCurrency('USD')   // Loại tiền tệ (có thể là VND tùy nhu cầu)
               ->setTotal($request->tong_tien); // Số tiền thanh toán

        // Tạo Transaction (giao dịch)
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription('Thanh toán đơn hàng #' . $request->don_hang_id);

        // Tạo Redirect URLs (URL khi thanh toán thành công và thất bại)
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.paypal.callback'))  // Callback sau khi thanh toán thành công
                     ->setCancelUrl(route('payment.paypal.cancel'));      // Callback khi thanh toán bị hủy

        // Tạo Payment
        $payment = new Payment();
        $payment->setIntent('sale')               // Mục đích thanh toán (sale: thanh toán ngay)
                ->setPayer($payer)               // Phương thức thanh toán
                ->setTransactions([$transaction]) // Các giao dịch
                ->setRedirectUrls($redirectUrls); // Các URL redirect

        // Tạo và gửi yêu cầu thanh toán tới PayPal
        try {
            $payment->create($this->_apiContext); // Gửi yêu cầu thanh toán
            return redirect($payment->getApprovalLink()); // Chuyển hướng người dùng đến PayPal để thanh toán
        } catch (PayPalConnectionException $ex) {
            // Nếu có lỗi khi kết nối PayPal, bạn có thể xử lý tại đây
            return redirect()->route('order.failure')->with('error', 'Thanh toán không thành công!');
        }
    }
    public function paypalCallback(Request $request)
{
    $paymentId = $request->input('paymentId');   // Lấy Payment ID từ PayPal
    $payerId = $request->input('PayerID');       // Lấy Payer ID từ PayPal

    // Khôi phục Payment từ Payment ID
    $payment = Payment::get($paymentId, $this->_apiContext);

    // Xác nhận giao dịch
    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

    try {
        // Thực hiện thanh toán
        $payment->execute($execution, $this->_apiContext);

        // Thanh toán thành công, chuyển hướng đến trang thành công
        return redirect()->route('order.success')->with('status', 'Thanh toán thành công!');
    } catch (PayPalConnectionException $ex) {
        // Nếu có lỗi khi thực hiện thanh toán, xử lý lỗi tại đây
        return redirect()->route('order.failure')->with('error', 'Thanh toán không thành công!');
    }
}
public function paypalCancel()
{
    return redirect()->route('order.failure')->with('error', 'Thanh toán bị hủy!');
}

}

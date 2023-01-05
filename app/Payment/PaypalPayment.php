<?php
namespace App\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Session;

class PaypalPayment implements IPayPalPayment
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function pay($data)
    {
        $today = Carbon::now();
        $user = auth()->user();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($data['amount']);
                    /** unit price **/$item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($data['amount']);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();


        $redirect_urls->setReturnUrl(URL::route('admin.credits.index')) /** Specify return URL **/
        ->setCancelUrl(URL::route('admin.checkout.page'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        /** dd($payment->create($this->_api_context));exit; **/
        try {
                $payment->create($this->_api_context);
                $user->packages()->attach($data['package_id'],['property_id'=>1,'is_expired'=>0,'active_at'=>$today,'expire_at'=>$data['expire_at'],'price'=>$data['price'],'item'=>$data['item'],'status'=>1]);

                notify()->success('Payment has been successfully processed');

            }
        catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
                } else {
                    \Session::put('error', 'Some error occur, sorry for inconvenient');
                    return Redirect::route('paywithpaypal');
                }
        }
        foreach ($payment->getLinks() as $link)
        {
            if ($link->getRel() == 'approval_url')
            {
                $redirect_url = $link->getHref();
                break;
            }
        }/** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url))
        {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }
}

<?php
namespace App\Order;

use App\Models\OrderTransaction;
use ShoppingCart\Cart;
use Event;
use App;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\CardInfoInterface;
use App\Events\OrderWasPlaced;
use Request;
use DB;
use Auth;

class Processor
{
    /** @var OrderRepositoryInterface $order_repository */
    protected $order_repository;
    /** @var OrderValidatorInterface[] $order_validators */
    protected $order_validators;
    /** @var OrderRepositoryInterface $order_repository */
    protected $card_info_repository;

    public function __construct(
        OrderRepositoryInterface $order_repository,
        CardInfoInterface $card_info_repo
    ) {
        $this->order_repository = $order_repository;
		$this->order_validators = [];
        $this->card_info_repository = $card_info_repo;
    }

    public function placeOrder(Cart $cart, $data)
    {
        try {
//            DB::beginTransaction();
            foreach ($this->order_validators as $order_validator) {
                $order_validator->validate($cart);
            }

			$cart->setPaymentType(isset($data['payment_type'])?$data['payment_type']:0);
            $order = $this->order_repository->saveOrder($cart);
            $this->card_info_repository->save($data);               //save the card info
			try {
				Event::fire(new OrderWasPlaced($order));
			} catch (\Exception $e) {
				\Log::critical("Order post processing failed for ID: " . $order->order_id . " with message: " . $e->getMessage(),$e->getTrace());
			}
            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

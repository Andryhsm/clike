<?php
namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\ProductStockRepositoryInterface;
use App\User;
use App\UserAddress;
use App\Store;
use App\StoreCustomer;
use App\Encasement;
use App\Customer;
use App\EncasementProduct;
use App\EncasementAttributeOption;
use Carbon\Carbon;
use App\Models\NewsletterOption;
/**
 * Class CustomerRepository
 *
 * @package App\Repositories\Backend
 */
class CustomerRepository implements CustomerRepositoryInterface
{
	protected $model;
	protected $product_stock_repository;

    public function __construct(User $user, ProductStockRepositoryInterface $product_stock_repo)
    {
        $this->model = $user;
        $this->product_stock_repository = $product_stock_repo;
    }

	public function create($input){

	}

	public function getCustomerSystemById($id)
    {
		return User::where('user_id', $id)->with('address')->get()->first();
    }

    public function getCustomerLocalById($id){
    	return Customer::where('customer_id', $id)->get()->first();
    }

	public function update($id,$input){
		// $user = $this->model->findOrNew($id);
		// $user->role_id = '1';
		// $user->first_name = $input['first_name'];
		// $user->last_name = $input['last_name'];
		// $user->phone_number = $input['phone_number'];
		// $user->email = $input['email'];
		// $user->save();
		
		// $user_address = new UserAddress();
		// $user_address->first_name = $input['first_name'];
		// $user_address->last_name = $input['last_name'];
		// $user_address->phone = $input['phone_number'];
		// $user_address->address1 = $input['address'];
		// $user_address->city = $input['country'];
		// $user_address->zip = $input['postal_code'];
		// $user->address()->save($user_address);
		$user = User::find($input['user_id']);
		// Enregistrement dans encaissment
		$encasement = new Encasement();
		$encasement->user_id = $user->user_id;
		$encasement->total_ht = $input['total_ht'];
		$encasement->total_ttc = $input['total_ttc'];
		$encasement->save();
		
		
		
		// Enregistrement dans listes des produits
		for ($i=1; $i <= sizeof($input['product_name']); $i++) {
			$encasement_product = new EncasementProduct();
			$encasement_product->encasement_id = $encasement->encasement_id;
			$encasement_product->product_id = $input['product_name'][$i];
			//$encasement_product->attribute_size_id = $input['product_size'][$i];
			//$encasement_product->attribute_color_id = $input['product_color'][$i];
			$encasement_product->discount = $input['discount'][$i];
			//$encasement_product->promo_code_id = $input['promo_code'][$i];
			$encasement_product->parent_category = $input['parent_category'][$i];
			$encasement_product->sub_category = $input['sub_category'][$i];
			$encasement_product->sub_category = $input['sub_category'][$i];
			$encasement_product->product_stock_id = $input['product_stock_id'][$i];
			$encasement_product->quantity = ($input['product_quantity'][$i]) ? $input['product_quantity'][$i] : 1;
			$encasement_product->save();
			if(isset($input['attrs'])){
				foreach ($input['attrs'][$i] as $attr) {
					$encasement_attribute_option = new EncasementAttributeOption();
					$encasement_attribute_option->encasement_product_id = $encasement_product->product_id;
					$encasement_attribute_option->attribute_option_id = $attr;
					$encasement_attribute_option->save();
				}
			}
		}
		return $this->model;
	}

	public function deleteById($id){
		return $this->model->where('user_id', $id)
			->delete();
	}

	public function saveContactCustomer($input){
		$user = new User();
		$this->model->role_id = '1';
		$this->model->first_name = $input['first_name'];
		$this->model->last_name = $input['last_name'];
		$this->model->phone_number = $input['phone_number'];
		$this->model->email = $input['email'];
		// $this->model->birthday = $input['birthday'];
		$this->model->save();

		$user_address = new UserAddress();
		$user_address->first_name = $input['first_name'];
		$user_address->last_name = $input['last_name'];
		$user_address->phone = $input['phone_number'];
		$user_address->address1 = $input['address'];
		$user_address->city = $input['country'];
		$user_address->zip = $input['postal_code'];
		$this->model->address()->save($user_address);

		return $this->model;
	}

	public function save($input){
		$input['store_id'] = auth()->user()->store->first()->store_id;
		if($input['type_customer'] == StoreCustomer::CUSTOMER_SYSTEM_USER && $input['user_id'] != null){
			$query = StoreCustomer::where('store_id', $input['store_id'])->where('user_id', $input['user_id'])->where('type_customer', StoreCustomer::CUSTOMER_SYSTEM_USER)->get()->first();
			if($query == null){
				$store_customer = new StoreCustomer();
				$store_customer->store_id = $input['store_id'];
				$store_customer->user_id = $input['user_id'];
				$store_customer->type_customer = StoreCustomer::CUSTOMER_SYSTEM_USER;
				$store_customer->save();
			}
			$encasement = new Encasement();
			$encasement->store_id = $input['store_id'];
			$encasement->user_id = $input['user_id'];
			$encasement->total_ht = $input['total_ht'];
			$encasement->total_ttc = $input['total_ttc'];
			$encasement->reset_accounting = Encasement::CAN_RESET;
			$encasement->save();
		}else {	
			// Customer local
			if($input['customer_id'] != null){ //edit customer local
				$query = StoreCustomer::where('store_id', $input['store_id'])->where('user_id', $input['customer_id'])->where('type_customer', StoreCustomer::CUSTOMER_LOCAL)->get()->first();
					if($query == null){
						$store_customer = new StoreCustomer();
						$store_customer->store_id = $input['store_id'];
						$store_customer->user_id = $input['customer_id'];
						$store_customer->type_customer = StoreCustomer::CUSTOMER_LOCAL;
						$store_customer->save();
					}
					$encasement = new Encasement();
					$encasement->store_id = $input['store_id'];
					$encasement->user_id = $input['customer_id'];
					$encasement->total_ht = $input['total_ht'];
					$encasement->total_ttc = $input['total_ttc'];
					$encasement->reset_accounting = Encasement::CAN_RESET;
					$encasement->save();
			}else {							 //store customer local
					$customer = new Customer();
					$customer->first_name = $input['first_name'];
					$customer->last_name = $input['last_name'];
					$customer->address = $input['address'];
					$customer->postal_code = $input['postal_code'];
					$customer->country = $input['country'];
					$customer->phone_number = $input['phone_number'];
					$customer->email = $input['email'];
					$customer->birthday = ($input['birthday'] == null) ? '0000-00-00' : $input['birthday'] ;
					$customer->save();

					$store_customer = new StoreCustomer();
					$store_customer->store_id = $input['store_id'];
					$store_customer->user_id = $customer->customer_id;
					$store_customer->type_customer = StoreCustomer::CUSTOMER_LOCAL;
					$store_customer->save();
					$encasement = new Encasement();
					$encasement->store_id = $input['store_id'];
					$encasement->user_id = $customer->customer_id;
					$encasement->total_ht = $input['total_ht'];
					$encasement->total_ttc = $input['total_ttc'];
					$encasement->reset_accounting = Encasement::CAN_RESET;
					$encasement->save();
			}
		}
		
		for ($i=1; $i <= sizeof($input['product_name']); $i++) {
			$encasement_product = new EncasementProduct();
			$encasement_product->encasement_id = $encasement->encasement_id;
			$encasement_product->product_id = $input['product_name'][$i];
			//$encasement_product->attribute_size_id = $input['product_size'][$i];
			//$encasement_product->attribute_color_id = $input['product_color'][$i];
			$encasement_product->discount = $input['discount'][$i];
			$encasement_product->parent_category = $input['parent_category'][$i];
			$encasement_product->sub_category = $input['sub_category'][$i];
			$encasement_product->product_stock_id = $input['product_stock_id'][$i];
			$encasement_product->quantity = ($input['product_quantity'][$i] && isset($input['product_quantity'][$i])) ? $input['product_quantity'][$i] : 1;
			$encasement_product->save();
			
			//Update the quantity of the product in the stock
			$result = $this->product_stock_repository->updateProductCountInEncasement($encasement_product->product_stock_id , $encasement_product->quantity);

			if(isset($input['attrs'])){
				foreach ($input['attrs'][$i] as $attr) {
					$encasement_attribute_option = new EncasementAttributeOption();
					$encasement_attribute_option->encasement_product_id = $encasement_product->product_id;
					$encasement_attribute_option->attribute_option_id = $attr;
					$encasement_attribute_option->save();
				}
			}
		}
		return $this->model;
	}

	public function getCustomers(){
		$store = Store::find(auth()->user()->store->first()->store_id);
		return $store->customers;
	}

	public function getCustomersLocal(){
		$store = Store::find(auth()->user()->store->first()->store_id);
		return $store->customersLocal;
	}

	public function getAllCustomersSystem(){
		return $this->model->with('address')->where('role_id', 1)->get();
	}
	
	public function getTotalEncasement($store_id)
	{ 
		return Encasement::where('store_id', $store_id)->sum('total_ttc');
	}

	public function getNewsletterOption() {
		return NewsletterOption::where('user_id', \Auth::user()->user_id)->get();
	}

	public function saveNewsletterOption($input) {
		$newsletter_option = NewsletterOption::updateOrCreate(
			['user_id'=> \Auth::user()->user_id, 'key' => $input['key']],
			['value' => $input['value']]
		);
		return $newsletter_option;
	}
}			
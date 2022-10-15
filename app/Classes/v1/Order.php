<?php

namespace App\Classes\v1;

use App\Models\CompanyProduct;
use App\Models\Order as OrderModel;
use Illuminate\Support\Str;

class Order
{
    public function __construct()
    {
    }

    public function createOrder($request): string
    {
        $user = ( new User() )->createUser($request['user']);
        $orders = $this->restructureRequest($request['orders'], $user);

        return $this->addOrder($orders);
    }

    private function restructureRequest(array $request, object $user): array
    {
        $restructuredRequest = [];
        $totalQuantity = $totalAmount = 0;
        foreach ($request as $key => $product) {
            $productDetails = CompanyProduct::where('uuid', $product['uuid'])->first();
            $totalProductAmount = $productDetails->price * $product['quantity'];
            $restructuredRequest['order_details'][$key]['company_product_id'] = $productDetails->id;
            $restructuredRequest['order_details'][$key]['name'] = $productDetails->name;
            $restructuredRequest['order_details'][$key]['amount'] = $productDetails->price;
            $restructuredRequest['order_details'][$key]['total_amount'] = $totalProductAmount;
            $restructuredRequest['order_details'][$key]['quantity'] = $product['quantity'];
            $restructuredRequest['order_details'][$key]['uuid'] = Str::orderedUuid();
            $restructuredRequest['order']['company_id'] = $productDetails->company_id;
            $totalAmount += $totalProductAmount;
            $totalQuantity += $product['quantity'];
        }
        $restructuredRequest['order']['amount'] = $totalAmount;
        $restructuredRequest['order']['quantity'] = $totalQuantity;
        $restructuredRequest['order']['user_id'] = $user->id;

        return $restructuredRequest;
    }

    private function addOrder($details, $uuid = null): string
    {
        $order = OrderModel::firstOrCreate(
            ['uuid' => $uuid],
            [
                'uuid' => Str::orderedUuid(),
                'company_id' => $details['order']['company_id'],
                'user_id' => $details['order']['user_id'],
                'quantity' => $details['order']['quantity'],
                'amount' => $details['order']['amount'],
            ]
        );
        $this->addOrderDetails($order, $details['order_details']);

        return (string) $order->uuid;
    }

    private function addOrderDetails(object $order, array $order_details): void
    {
        $order->details()->createMany(
            $order_details
        );
    }
}

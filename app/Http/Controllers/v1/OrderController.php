<?php

namespace App\Http\Controllers\v1;

use App\Classes\v1\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Order\getOrderRequest;
use App\Http\Requests\V1\Order\StoreOrderRequest;
use App\Http\Resources\FetchResource;
use App\Http\Resources\SaveResource;
use App\Models\Order as OrderModel;
use App\Models\User as UserModel;

class OrderController extends Controller
{
    public function getOrders(getOrderRequest $request): FetchResource
    {
        $order = [];
        if (
            ! empty($request->get('uuid'))
        ) {
            $order = $this->getByUuid($request->get('uuid'));
        } elseif (
            ! empty($request->get('mobile_no'))
        ) {
            $order = $this->getByMobileNo($request->get('mobile_no'));
        }

        return new FetchResource($order);
    }

    public function store(StoreOrderRequest $request): SaveResource
    {
        $order = new Order();
        $orderUuid = $order->createOrder($request->all());

        return new SaveResource([
            'uuid' => $orderUuid,
        ]);
    }

    private function getByUuid($uuid): ?object
    {
        return OrderModel::with('details')->where('uuid', $uuid)->first();
    }

    private function getByMobileNo($mobileNo): ?object
    {
        return UserModel::where('mobile_no', $mobileNo)->first()->order;
    }
}

{{__('order.new_order')}}
<i>{{__('order.name')}}: </i> {{$name}}
<i>{{__('order.e_mail')}}: </i> {{$email}}
<i>{{__('order.total')}}: </i> {{$total}}
--------
<i>{{__('order.products')}}</i>
@foreach($products as $product)
  <i>{{$product['title']}}: </i> {{$product['qty']}} x {{$product['price']}}
@endforeach
---------


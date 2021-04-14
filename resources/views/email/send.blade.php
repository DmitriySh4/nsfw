<h4>Hello, {{ $name }}</h4>
<p>Advertisement was correctly sent</p>
<p>Advertisement will be posted after paying {{ $price }} euro to bank account {{ env('USER_BANKACCOUNT') }}. Use {{ $order_id }} as payment purpose.</p>
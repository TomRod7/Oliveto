# Pedido

<p><strong>Nombre:</strong> {{ $data['name'] }}</p>

<p><strong>Email:</strong> {{ $data['email'] }}</p>

<p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>

<p><strong>Dirección:</strong> {{ $data['address'] }}</p>

<br>
<table class="table">
  <thead>
      <tr>
          <th class="text-center">Nombre</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>SubTotal</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($data['cart'] as $key => $value)
      <tr>
          <td>{{$value['name']}}</td>
          <td>{{$value['price']}}</td>
          <td>{{$value['quantity']}}</td>
          <td>{{$value['subtotal']}}</td>
      </tr>
      @endforeach
    </tbody>
</table>
<br>

<p><span>Total: </span><strong>
  @php
    $total = 0;
    foreach ($data['cart'] as $value) {
      $total += $value['subtotal'];
    }
    echo $total;
  @endphp
</strong></p>

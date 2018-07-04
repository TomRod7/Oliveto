# Pedido

<p><strong>Nombre:</strong> {{ $data['name'] }}</p>

<p><strong>Email:</strong> {{ $data['email'] }}</p>

<p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>

<p><strong>Dirección:</strong> {{ $data['address'] }}</p>

<br>
<ul style="list-style-type: none">
@foreach ($data['cart'] as $key => $value)
  <li>
    <table class="table">
      <thead>
          <tr>
              <th class="text-center"></th>
              <th class="text-center">Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>SubTotal</th>
          </tr>
      </thead>
      <tbody>
        <tr>
            <td class="text-center">
              <img src="{{$value['image']}}" height="50">
            </td>
            <td>{{$value['name']}}</td>
            <td>{{$value['price']}}</td>
            <td>{{$value['quantity']}}</td>
            <td>{{$value['subtotal']}}</td>
          </tr>
        </tbody>
    </table>
  </li>
@endforeach
</ul>

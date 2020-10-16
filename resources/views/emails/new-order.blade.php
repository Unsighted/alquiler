<!DOCTYPE html>
<html>
<head>
	<title>Nuevo pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido!</p>
	<strong>Estos son los datos del cliente que realizó el pedido:</strong>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{ $user->name }}
		</li>
		<li>
			<strong>Username:</strong>
			{{ $user->username }}
		</li>
		<li>
			<strong>Apellido:</strong>
			{{ $request->apellido }}
		</li>
		<li>
			<strong>E-mail:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Celular:</strong>
			{{ $user->phone }}
		</li>
		<li>
			<strong>Dirección:</strong>
			{{ $user->address }}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			{{ $cart->order_date }}
		</li>
		<li>
			<strong>Cédula de dentidad:</strong>
            {{ $request->identidad }}
		</li>
		<li>
			<strong>País:</strong>
            {{ $request->pais }}
		</li>
		<li>
			<strong>Provincia:</strong>
            {{ $request->provincia }}
		</li>
		<li>
			<strong>Localidad:</strong>
            {{ $request->localidad }}
		</li>
		<li>
			<strong>Calle:</strong>
            {{ $request->calle }}
		</li>
		<li>
			<strong>Solar:</strong>
            {{ $request->solar }}
		</li>
		<li>
			<strong>Manzana:</strong>
            {{ $request->manzana }}
		</li>
		<li>
			<strong>Villa:</strong>
            {{ $request->villa }}
		</li>
		<li>
			<strong>Descripcion:</strong>
            {{ $request->desc }}
		</li>
		
	</ul>

	<strong><u>Detalles del pedido:</u></strong>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{ $detail->product->name }} x{{ $detail->quantity }} 
			($ {{ $detail->quantity * $detail->product->price }})
		</li>
		@endforeach
	</ul>
	<p>
		<strong><u>Importe que el cliente debe pagar:</u></strong> ${{ $cart->total }}
	</p>
	
	<ul>
		<li>	
			<strong>Método de pago:</strong>
            {{ $request->method }}
		</li>
	</ul>
</body>
</html>
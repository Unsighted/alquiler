<div>
    @foreach($mensajes as $mensaje)
    <li>{{$mensaje["usuario"]}} - {{$mensaje["mensaje"]}}</li>
    @endforeach

     <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f84783b9ca93d33b11f2', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('chat-channel');
    channel.bind('chat-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</div>

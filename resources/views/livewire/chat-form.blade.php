

<div>
<div class="row">
    <div class="alert alert-success collapse col-md-3"role="alert" id="avisoSuccess">Se ha enviado!</div>
</div>
    <div class="form-group"  style="margin-top: 30px;">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" wire:model="nombre">
    </div>
    
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <input type="text" class="form-control" id="mensaje" wire:model="mensaje">
    </div>
    
    <button class="btn btn-success" wire:click="enviarMensaje">Enviar Mensaje</button>

<script>
window.livewire.on('mensajeEnviado', function(){
    $("#avisoSuccess").fadeIn("slow");

    setTimeout(() => {
        $("#avisoSuccess").fadeOut("slow");
    }, 3000);
});

</script>

</div>
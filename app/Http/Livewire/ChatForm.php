<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{
    public $nombre;
    public $mensaje;

    public function mount()
    {
        $this->nombre = "";
        $this->mensaje = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            "nombre" => "required|min:3",
            "mensaje" => "required"
        ]);
    }

    public function enviarMensaje()
    {
        $this->validate([
            "nombre" => "required|min:3",
            "mensaje" => "required"
        ]);

        $this->emit("mensajeEnviado");

        $datos = [
            "usuario" => $this->nombre,
            "mensaje" => $this->mensaje
        ];

       
        $this->emit("mensajeRecibido", $datos);

        event(new \App\Events\EnviarMensaje($this->nombre, $this->mensaje));
    }
}

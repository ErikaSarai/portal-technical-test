@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <p>¡Estás conectado!</p>

                        <h5>Información Importante</h5>
    
                        <p>Para ejecutar el job diario desde localhost, debe ejecutar: php artisan schedule:run. El job está programado para ejecutarse una vez al día a las 15:00 (Zona Horaria: America/Asuncion)</p>

                        <p>Se le enviará un correo con el total de usuarios registrados en las últimas 24 horas, a todos los usuarios registrados con correos válidos y vigentes.</p>

                        <p> <strong>Opcional:</strong> Si desea mandar este correo de manera manual, solo debe darle click al siguiente botón:</p>

                        <button class="btn btn-primary" id="send-emails" >
                            <span class="loading_btn mr-2"></span>
                            Enviar Correos
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#send-emails').click( function() {
            var this_button = $(this);
            this_button.attr('disabled', 'disabled').addClass('disabled');
            $('.loading_btn').addClass('spinner-border spinner-border-sm');

            $.post("{{ route('send.emails') }}", {})
            .done(function(data){
                setTimeout(() => {
                    this_button.removeAttr('disabled').removeClass('disabled');
                    $('.loading_btn').removeClass('spinner-border spinner-border-sm');
                },500);

                alert('Correos Enviados');
            })
            .fail(function(data) {
            });
        });
    });
</script>
@endsection

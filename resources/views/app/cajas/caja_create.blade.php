<!-- Modal formulario AGcliente-->
<div class="modal fade" id="AbrirCaja" aria-hidden="true" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            {!! Form::open(['action'=>'CajaController@store']) !!}
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Abrir Caja</h3>
                </div>
                <div class="block-content">

                    <div class="row">
                        <div class="col-md-12">
                            <input hidden name="cierre" value="no">
                            <!--- Apertura Field --->
                            <div class="form-group">
                                {!! Form::label('apertura', 'Apertura:') !!}
                                {!! Form::text('apertura', null, ['class' => 'form-control','placeholder'=>'$00']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!--- nota Field --->
                            <div class="form-group">
                                {!! Form::label('nota', 'Nota:') !!}
                                {!! Form::textarea('nota', null,
                                ['placeholder'=>'ingrese aqui cualquier dato relevante de la apertura de su caja',
                                'class' => 'form-control','rows'=>'3']) !!}
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <!--- Abrir Field --->

                {!! Form::submit('Abrir', ['class' => 'btn btn-success']) !!}


            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
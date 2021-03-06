@extends('layouts.master')

@section('title')
    @if(isset($venta))Factura: {{ $venta->id }}@endif
    @if(isset($remision))Remisión: {{ $remision->id }}@endif
@stop

@section('description')
@stop

@section('style')
    <style type="text/css">

        .factura p, p + p {
            margin: 0px !important;
        }

        .panel-heading img {
            margin-bottom: 5px;
        }

        .ticket {
            border: solid 1px #bbbbbb;
            border-radius: 5px;
            margin: 3px;
        }

        .totales {
            border: none !important;
            width: 85% !important;
        }

        .totales td {
            font-size: 18px !important;
        }

        .factura td, th, .panel-footer p {
            font-size: smaller;
            padding: 0px !important;
        }

        .factura .row {
            font-size: large;

        }

        @media print {
            #page-footer{
                display: none;
            }
            .factura
            {
            display: block;
                page-break-after: always;
                width: 7cm;
            }
            .block-content{
                padding: 0 !important;
            }


        }

    </style>
@stop

@section('breadcrumb')
    <li><a href="{{url('ventas')}}">ventas</a></li>
@stop

@section('content')
    <div class="col-sm-2 hidden-print">
        <button class="btn btn-danger btn-lg btn-block" onclick="App.initHelper('print-page');">
            <i class="si si-printer"></i> imprimir
        </button>
    </div>
    <div>
    @if(isset($venta))
        <div class="col-sm-4 page" >
            <div class="block center-block factura">
                <div class="block-content text-center ">
                    <img src="{{ $venta->tiendas->company->logo }}" class="center-block push-10" width="262"
                         height="100">

                    <h1 class="page">{{ $venta->tiendas->tienda }}</h1>

                    <p><strong>Nit: <span>{{ $venta->tiendas->nit }}</span></strong></p>

                    <p><strong>Regimen: <span> {{ $venta->tiendas->regimen }}</span></strong></p>


                    <p class="font-s12">Dirección: <span> {{ $venta->tiendas->direccion }}</span></p>

                    <p class="font-s12">Fecha: <span>{{ $venta->created_at }}</span></p>

                    <p class="font-s12">Telefono: <span> {{ $venta->tiendas->telefono }}</span></p>

                    <p class="font-s12">Cliente: <span>{{ $venta->clientes->cliente }}</span></p>


                    <div class="col-sm-12 push-10">
                        <h3 class="ticket">
                            <p>Factura: <span>{{ $venta->tiendas->prefijo }} {{ $venta->factura }}</span></p></h3>
                    </div>
                    <table class="table remove-margin-b">
                        <thead>

                        <th class="text-center">Cant</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Valor</th>

                        </thead>
                        <tbody>

                        @foreach($venta->venta_detalle as $venta_detalle)
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">{{$venta_detalle->productos_configurables->producto}}</td>
                                <td class="text-center">${{number_format($venta_detalle->venta)}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="push-10-t push-10">
                        <table class=" text-right totales font-s24" align="center">
                            <tr>
                                <td width="60%"><strong>Sub-total:</strong></td>
                                <td>$ {{ number_format($venta->subtotal) }}</td>
                            </tr>
                            @if($venta->descuento > 0)
                            <tr>
                                <td width="60%"><strong>Descuento:</strong></td>
                                <td>$ -{{ number_format($venta->descuento) }}</td>
                            </tr>
                            @endif
                            @if($venta->iva > 0)
                            <tr>
                                <td width="60%"><strong>IVA:</strong></td>
                                <td>$ +{{ number_format($venta->iva) }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="60%"><strong>TOTAL:</strong></td>
                                <td>$ {{ number_format($venta->venta) }}</td>
                            </tr>

                        </table>

                    </div>
                    <div class="panel-footer text-center push-10">
                        <p>Vendedor: <span>{{ $venta->user->name }}</span></p>

                        <p>Facturación según resolución DIAN</p>

                        <p>Numero {{ $venta->tiendas->resolucion_dian }}</p>

                        <p>del {{ $venta->tiendas->fecha_dian }} {{ $venta->tiendas->rango }}</p>

                        <h4 class="text-center">Gracias por su compra</h4>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if(isset($remision))
        <div class="col-sm-4">
            <div class="block center-block factura">
                <div class="block-content text-center">
                    <img src="{{ $remision->tiendas->company->logo }}" class="center-block push-10" width="262"
                         height="100">

                    <h1>{{ $remision->tiendas->tienda }}</h1>

                    <p><strong>Nit: <span>{{ $remision->tiendas->nit }}</span></strong></p>

                    <p><strong>Regimen: <span> {{ $remision->tiendas->regimen }}</span></strong></p>


                    <p class="font-s12 ">Dirección: <span> {{ $remision->tiendas->direccion }}</span></p>

                    <p class="font-s12">Fecha: <span>{{ $remision->created_at }}</span></p>

                    <p class="font-s12">Telefono: <span> {{ $remision->tiendas->telefono }}</span></p>

                    <p class="font-s12">Cliente: <span>{{ $remision->clientes->cliente }}</span></p>


                    <div class="col-sm-12 push-10">
                        <h3 class="ticket">
                            <p>Remision: <span>{{ $remision->factura }}</span></p></h3>
                    </div>
                    <table class="table remove-margin-b">
                        <thead>

                        <th class="text-center">Cant</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Valor</th>

                        </thead>
                        <tbody>

                        @foreach($remision->venta_detalle as $venta_detalle)
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">{{$venta_detalle->productos_configurables->producto}}</td>
                                <td class="text-center">${{number_format($venta_detalle->venta)}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="push-10-t push-10">
                        <table class=" text-right totales font-s24" align="center">
                            <tr>
                                <td width="60%"><strong>Sub-total:</strong></td>
                                <td>$ {{ number_format($remision->subtotal) }}</td>
                            </tr>
                            @if($remision->descuento > 0)
                                <tr>
                                    <td width="60%"><strong>Descuento:</strong></td>
                                    <td>$ -{{ number_format($remision->descuento) }}</td>
                                </tr>
                            @endif
                            @if($remision->iva > 0)
                                <tr>
                                    <td width="60%"><strong>IVA:</strong></td>
                                    <td>$ +{{ number_format($remision->iva) }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td width="60%"><strong>TOTAL:</strong></td>
                                <td>$ {{ number_format($remision->venta) }}</td>
                            </tr>

                        </table>

                    </div>
                    <div class="panel-footer text-center push-10">
                        <p>Vendedor: <span>{{ $remision->user->name }}</span></p>

                        <h4 class="text-center">Gracias por su compra</h4>
                    </div>

                </div>
            </div>
        </div>
    @endif
    </div>


@stop

@section('scripts')
    <script>

    </script>
@stop
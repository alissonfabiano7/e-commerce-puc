@extends('site.app')
@section('title', 'Ordens')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Minha conta - Ordens</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            @if (Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <div class="row">
            </div>
            <div class="row">
                <main class="col-sm-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Número da ordem</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">Quantidade de ordens</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->order_number }}</th>
                                <td>{{ $order->first_name }}</td>
                                <td>{{ $order->last_name }}</td>
                                <td>{{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}</td>
                                <td>{{ $order->item_count }}</td>
                                @if ($order->status == 'pending')
                                    <td><span class="badge badge-success">PENDENTE</span></td>
                                @endif
                            </tr>
                        @empty
                            <div class="col-sm-12">
                                <p class="alert alert-warning">Nenhuma ordem para mostrar.</p>
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </section>
@stop

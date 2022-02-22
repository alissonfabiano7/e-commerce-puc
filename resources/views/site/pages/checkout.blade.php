@extends('site.app')
@section('title', 'Checkout')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Checkout</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Detalhes do pagamento</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="first_name">
                                        @error('first_name') {{ $message }} @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="last_name">
                                        @error('last_name') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" name="address">
                                    @error('address') {{ $message }} @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="city">
                                        @error('city') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>País</label>
                                        <input type="text" class="form-control" name="country">
                                        @error('country') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="post_code">
                                        @error('post_code') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Número de telefone</label>
                                        <input type="text" class="form-control" name="phone_number">
                                        @error('phone_number') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                                    <small class="form-text text-muted">Nós nunca vamos divulgar o seu e-mail para ninguém</small>
                                </div>
                                <div class="form-group">
                                    <label>Observações sobre a ordem</label>
                                    <textarea class="form-control" name="notes" rows="6"></textarea>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Sua ordem</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Concluir ordem</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop

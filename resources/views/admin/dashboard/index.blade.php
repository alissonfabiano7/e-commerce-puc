@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Novos usuários dos últimos 7 dias</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="newUsers"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Novas ordens dos últimos 7 dias</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="newOrders"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Novos produtos dos últimos 7 dias</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="newProducts"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Produtos por marca</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="productsPerBrand"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Produtos por categoria</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="productsPerCategory"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src={{ asset('backend/js/plugins/chart.js') }}></script>
    <script type="text/javascript">

        async function getUsers() {
            const response = await fetch('{{route('admin.charts.newUsers')}}');
            return response.json();
        }

        async function getOrders() {
            const response = await fetch('{{route('admin.charts.newOrders')}}');
            return response.json();
        }

        async function getProducts() {
            const response = await fetch('{{route('admin.charts.newProducts')}}');
            return response.json();
        }

        async function getProductsPerCategory() {
            const response = await fetch('{{route('admin.charts.productsPerCategory')}}');
            return response.json();
        }

        async function getProductsPerBrand() {
            const response = await fetch('{{route('admin.charts.productsPerBrand')}}');
            return response.json();
        }

        async function newUsersGraph() {

            let data = {
                labels: ["7 dias atrás", "6 dias atrás", "5 dias atrás", "4 dias atrás", "3 dias atrás", "Ontem", "Hoje"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: await getUsers()
                    },
                ]
            };
            let ctxl = $("#newUsers").get(0).getContext("2d");
            new Chart(ctxl).Bar(data);

        }

        async function newOrdersGraph() {

            let data = {
                labels: ["7 dias atrás", "6 dias atrás", "5 dias atrás", "4 dias atrás", "3 dias atrás", "Ontem", "Hoje"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: await getOrders()
                    },
                ]
            };
            let ctxl = $("#newOrders").get(0).getContext("2d");
            new Chart(ctxl).Bar(data);

        }
        async function newProductsGraph() {

            let data = {
                labels: ["7 dias atrás", "6 dias atrás", "5 dias atrás", "4 dias atrás", "3 dias atrás", "Ontem", "Hoje"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: await getProducts()
                    },
                ]
            };
            let ctxl = $("#newProducts").get(0).getContext("2d");
            new Chart(ctxl).Bar(data);

        }

        async function productsPerBrandGraph() {
            let products = await getProductsPerBrand();

            let data = [];

            for (let product of products) {
                let object = {
                    value: product.products_count,
                    color: `#${Math.floor(Math.random()*16777215).toString(16).toUpperCase()}`,
                    label: product.name
                }
                data.push(object);
            }

            var ctxp = $("#productsPerBrand").get(0).getContext("2d");
            new Chart(ctxp).Pie(data);

        }

        async function productsPerCategoyGraph() {
            let products = await getProductsPerCategory();

            let data = [];

            for (let product of products) {
                let object = {
                    value: product.products_count,
                    color: `#${Math.floor(Math.random()*16777215).toString(16).toUpperCase()}`,
                    label: product.name
                }
                data.push(object);
            }

            var ctxp = $("#productsPerCategory").get(0).getContext("2d");
            new Chart(ctxp).Pie(data);
        }

        newUsersGraph();
        newOrdersGraph();
        newProductsGraph();
        productsPerBrandGraph();
        productsPerCategoyGraph();

    </script>
@endpush


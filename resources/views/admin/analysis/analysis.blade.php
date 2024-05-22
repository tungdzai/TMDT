@extends('admin.layouts.app')
@section('pageTitle')
    <div class="pagetitle">
        <h1>Phân tích sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Phân tích</li>
                <li class="breadcrumb-item active">Phân tích sản phẩm</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doanh Thu Trong 7 ngày gần nhất</h5>

                        <!-- Column Chart -->
                        <div id="columnChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const totalSalesData = {!! json_encode($totalSales) !!}.map(value => value + " sản phẩm");
                                new ApexCharts(document.querySelector("#columnChart"), {
                                    series: [{
                                        name: 'Sản phẩm bán chạy nhất trong ngày là' ,
                                        data: totalSalesData
                                    }, {
                                        name: 'Doanh thu trong 1 ngày',
                                        data: {!! json_encode($totalPirce) !!}
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 450
                                    },
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: '55%',
                                            endingShape: 'rounded'
                                        },
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        show: true,
                                        width: 2,
                                        colors: ['transparent']
                                    },
                                    xaxis: {
                                        categories: {!! json_encode($date) !!},
                                    },
                                    yaxis: {
                                        title: {
                                            text: 'VND'
                                        }
                                    },
                                    fill: {
                                        opacity: 1
                                    },
                                    // tooltip: {
                                    //     y: {
                                    //         formatter: function(val) {
                                    //             return   val + " VND"
                                    //         }
                                    //     }
                                    // }
                                }).render();
                            });
                        </script>
                        <!-- End Column Chart -->

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top sản phẩm bán chạy nhất</h5>

                        <!-- Pie Chart -->
                        <div id="pieChart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#pieChart"), {
                                    series: {!! json_encode($totalSales1) !!},
                                    chart: {
                                        height: 550,
                                        type: 'pie',
                                        toolbar: {
                                            show: true
                                        }
                                    },
                                    labels: {!! json_encode($productNames) !!}
                                }).render();
                            });
                        </script>
                        <!-- End Pie Chart -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

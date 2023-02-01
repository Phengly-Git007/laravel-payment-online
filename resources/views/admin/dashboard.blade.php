@extends('admin.master')

@section('title')
    Dashboard Menu
@endsection
@section('dashboard')
    active
@endsection
@section('header')
    Admin Dashboard
@endsection
@section('action')
    <a href="">View Admin Dashboard </a>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- info --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <h3>{{ $order_today }}</h3>
                            <p> Today Orders </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- success --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <h3>{{ $week_orders }}</h3>

                            <p>Week Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- warning --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <h3>{{ $month_orders }}</h3>

                            <p>Month Orders</p>
                        </div>
                        <div class="icon">

                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- red --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner text-center">
                            <h3>{{ $year_orders }}</h3>

                            <p>Yearly Orders</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="ion ion-pie-graph"></i> --}}
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner text-center">
                            <h3>{{ $users }}</h3>

                            <p>User Register</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner text-center">
                            <h3>{{ $all_products }}</h3>
                            <p>All Product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <h3>{{ $all_categories }}</h3>

                            <p>All Category</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <h3>{{ $all_orders }}</h3>
                            <p>All Orders</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="ion ion-pie-graph"></i> --}}
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

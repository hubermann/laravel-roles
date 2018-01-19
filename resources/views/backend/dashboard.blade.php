@extends('layouts.backend')

@section('content')


<h1>Welcome to hubercart</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus cum, veniam temporibus a sunt dolor magnam, minima facilis obcaecati sed, magni cumque corporis fugiat eius amet harum soluta? Impedit, doloribus.</p>

<section>
	<div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Usuarios</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger">23</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                                    <h5 class="text-muted vb">Productos</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-megna">169</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon=""></i>
                                    <h5 class="text-muted vb">Categorias</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary">157</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>




<!-- Categorias destacadas -->

<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent 10 sales
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <!-- <select class="form-control pull-right row b-none">
                                        <option>March 2016</option>
                                        <option>April 2016</option>
                                        <option>May 2016</option>
                                        <option>June 2016</option>
                                        <option>July 2016</option>
                                    </select> -->
                                </div>
                            </h3>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>

															@unless($orders->count())
																<p>No items.</p>
															@else

															@foreach($orders as $order)
																<tr>
																<td class="txt-oflo" title="{{ $order->name}}{{ $order->surname}}">{{ $order->email }}</td>
																
																<td>
																	@if ( $order->payment_status == 0)
																		Pending
																	@elseif ( $order->payment_status == 1)
																		Successfully
																	@elseif ( $order->payment_status == 2)
																		Declined
																	@endif
																</td>
																<td class="txt-oflo">{{ $order->created_at }}</td>
																<td><span class="text-success">${{$order->amount}}</span></td>
																</tr>	

															@endforeach

																<tr>

															</tr>
															</tbody>

															@endunless


                              </table> <a href="{{url('backend/orders')}}">Check all the sales</a> </div>
                        </div>
                    </div>
                </div>




</section>


@endsection
@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container">

        <div class="row" style="margin-bottom:2%">
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-danger btn-block" style="font-size:130%;font-weight:bolder;">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-paper-2"></li>
                <br> Transactions <br> {{$totalTransaction}} x
            </button>
          </div>
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-primary btn-block" style="font-size:130%;font-weight:bolder">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-delivery-fast"></li>
                <br> Transaction Approved <br> {{$transactionApproved}}
            </button>
          </div>
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-info btn-block" style="font-size:130%;font-weight:bolder">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-cart-simple"></li>
                <br> Transaction Paid <br> {{$transactionPaid}}
            </button>
          </div>
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-success btn-block" style="font-size:130%;font-weight:bolder">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-time-alarm"></li>
                <br> Transaction Waiting <br> {{$transactionWaiting}}
            </button>
          </div>
        </div>

        <div class="row" style="margin-bottom:2%;">
          <div class="col-md-4">
            <button type="button" name="button" class="btn btn-default btn-block" style="font-size:130%;font-weight:bolder;background-color:#888888;color:white">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-layers-3"></li>
                <br> Photos <br> {{$photo}}
            </button>
          </div>
          <div class="col-md-4">
            <button type="button" name="button" class="btn btn-info btn-block" style="font-size:130%;font-weight:bolder;background-color:#1DC7EA;color:white">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-camera-20"></li>
                <br> Photo Published <br> {{$photoPublished}}
            </button>
          </div>
          <div class="col-md-4">
            <button type="button" name="button" class="btn btn-danger btn-block" style="font-size:130%;font-weight:bolder;background-color:#FF4A55;color:white">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-album-2"></li>
                <br> Photo Waiting to Publish <br> {{$photoWaiting}}
            </button>
          </div>
        </div>

        <div class="row" style="margin-bottom:2%">
          <div class="col-md-6">
            <button type="button" name="button" class="btn btn-warning btn-block" style="font-size:130%;font-weight:bolder;">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-backpack"></li>
                <br> Financial Transactions <br> Rp {{number_format(($financialTransaction),0,',','.')}}
            </button>
          </div>
          <div class="col-md-6">
            <button type="button" name="button" class="btn btn-success btn-block" style="font-size:130%;font-weight:bolder;">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-money-coins"></li>
                <br> Profit Transactions <br> Rp {{number_format(($profitTransaction),0,',','.')}}
            </button>
          </div>
        </div>

        <div class="row" style="margin-bottom:2%">
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-success btn-block" style="font-size:130%;font-weight:bolder;background-color:#87CB16;color:white;">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-circle-09"></li>
                <br> User Registered <br> {{$user}}
            </button>
          </div>
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-primary btn-block" style="font-size:130%;font-weight:bolder;background-color:#3472F7;color:white">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-zoom-split"></li>
                <br> Keyword <br> {{$keyword}}
            </button>
          </div>
          <div class="col-md-3">
            <button type="button" name="button" class="btn btn-warning btn-block" style="font-size:130%;font-weight:bolder;background-color:#FF9500;color:white">
              <li style="font-size:250%;font-weight:bolder" class="nc-icon nc-bullet-list-67"></li>
                <br> Category <br> {{$category}}
            </button>
          </div>
        </div>

    </div>
</div>
@endsection

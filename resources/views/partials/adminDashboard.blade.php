@extends('partials.admin.main')
@section('content')
    <div class="payment-card">
        <img src="{{asset('assets/images/pembayaran spp.png')}}" alt="Pembayaran SPP" />
        <h4>Pembayaran SPP</h4>
    </div>
    <div class="payment-card">
        <img src="{{asset('assets/images/pembayaran ujian.png')}}" alt="Pembayaran Ujian" />
        <h4>Pembayaran Ujian</h4>
    </div>
@endsection

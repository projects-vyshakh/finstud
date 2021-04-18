@extends('templates.layouts.master')

@include('components.alerts.alert')
@section('card-header')
    <div class="card-header text-right">
        <a href="{{route('add-marks')}}" class="btn btn-success col-sm-12 col-lg-2 col-md-4" >Add Marks </a>
    </div>
@endsection

@include('templates.components.datatables.datatables')

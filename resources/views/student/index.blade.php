@extends('templates.layouts.master')

@include('components.alerts.alert')
@section('card-header')
    <div class="card-header text-right">
        <a href="{{route('add-student')}}" class="btn btn-success col-sm-12 col-lg-2 col-md-4" >Add New Student </a>
    </div>
@endsection

@include('templates.components.datatables.datatables')

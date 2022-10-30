@extends('layouts.master')
@section('content')
<h2 class="ml-4">edit service</h2>
<form action="{{ route('services.update',$service->id) }}" method="post">
    @csrf
    @method('PUT')
<div class="col-lg-8 col-xl-5 ml-10">
    <div class="form-group">
        <label for="service-name">Name</label>
        <input type="text" class="form-control" id="service-name" name="name" placeholder="enter service name" value="{{ $service->name }}">
    </div>
    <div class="form-group">
        <label for="service-desc">Description</label>
        <textarea class="form-control" id="service-desc" name="desc" rows="4" placeholder="the description of service">{{ $service->desc }}</textarea>
    </div>
    <div class="form-group">
        <label for="service-price">Price in dollar</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    $
                </span>
            </div>
            <input type="number" class="form-control text-center" id="service-price" name="price" placeholder="00" value="{{ $service->price }}">
            <div class="input-group-append">
                <span class="input-group-text">,00</span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Save Service</button>
</div>
</form>
@endsection

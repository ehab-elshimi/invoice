@extends('layouts.master')
@section('content')
<h2 class="ml-4">create service</h2>
<form action="{{ route('services.store') }}" method="post">
@csrf
<div class="col-lg-8 col-xl-5 ml-10">
    <div class="form-group">
        <label for="service-name">Name</label>
        <input type="text" class="form-control" id="service-name" name="name" placeholder="enter service name">
    </div>
    <div class="form-group">
        <label for="service-desc">Description</label>
        <textarea class="form-control" id="service-desc" name="desc" rows="4" placeholder="the description of service"></textarea>
    </div>
    <div class="form-group">
        <label for="service-price">Price in dollar</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    $
                </span>
            </div>
            <input type="number" class="form-control text-center" id="service-price" name="price" placeholder="00">
            <div class="input-group-append">
                <span class="input-group-text">,00</span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Save Service</button>

</div>
</form>
@endsection

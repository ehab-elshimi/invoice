@extends('layouts.master')
@section('content')
<h2 class="ml-4">edit customer</h2>
<form action="{{  route('customers.update',$customer->id)  }}" method="post">
    @csrf
    @method('put')
<div class="col-lg-8 col-xl-5 ml-10">
    <div class="form-group">
        <label for="example-name">Name</label>
        <input type="text" class="form-control" id="example-name" name="name" placeholder="enter customer name" value="{{ $customer->name }}">
    </div>
    <div class="form-group">
        <label for="example-email">Email</label>
        <input type="email" class="form-control" id="example-email" name="email" placeholder="enter customer email" value="{{ $customer->email }}">
    </div>
    <div class="form-group">
        <label for="example-phone">Phone</label>
        <input type="text" class="form-control" id="example-phone" name="phone" placeholder="enter customer phone" value="{{  $customer->phone  }}">
    </div>
    <div class="form-group">
        <label for="example-address">Address</label>
        <input type="text" class="form-control" id="example-address" name="address" placeholder="enter customer address" value="{{  $customer->address  }}" >
    </div>
    <button type="submit" class="btn btn-primary">Save Customer</button>
</div>
</form>
@endsection

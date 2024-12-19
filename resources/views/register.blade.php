
@extends('layouts/app')
@section('title')
@section('content')
<form action="{{ route('register.submit') }}" method="POST">
    @csrf
    <fieldset>
        <h2 class="d-flex justify-content-center align-items-center my-2" style="height: 8vh;">Riwaya</h2>
        <div>
            <label for="exampleInputEmail1" class="form-label mt-4">Username</label>
            <input type="text" class="form-control" name="name" required>
            @error('name')
                <span class="text-danger">{{ $message  }}</span>
            @enderror
        </div>
        <div>
            <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
            <input type="email" class="form-control" name="email" required>
            @error('email')
                <span class="text-danger">{{ $message  }}</span>
            @enderror
        </div>
        <div>
            <label for="exampleInputEmail1" class="form-label mt-4">password</label>
            <input type="password" class="form-control" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message  }}</span>
            @enderror
        </div>
        <div>
          <label for="exampleInputEmail1" class="form-label mt-4">Confirm password</label>
          <input type="password" class="form-control" name="password_confirmation" required>
          @error('password_confirmation')
              <span class="text-danger">{{ $message  }}</span>
          @enderror
      </div>
        <button type="submit" class="btn btn-primary m-3">Submit</button>
    </fieldset>
</form>

<div class="d-flex justify-content-center align-items-center " style="height: 10vh;">
    <div class="card-header">
        <h1 class="">Most Sales books</h1>
      </div>
    </div>
</div>
<div class="container mt-4">
    <!-- Cards aligned horizontally -->
    <div class="row justify-content-center">
      
      <!-- First Card -->
      <div class="col-md-3 mb-3">
        <div class="card border-primary mb-3" style="max-width: 16rem;">
          <div class="card-header text-center">في قلبي انثى عبرية</div>
          <div class="card-body">
            <img
              src="https://upload.wikimedia.org/wikipedia/ar/7/79/%D9%81%D9%8A_%D9%82%D9%84%D8%A8%D9%8A_%D8%A3%D9%86%D8%AB%D9%89_%D8%B9%D8%A8%D8%B1%D9%8A%D8%A9.jpg"
              alt="في قلبي انثى عبرية"
              class="img-fluid"
              style="height: 250pt; object-fit: cover; width: 100%;"
            />
          </div>
        </div>
      </div>
  
      <!-- Second Card -->
      <div class="col-md-3 mb-3">
        <div class="card border-primary mb-3" style="max-width: 16rem;">
          <div class="card-header text-center">فاتتني صلاة</div>
          <div class="card-body">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1547020983i/43518268.jpg"
              alt="فاتتني صلاة"
              class="img-fluid"
              style="height: 250pt; object-fit: cover; width: 100%;"
            />
          </div>
        </div>
      </div>
  
      <!-- Third Card -->
      <div class="col-md-3 mb-3">
        <div class="card border-primary mb-3" style="max-width: 16rem">
          <div class="card-header text-center">رسائل من القران</div>
          <div class="card-body">
            <img
              src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1618776395i/57774958.jpg"
              alt="رسائل من القران"
              class="img-fluid"
              style="height: 250pt; object-fit: cover; width: 100%;"
            />
          </div>
        </div>
      </div>
  
    </div>
  </div>
  

@endsection
@section('content')
<div class="container">


  <h2>Enter Pharmacy Data</h2>
  <form method="POST" action="{{route('pharmacy.store')}}">
    @csrf
  <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" id="ph_name" placeholder="Enter pharmacy name" name="ph_name">
    </div>
    <div class="form-group">
      <label>Area:</label>
      <input type="text" class="form-control" id="ph_area" placeholder="Enter pharmacy area" name="ph_area">
    </div>



    <h2>Enter Pharmacy Owner Data</h2>
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label>National ID:</label>
      <input type="number" class="form-control" id="nationalID" placeholder="Enter national-id" name="nationalID">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection
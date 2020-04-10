<html> 
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head> 
    <body>
        <h1> Here you can add a new order </h1>
        <div class="container">
        <form method="POST" action="{{route('orders.index')}}"> 
            @csrf 
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 User Name--Order Name
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($users as $user)
                        <a class="dropdown-item" name="ordername">{{$user->name}}</a>
                        @endforeach
                    
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Medicine Name
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($mediciness as $medicine)
                        <a class="dropdown-item" name="medicinenamedrop">{{$medicine->name}}</a>
                        @endforeach   
                </div>
            </div>
            
            <div class="form-group" >
                <label for="medicinename">Medicine Name</label>
                <input name="medicinename" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="If you did not find the medicine in list, writ it now">
                <small class="form-text text-muted"></small>
             </div>
             <div class="form-group" >
                <label for="medicinequantity">Medicine quanitiy</label>
                <input name="medicinequantity" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <small class="form-text text-muted"></small>
             </div>
             <div class="form-group" >
                <label for="medicineprice">Medicine price</label>
                <input name="medicineprice" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <small class="form-text text-muted"></small>
             </div>
            <div class="form-group">
                <label for="address">Deliver address</label>
                <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="doctorname">Doctor Name</label>
                <input name="doctorname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               
            </div>
            <div class="form-group">
                <label for="doctorname">Doctor ID</label>
                <input name="doctorid" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               
            </div>
            <div class="form-group">
                <label for="isinsured">Is insured</label>
                <div class="radio">
                    <label><input type="radio" name="isinsured" checked>Yes</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="isinsured">No</label>
                    </div>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>

</html>
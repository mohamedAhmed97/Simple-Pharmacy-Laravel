@extends('admins.sidebar')
@section('content')
<div class="content-wrapper">
    <div class="card m-3 p-2">
            <div class="card-header border-transparent">
                    <h3 class="card-title font-weight-bold">Users</h3>
            </div>
            <div class="card-body">
              <h1> Hello </h1>
              <br>
              <span> This part of our website is only API so if you want to make any CRUD
              operations on users you can do: </span>
              <br>
                <Ol>
                    <li>Open Postman</li>
                    <li>You can add a new user:<br>    
                            <ul>
                                <li>Hit the route http://localhost:8000/api/users</li>
                                <li>Chosse the verb post</li>
                                <li>Enter in the Body the Keys and its values</li>
                            </ul>
                    </li>
                    <br>
                    <li>You can get one user:<br>    
                            <ul>
                                <li>Hit the route http://localhost:8000/api/users/{id of the user}</li>
                                <li>Chosse the verb get</li>
                            </ul>
                    </li>
                    <br>
                    <li>You can get all users:<br>    
                            <ul>
                                <li>Hit the route http://localhost:8000/api/users</li>
                                <li>Chosse the verb get</li>
                            </ul>
                    </li>
                    <br>
                    <li>You can get delete a user:<br>    
                            <ul>
                                <li>Hit the route http://localhost:8000/api/users/{id of the user}</li>
                                <li>Chosse the verb delete</li>
                            </ul>
                    </li>
                    <br>
                    <li>You can update user info:<br>    
                            <ul>
                                <li>Hit the route http://localhost:8000/api/users/{id of the user}</li>
                                <li>Chosse the verb put</li>
                                <li>Enter in the Params the Keys and its values</li>
                            </ul>
                    </li>
                    <br>
                </Ol>
            </div>    
    </div>           
</div>
@endsection



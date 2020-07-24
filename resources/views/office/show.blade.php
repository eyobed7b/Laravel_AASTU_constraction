@extends('layout.app')
@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <div class= "jumbotron">
          
                <h1> {{$user[0]->first_name}}</h1>

               
                @foreach($companies as $company)
                    <div class = "col-lg-4">
                <h3>{{$company->name}}</h3>
                <p class="text-danger">{{$company->description}} </p>
                
                <p><a class="btn btn-primary" href="/companies/{{$company->id}}" role="button">view Company</a></p>
                            
                
                    </div>
                    
                    @endforeach
                  
               

        </div>
              

</div>
@endsection
<!DOCTYPE html>
<html lang="en"> 
@include('layouts.template')

<body class="app">   	
    <header class="app-header fixed-top">	
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
                        <h3>Modifier un employé</h3>
		            </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div>
<!--//app-header-inner-->
        @include('layouts.sidebar')
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
                <h1 class="app-page-title">Employé</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Modifier</h3>
                        <div class="section-intro">Modifier un employé</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            
                            <div class="app-card-body">
                                <form class="settings-form" method="POST" action="{{ route('employer.update', $employer->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="setting-input-3" class="form-label">Departement</label>
                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value=""></option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" {{($department->id==$employer->department_id)? 'selected':''}}>{{ $department->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="setting-input-1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom" name="name" value="{{$employer->name}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="setting-input-2" placeholder="Entrer l'email" name="email" value="{{$employer->email}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="setting-input-3" class="form-label">Position</label>
                                        <input type="text" class="form-control" id="setting-input-3" placeholder="Entrer le poste" name="position" value="{{$employer->position}}" required>
                                    </div>
                                    <button type="submit" class="btn app-btn-primary" >Mettre à jour</button>
                                </form>
                            </div><!--//app-card-body-->
                            
                        </div><!--//app-card-->
                    </div>
                </div><!--//row-->
            <hr class="my-4">

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  

    <!-- Charts JS -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
    <script src="{{asset('assets/js/index-charts.js')}}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{asset('assets/js/app.js')}}"></script> 

</body>
</html> 



@section('content')
    
@endsection
<!DOCTYPE html>
<html lang="en"> 
@include('layouts.template') 

<body class="app">   	
    <header class="app-header fixed-top">	
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
                        <h3>Modifier un département</h3>
		            </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div>

        @include('layouts.sidebar')
    </header>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
                <h1 class="app-page-title">Departement</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Modifier</h3>
                        <div class="section-intro">Modifier un departement</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            
                            <div class="app-card-body">
                                <form class="settings-form" method="POST" action="{{ route('department.update', $department->id) }}">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="mb-3">
                                        <label for="setting-input-1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom" name="name" value="{{ $department->name }}" required>
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
    </div>   					

 
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

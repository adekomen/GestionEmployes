<!DOCTYPE html>
<html lang="en"> 
@include('layouts.template') 

<body class="app">   	
    <header class="app-header fixed-top">	
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
                        <h3>Liste des départements</h3>
		        </div>
	            </div>
	        </div>
        </div>

        @include('layouts.sidebar')
    </header>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
		<div class="col-auto">
			<h1 class="app-page-title mb-0">Departements</h1>
		</div>
		<div class="col-auto">
				<div class="page-utilities">
				<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
					
					
					<div class="col-auto">						    
						<a class="btn app-btn-secondary" href="{{route('department.create')}}">Ajouter un departement
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
	
	<div class="tab-content" id="orders-table-tab-content">
		<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			<div class="app-card app-card-orders-table shadow-sm mb-5">
				<div class="app-card-body">
					<div class="table-responsive">
						<table class="table app-table-hover mb-0 text-left">
							<thead>
								<tr>
									<th class="cell">id</th>
									<th class="cell">Name</th>
									<th class="cell">Nombre d'emplyés</th>
									<th class="cell">Actions</th>
								</tr>
							</thead>
							<tbody>

								@forelse($departments as $department)
								<tr>
									<td class="cell">{{ $department->id }}</td>
									<td class="cell"><span class="truncate">{{ $department->name }}</span></td>
									<td class="cell"><span class="truncate">{{ $department->employers_count }} Employé(s)</span></td>
									<td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('department.edit', $department->id) }}">Modifier</a> <a class="btn-sm app-btn-secondary" href="{{ route('department.destroy', $department->id) }}">Supprimer</a></td>
									
								</tr>
								@empty
									<tr>
										<td class="cell" colspan="3">Aucun depatement ajouté</td>
									</tr>
								@endforelse
								
							</tbody>
						</table>
					</div>
					
				</div>		
			</div>
			<nav class="app-pagination">
				<div class="d-flex justify-content-center">
					{{ $departments->appends(request()->input())->links() }}
				</div>
			</nav>
			
		</div>
		
	</div>
			    

			    
		</div>
	</div>
	    
	    
	    
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

<!DOCTYPE html>
<html lang="en"> 
@include('layouts.template')

<body class="app">   	
    <header class="app-header fixed-top">	
		<div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        	<h3>Liste des employés</h3>
				    
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
                <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Employés</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

							<div class="col-auto">						    
								<a class="btn app-btn-secondary" href="{{route('employer.create')}}">
									Ajouté un employé
								</a>
							</div>
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center" action="{{ route('employer.index') }}">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="search" class="form-control search-orders" value="{{ request()->search }}" placeholder="Recherce d'employé par nom, email, position">
					                    </div>
										<div class="col-auto">
										<select name="department_id" id="department_id" class="form-select w-auto" >
											<option selected value="">Tous les départements</option>

											@foreach ($departments as $department)
												<option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected':''}}>{{ $department->name }}</option>
											@endforeach
											
										</select>
										</div>

					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
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
												<th class="cell">Departement</th>
												<th class="cell">Name</th>
												<th class="cell">Email</th>
												<th class="cell">Poste</th>
												<th class="cell">Actions</th>
										
											</tr>
										</thead>
										<tbody>

                                            @forelse($employers as $employer)
                                            <tr>
												<td class="cell">{{ $employer->id }}</td>
												<td class="cell"><span class="truncate">{{ $employer->department->name }}</span></td>
												<td class="cell">{{ $employer->name }}</td>
												<td class="cell"><span>{{ $employer->email }}</span></td>
												<td class="cell"><span>{{ $employer->position }}</span></td>
												
												<td class="cell"><a class="btn-sm app-btn-secondary" href="{{route('employer.edit', $employer->id)}}">Modifier</a>

												<a class="btn-sm app-btn-secondary btn-danger" href="{{route('employer.destroy', $employer->id)}}">Supprimer</a></td>
											</tr>

                                            @empty
                                                <tr>
                                                    <td class="cell" colspan="6">Aucun employé ajouté</td>
                                                </tr>
                                            @endforelse
											
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							<div class="d-flex justify-content-center">
								{{ $employers->appends(request()->input())->links() }}
							</div>
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
				</div>

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->

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
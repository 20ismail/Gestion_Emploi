<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Disponobilite</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        
		
		<!--google fonts -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
      
	  <link rel="stylesheet" href="{{ asset('css/containerDispo.css') }}">

  </head>
  <body>
  


<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <!-- <h3><img style="padding-top: 10px; border-radius: 10%;" src="https://img.freepik.com/premium-photo/businessman-portrait-ai-generated-image_268835-5686.jpg" class="img-fluid"/>
			<span>Mr.hourri<br></span>
			<h6 style="padding-left:60px;size: 10px !important;">Admin</h6> -->
		<h3>	
			<img  src="data:image/png;base64,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" style="border-radius: 25px;" class="img-fluid"/>
			<span>EST SAFI</span>
		</h3>
		
    </div>
    <ul class="list-unstyled component m-2">
      <li class="active">
      <!-- <a href="#" class="dashboard"><span <i class="fa-solid fa-house"></i>&nbsp;&nbsp;&nbsp;
        </span>Home </a>
      </li> -->
      
      <li class="">
        <a href="{{ route('home') }}" class=""><span  <i  class="fa-solid fa-house"></i>&nbsp;&nbsp;&nbsp;
        </span>Accueil</a>
        </li>
      <li class="">
            <a href="{{ route('profile') }}"  class=""><span <i class="fa-solid fa-book"></i>&nbsp;&nbsp;&nbsp;
            </span>Profile </a>
            </li>

      <li class="">
      <a href="{{ route('dispo') }}" class=""><span <i class="fa-solid fa-school"></i>&nbsp;&nbsp;&nbsp;
      </span>Disponibilite </a>
      </li>
      <li class="">
        <a href="{{ route('module') }}" class=""><span <i class="fa-solid fa-book"></i>&nbsp;&nbsp;&nbsp;
        </span>Module</a>
        </li>
        <li class="">
            <a href="{{ route('emploi') }}" class=""><span <i class="fa-solid fa-book"></i>&nbsp;&nbsp;&nbsp;
            </span>Emploi du temps</a>
            </li>
            
                <li class="">
                    <a href="{{ route('login') }}" class=""><span <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;
                    </span>Se deconnercter</a>
                    </li>
     
    
    </ul>
 </div>
	 
   <!-------sidebar--design- close----------->
   
   
   
      <!-------page-content start----------->
   
      <div id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form>
							    <div class="input-group">
								  <input type="search" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">Go
									 </button>
								  </div>
								</div>
								<script>
									document.querySelector('.btn').addEventListener('click', function() {
                                     var inputValue = document.querySelector('.form-control').value;
                                  // Implement search functionality here
                                     console.log('Searching for:', inputValue);
                                       });
								</script>
							 </form>
						 </div>
					 </div>
					 
					 
					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							   <li class="dropdown nav-item active">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <span class="material-icons">notifications</span>
								  <span class="notification">4</span>
								 </a>
								  <ul class="dropdown-menu">
								     <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
								  </ul>
							   </li>
							   
							   <li class="nav-item">
							     <a class="nav-link" href="#">
								   <span class="material-icons">question_answer</span>
								 </a>
							   </li>
							   
							   <li class="dropdown nav-item">
							     <a class="nav-link" href="#" data-toggle="dropdown">
									<img id="profileimage" src="{{ Auth::user()->profileimage ? asset('storage/' . Auth::user()->profileimage) : asset('assets/icon.jpg') }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
									<span class="xp-user-live"></span>
								   </a>
									<ul class="dropdown-menu small-menu">
									   <li><a href="index.html">
									   <span class="material-icons">person_outline</span>
									   Profile
									   </a></li>
									   <li><a href="#">
									   <span class="material-icons">settings</span>
									   Settings
									   </a></li>
									   
									   <li><a href="signup.html">
									   <span class="material-icons">logout</span>
									   Logout
									 </a></li>
									 
								  </ul>
							   </li>
							   
							   
							   </ul>
							</nav>
						 </div>
					 </div>
					 
				 </div>
				 
				
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
                            <!------main-content-start-----------> 
		     
							<div class="main-content">
								<div class="row">
									<div class="col-md-12">
										@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('dispo_added'))
    <div class="alert alert-success" role="alert">
        {{ session('dispo_added') }}
    </div>
@endif

@if (session('dispo_modified'))
    <div class="alert alert-info" role="alert">
        {{ session('dispo_modified') }}
    </div>
@endif
										<div class="table-wrapper">
											<div class="table-title">
												<div class="row">
													<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
														<h2 class="ml-lg-2">Disponibilite</h2>
													</div>
												</div>
											</div>
											<form action="{{ route('dispo.store') }}" method="POST">
												@csrf
												<div class="container mt-4">
													<div class="col-md-3">
														<label for="semestre">Semestre</label>
														<select class="form-control" id="semestre" name="semestre">
															<option value="">Select Semestre</option>
															<option value="semestre1">Semestre 1</option>
															<option value="semestre2">Semestre 2</option>
														</select>
													</div>
												</div>
											
												<table class="table table-bordered table-striped mt-4">
													<h5>Sélectionnez les jours Disponibles:</h5>
													<thead>
														<tr>
															<th scope="col">Jour</th>
															<th scope="col">Sélection</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Lundi</td>
															<td>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="matinLundi" name="lundi[]" value="Matin">
																	<label class="form-check-label" for="matinLundi">Matin</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="apresMidiLundi" name="lundi[]" value="Après-midi">
																	<label class="form-check-label" for="apresMidiLundi">Après-midi</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Mardi</td>
															<td>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="matinMardi" name="mardi[]" value="Matin">
																	<label class="form-check-label" for="matinMardi">Matin</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="apresMidiMardi" name="mardi[]" value="Après-midi">
																	<label class="form-check-label" for="apresMidiMardi">Après-midi</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Mercredi</td>
															<td>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="matinMercredi" name="mercredi[]" value="Matin">
																	<label class="form-check-label" for="matinMercredi">Matin</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="apresMidiMercredi" name="mercredi[]" value="Après-midi">
																	<label class="form-check-label" for="apresMidiMercredi">Après-midi</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Jeudi</td>
															<td>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="matinJeudi" name="jeudi[]" value="Matin">
																	<label class="form-check-label" for="matinJeudi">Matin</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="apresMidiJeudi" name="jeudi[]" value="Après-midi">
																	<label class="form-check-label" for="apresMidiJeudi">Après-midi</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Vendredi</td>
															<td>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="matinVendredi" name="vendredi[]" value="Matin">
																	<label class="form-check-label" for="matinVendredi">Matin</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="apresMidiVendredi" name="vendredi[]" value="Après-midi">
																	<label class="form-check-label" for="apresMidiVendredi">Après-midi</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>Samedi</td>
															<td>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="matinSamedi" name="samedi[]" value="Matin">
																	<label class="form-check-label" for="matinSamedi">Matin</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="checkbox" id="apresMidiSamedi" name="samedi[]" value="Après-midi">
																	<label class="form-check-label" for="apresMidiSamedi">Après-midi</label>
																</div>
															</td>
														</tr>
													</tbody>
													</table>
													<div class="table-actions">
														<button type="submit" formaction="{{ route('dispo.store') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter</button>
														<button type="submit" formaction="{{ route('dispo.update')	 }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Modifier</button>
														
													</div>
													</form>
										</div>
										
										
										</div>
									</div>
								</div>
							</div>
                            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                            <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
                            <script src="{{ asset('js/popper.min.js') }}"></script>
                            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                            <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
                            <script src="{{ asset('js/list.js') }}"></script>
  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });
  </script>    
 </body>
 
 </html>

<template>
	<div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				<li class="nav-item active">
					<RouterLink class="nav-link" :to="{name:'Home'}">Home <span class="sr-only">(current)</span></RouterLink>
				</li>
				<li class="nav-item">
					<RouterLink class="nav-link" :to="{name:'Login'}">Login</RouterLink>
				</li>
				<li class="nav-item">
					<RouterLink class="nav-link" :to="{name:'Contact'}">Contact</RouterLink>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					Dropdown link
					</a>
					<div class="dropdown-menu">
					<RouterLink class="dropdown-item" :to="{name:'Action'}">Action</RouterLink>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				</ul>
			</div>
		</nav>
		<div class="card">
			<router-view></router-view>
		</div>
	</div>
	
</template>
<script>

</script>


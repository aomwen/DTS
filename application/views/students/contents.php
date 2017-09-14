<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 header">
			<h1>Hello Bootstrap!</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p class="lead">Menu</p>
			<div class="btn-group">
				<button type="button" class="btn btn-primary">Apple</button>
				<button type="button" class="btn btn-primary">Samsung</button>
				<div class="btn-group">
					<button type="button" 
						class="btn btn-primary dropdown-toggle" 
						data-toggle="dropdown">Sony <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="">Smart</a></li>
						<li><a href="">Tablet</a></li>
					</ul>
				</div>
				<button type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
					Search
				</button>
			</div>
		</div>
		<div class="col-md-8 contents">
			<?php
			echo "<p class='text-danger'>Hello $name you are $years years old!</p>";
			?>
			<table class="table table-striped table-hover table-condensed table-responsive">
				<thead>
					<tr>
						<th>ID NO.</th>
						<th>LAST NAME</th>
						<th>FIRST NAME</th>
						<th>MIDDLE NAME</th>
						<th>SEX</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($students as $s){
					echo '	<tr>	
								<td>'.$s['idno'].'</td>
								<td>'.$s['lastname'].'</td>
								<td>'.$s['firstname'].'</td>
								<td>'.$s['middlename'].'</td>
								<td>'.$s['course'].'</td>
								<td>'.$s['sex'].'</td>
								<td>
									<a href="'.base_url('students/profile/'.$s['idno']).'">View</a> |
									<a href="">Edit</a> |
									<a href="" class="delete">Delete</a>
								</td>
							</tr>
							';
				}
				?>
				</tbody>
			</table>
			<div class="">
				<a href="" class="btn btn-success">New Student</a>
				<a href="" class="btn btn-primary btn-lg">New Student</a>
				<a href="boots/add_student" class="btn btn-danger btn-xs">New Student</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center footer">
			Copyright &copy; 2017. Star Na Si Van Damme Stallone.
		</div>
	</div>
</div>






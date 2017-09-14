<!-- view for listing students -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1>Student Management System</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p>MENU</p>
			<h1 class="text-danger bg-primary">Bootstrap <small>Butch Trap</small></h1>
			<h2 class="text-success">Bootstrap</h2>
			<h3 class="text-info">Bootstrap</h3>
			<h4 class="text-muted">Bootstrap</h4>
			<h5 class="text-primary">Bootstrap</h5>
			<h6 class="text-warning">Bootstrap</h6>
		</div>
		<div class="col-md-8">
			<div class="pull-right">
				<a href="" class="btn btn-xs btn-danger">New Student</a>
				<a href="" class="btn btn-sm btn-success">New Student</a>
				<a href="" class="btn btn-md btn-warning">New Student</a>
				<a href="" class="btn btn-lg btn-info">New Student</a>
			</div>
			<table class="table table-striped">
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
		</div>
	</div>
</div>
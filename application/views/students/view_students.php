<div class="container-fluid">
	<div class="row" id="header">
		<div class="col-md-12">
			<h1>Student Management System</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<h2>MENU</h2>
		</div>
		<div class="col-md-9">
			<h3>Students</h3>
			<!--<img class="img img-circle" src="<?php echo base_url('assets/images/koala.jpg');?>" alt="My favorite animal" height="200" />-->
			<div class="pull-right">
				<a href="<?php echo base_url('course/add_student');?>" class="btn btn-danger">New Student</a>
				<a href="<?php echo base_url('course/create_course');?>" class="btn btn-danger">New Course</a>
			</div>
			<table class="table table-striped ">
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

<script type="text/javascript">
$(document).ready(function(){
	$('.delete').click(function(){
		var ans = confirm("Do you want to delete this record?");
		if(ans==true){
			alert("Delete");
			//redirect to delete method
			//location.href = <?php echo base_url(); ?>";
		}
	});
});
</script>

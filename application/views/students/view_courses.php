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
				<a href="<?php echo base_url('course/add_students');?>" class="btn btn-danger">New Student</a>
				<a href="<?php echo base_url('course/add_course');?>" class="btn btn-danger">New Course</a>
			</div>
			<table class="table table-striped ">
				<thead>
					<tr>
						<th>Course Code</th>
						<th>Course Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($courses as $s){
					echo '	<tr>	
								<td>'.$s['course_code'].'</td>
								<td>'.$s['course_desc'].'</td>
								<td
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

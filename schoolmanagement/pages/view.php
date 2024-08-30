<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');
    $obj=new DbFunction();
	$rs=$obj->showstudents();
   

	if(isset($_GET['del']))
    {    
         
		  $obj->del_std(intval($_GET['del']));
    }

?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>View Students</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
</head>

<body >;


    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
         <nav>

<body style="background-image:url(' proj21.jpg'); background-size:cover; ">;
        <div id="page-wrapper" style="background-image: url(rcrds2.jpg);background-size:100% 100%; ">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row"  >
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Students
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Course</th>
											<th>C-full</th>
                                            <th>Fname</th>
											<th>MName</th>
                                            <th>Lname</th>
                                            <th>gname</th>
                                            <th>Occupation</th>
											<th>Gender</th>
											<th>income</th>
                                            <th>Category</th>
                                            <th>PH</th>
                                            <th>nation</th>
                                            <th>Mobile</th>
                                            <th>email</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>padd</th>
                                            <th>Cadd</th>
                                            <th>Board1</th>
                                            <th>Board2</th>
                                            <th>Roll-1</th>
                                            <th>Roll-2</th>
                                            <th>passY-1</th>
                                            <th>passY-2</th>
                                            <th>sub-1</th>
                                            <th>sub-2</th>
                                            <th>marks-1</th>
                                            <th>marks-2</th>
                                            <th>fmarks1</th>
                                            <th>fmarks2</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){
									 
	                                  $c=$res->course;
									  $cname=$obj->showCourse1($c);
									  $res1=$cname->fetch_object();
									  
									 ?>	
                                        <tr class="odd gradeX">
                              <td><?php echo $sn?></td>
                              <td><?php echo htmlentities( strtoupper($res->regno));?></td>
                              <td><?php echo htmlentities(strtoupper($res->income));?></td>
             <td><?php echo htmlentities(strtoupper($res->fname." ".$res->mname." ".$res->lname));?></td>
          <td><?php echo htmlentities(strtoupper($res->gender));?></td>   
       <td><?php echo htmlentities(strtoupper($res->emailid));?></td>
	  <td><?php echo htmlentities($res->mobno);?></td>
	  <td><?php echo htmlentities(strtoupper($res1->income));?></td>
      <td><?php echo htmlentities(strtoupper($res->Category));?></td>	
      <td><?php echo htmlentities(strtoupper($res->Occupation));?></td>		
      <td><?php echo htmlentities(strtoupper($res->City));?></td>		
      <td><?php echo htmlentities(strtoupper($res->state));?></td>		
      <td><?php echo htmlentities(strtoupper($res->Country));?></td>
      <td><?php echo htmlentities(strtoupper($res->padd));?></td>
      <td><?php echo htmlentities(strtoupper($res->cadd));?></td>	
      <td><?php echo htmlentities(strtoupper($res->sub1));?></td>
      <td><?php echo htmlentities(strtoupper($res->sub2));?></td>										  
      <td>&nbsp;&nbsp;<a href="edit-std.php?id=<?php echo htmlentities($res->id);?>">
	  <p class="fa fa-edit"></p></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="register.php?del=<?php echo htmlentities($res->id); ?>">
	  <p class="fa fa-times-circle"></p>
	  
	  </td>
                                            
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
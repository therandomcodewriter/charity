<?php include ('cafeheader.php') ?>
<hr size="10"; color="#78D8F8"; width="100%"; align="center"/>	
<div class="container">	
<div class="row">
<div class="" align="left">

<body>
	 
<div class="panel-body">
    <h1><strong>Menu List</strong></h1>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Menu ID</th>
                    <th>Menu Name</th>
                    <th>Menu Picture</th>
                    <th>Menu Price (RM)</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
                include_once ("conc.php");
                $cafe_id = $_SESSION['cafe_id'];
                $query = "SELECT * FROM menu WHERE cafe_id='".$cafe_id."' AND delete_status='0'";
                $result = mysqli_query($conn, $query);
                $x = 1;

                while($row = mysqli_fetch_array($result)){

                	$menu_id = $row['menu_id'];
                	$menu_name = $row['menu_name'];
                	$menu_price = $row['menu_price'];
                	$menu_pic = $row['menu_pic'];

            ?>                              

            <tbody>
                <tr class="odd gradeX">
                    <td><?php echo $x; ?></td>
                    <td><?php echo $menu_id; ?></td>
                    <td><?php echo $menu_name; ?></td>
                    <td><img src="<?php echo $menu_pic; ?>" width="200px" height="200px"/></td>
                    <td class="center"><?php echo $menu_price; ?></td>
                    <td><button type="button" class="btn btn-info"><a href="editcmenu.php?id=<?php echo $menu_id;?>">Edit</a></button>
                    <button type="button" class="btn btn-warning"><a href="deletecmenu.php?id=<?php echo $menu_id;?>">Delete</a></button></td>
                </tr>

                <?php
                $x++;
                }
                ?>
        </table>
                            <!-- /.table-responsive -->
</div>
                        <!-- /.panel-body -->
                        
</body>
		<!-- END What we do -->
	</div>
</div>

        </div>
        </
<?php include ('cafefooter.php') ?>
	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>


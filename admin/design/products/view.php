				

<a class="btn btn-primary" href="?action=add">Add product</a>
				<br>
				<br>
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>price</th>
							<th>sale</th>
							<th>image</th>
							<th>category</th>
							<th>controlls</th>
						</tr>
					</thead>
					<tbody>
						<?php

							include_once "functions/connect.php";
							$select = "SELECT * from products ";
							$query = $conn -> query($select);
							foreach ($query as $product) {
								
							

						?>
						<tr>
							<td><?= $product['id']; ?></td>
							<td><?= $product['name']; ?></td>
							<td><?= $product['price'];?> </td>
							<td><?= $product['sale']; ?></td>
							<td><img style="width: 150px" src="images/<?= $product['img'];?>" alt=""> </td>
							<td><?php 

							$cat_id = $product['cat_id'];

							$selectCat = "SELECT name FROM categories WHERE id = $cat_id";

							$queryCat = $conn -> query($selectCat);
							$category = $queryCat -> fetch_assoc();
							echo $category['name'];

							?> </td>

							<td>
								<a class="btn btn-primary" href="">Edit</a>
								<a class="btn btn-danger" href="">Delete</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				
				</table>
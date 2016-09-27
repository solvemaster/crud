<?php
spl_autoload_register(function ($class) {
    include("$class".".php");
});

$db = new MyDB();
if(!$db){
    echo $db->lastErrorMsg();
} else {
    $result = $db->query("SELECT * FROM student");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>

<body>
	<table border='1'>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<pre>
			<?php
				//print_r($result->fetchArray());
				foreach($result->fetchArray() as $value):
			?>
			</pre>
			<tr>
				<td><?=$value['id']?></td>
				<td><?=$value['name']?></td>
				<td>Edit | Delet</td>
			</tr>
			<?php
				endforeach;
			?>
		</tbody>
	</table>
</body>

</html>
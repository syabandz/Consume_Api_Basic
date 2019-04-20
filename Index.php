<?php
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
	"key:b277bcce83b57bd914e9db7110ab40d9"
	),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo $response;
	$data = json_decode($response, true);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Belajar Api</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<select class="form-control" name="province_id" id="province_id">
					<?php for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { ?>
					<option value="'.$data['rajaongkir']['results'][$i]['province_id'].'"><?php echo $data['rajaongkir']['results'][$i]['province']; } ?></option>
				</select>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover dt-responsive nowrap" style="width:100%">
					<thead align="center">
						<tr class="table-primary">
							<th>No.</th>
							<th>Province</th>
							<th>Type</th>
							<th>City</th>
							<th>Postal Code</th>
							<th>Aksi</th>
						</tr>
					</thead>	
					<?php 
					$no = 0;
					for ($i=0; $i < count($data['rajaongkir']['results']); $i++): 
					?>
					<tbody>
						<tr>
							<td align="center"><?php echo ++$no; ?></td>
							<td><?php echo $data['rajaongkir']['results'][$i]['province'];?>
							<td><?php echo $data['rajaongkir']['results'][$i]['type'];?>
							<td><?php echo $data['rajaongkir']['results'][$i]['city_name'];?>
							<td align="center"><?php echo $data['rajaongkir']['results'][$i]['postal_code'];?>
							<td></td>
						</tr>
					<?php 
					endfor;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('.nowrap').DataTable();
} );
</script>
</body>
</html>
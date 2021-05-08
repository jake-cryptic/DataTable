<?php require('init.php'); ?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

		<title>Personal Data Table</title>
	</head>
	<body class="bg-dark text-light">

        <div class="container-fluid" style="min-height:100vh">
            <div class="container p-3">
                <h1 class="display-1">Your Data Table</h1>
            </div>
            <div class="container">
            <div class="accordion bg-dark text-light" id="accordion">
				<?php
				$types = $dc->get_types();
				$rows = $dc->get_data();

				foreach ($types as $type) {
					?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_<?php echo $type; ?>">
                            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $type; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $type; ?>">
								<?php echo $type; ?>
                            </button>
                        </h2>
                        <div id="collapse_<?php echo $type; ?>" class="accordion-collapse collapse bg-dark text-light" aria-labelledby="heading_<?php echo $type; ?>" data-bs-parent="#accordion">
                            <div class="accordion-body">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <td>Access Time</td>
                                            <td>Why data was used?</td>
                                            <td>Data</td>
                                            <td>Accessor</td>
                                            <td>Permissions</td>
                                            <td>How data was used?</td>
                                            <td>3rd-party access?</td>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($rows as $row) {
									    if ($type !== $row->type) continue;
										?>
                                        <tr>
                                            <td><?php echo gmstrftime("%B %d %Y, %X %Z",$row->time); ?></td>
                                            <td><?php echo out($row->reason); ?></td>
                                            <td><?php echo out($row->data); ?></td>
                                            <td><?php echo out($row->accessor); ?></td>
                                            <td><?php echo out($row->permissions); ?></td>
                                            <td><?php echo out($row->processed); ?></td>
                                            <td><?php echo out($row->third_party); ?></td>
                                        </tr>
										<?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					<?php
				}
				?>
            </div>
                <hr/>
                <h2>Code used to generate this table:</h2>
                <pre class="p-2">
<?php echo htmlspecialchars(file_get_contents($fp)); ?>
                </pre>
                <hr/>
                <div>
                    Other examples:
                    <ul>
                        <?php
                            $fl = glob('examples/*.php');
                            foreach ($fl as $file) {
                                $fn = explode('.', explode('/', $file)[1])[0];
                                $fnc = ucwords($fn);
                                echo "<li><a href='?ex={$fn}'>{$fnc}</a></li>";
                            }
                        ?>
                    </ul>
                </p>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    </body>
</html>
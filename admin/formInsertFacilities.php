<!DOCTYPE html>
<html lang="en">
<head>
<title>Insert Facilities</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
        <form action="process/processInsertFacilities.php" method="POST">
            <div class="container">
                <h3>Form insert Facilities</h3>
                <div class="form-group">
                    <label>Code Facilties</label>
                    <input type="text" name="code_facilities" class="form-control" placeholder="Code Facilities">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" placeholder="Type">
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </body>
</html>
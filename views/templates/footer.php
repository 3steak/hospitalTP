<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f422d87d3c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#customersTable').dataTable({
            "processing": true,
            "ajax": {
                "url": "listPatientCtrl.php",
            },
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'lastname'
                },
                {
                    data: 'email'
                }
            ]
        });
    });
</script>
</body>
<div class="container">
    <div class="row">
        <div class="col-12 " data-aos="fade-left">
        </div>
    </div>
</div>

</html>
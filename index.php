<?
$nominal = require_once('nominal.php');
$nominal_str = implode(',',$nominal);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Банкомат на PHP + jQuery</title>
    <link href="media/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="media/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
    <div class="row">
            <div class="col align-self-center">
                <form>
                    <div class="form-group">
                        <label for="nominal">Номинал в наличии</label>
                        <input type="text" class="form-control" id="nominal" value="<?= $nominal_str ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="summa">Ваша сумма</label>
                        <input type="number" class="form-control" id="summa">
                    </div>
                    <button type="button" id="send" class="btn btn-primary">Отправить</button>
                </form>
            </div>
       </div>
       <br /><br />
       <div class="alert alert-primary" role="alert" id="root"></div>
    </div>

    <script src="media/jquery.min.js"></script>
    <script>
        $(function() {
            $('#send').on('click', function() {
                $.ajax({
                    'type': 'get',
                    'data': 'summa=' + $('#summa').val(),
                    'url': '/ajax.php',
                    'success': function(data) {
                        $('#root').empty();
                        $('#root').append(data);
                    },
                    'error': function(msg) {
                        console.log(msg);
                    }
                });
            });
        });
    </script>
</body>

</html>
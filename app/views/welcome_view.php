<html>
<head>
<script>
<?php echo $jquery; ?>
</script>
<script>
$(document).ready(function(){

    $('#btnUsername').click(function(){

        $.ajax({
            'action': '<?php echo THIS_DOMAIN; ?>',
            'type': 'post',
            'data': {'btnUsername': 'tampil', 'username': 'dhanu'},
            'success': function(){
                alert('success');
            }
        });

    });

});
</script>
</head>
<body>
<form action="<?php echo THIS_DOMAIN; ?>" method="POST">
<input type="text" name="username">
<input type="submit" name="btnSubmit">
</form>
<!--<input type="button" value="tampilkan" id="btnUsername" />-->
</body>
</html>
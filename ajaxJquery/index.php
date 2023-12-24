<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="container p-2 flex gap-2 flex-col">
        <h2 class="text-2xl font-bold">belajar ajax request</h2>
        <span>
            <input id="input" type="text" class="border border-slate-500 rounded-md p-2 ">
            <i id="spinner" class="ri-loader-2-line spinner text-2xl" style="display: none;"></i>
        </span>
        <ul id="container" class="container flex flex-col gap-2">
            <!-- ini nanti berisi data json user -->
        </ul>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#input').keyup(function() {
            $('#spinner').show()
            $.ajax({
                url: 'http://localhost/search.php?query=' + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#container').html(data);
                    $('#spinner').hide()
                },
            })
        })
    })
</script>

<style type="text/css">
    .spinner {
        display: inline-block;
        animation: spin 3s infinite linear;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>

</html>
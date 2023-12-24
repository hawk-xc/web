<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tailwind_css/output.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <title>hari-hari belajar::JQuery</title>
</head>

<body class="w-full h-full flex justify-center align-middle items-center flex-col gap-3">
    <span>
        <form method="post" action="<?= base_url('Home') ?>" class="mt-52">
            <input type="text" id="keyword" name="keyword" placeholder="search here by name, phone, address..." class="w-80 outline outline-gray-300 focus:outline-gray-400 p-1 rounded-md">
            <button type="submit" class="bg-sky-200 hover:bg-sky-300 active:bg-sky-400 py-2 px-10 rounded-md">cari</button>
        </form>
    </span>


    <div id="container" class="relative overflow-x-auto">
        <table id="listData" class="max-w-60 text-sm text-left rtl:text-right text-gray-500 rounded-md">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 w-10">
                        Id
                    </th>
                    <th scope="col" class="py-3 w-60">
                        Name
                    </th>
                    <th scope="col" class="py-3 w-40">
                        E-mail
                    </th>
                    <th scope="col" class="py-3 w-40">
                        Phone
                    </th>
                </tr>
            </thead>
            <tbody id="dataVal">
                <?php foreach ($pagin as $data) {
                ?>
                    <tr class="bg-white border-b">
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap w-10">
                            <?= $data['contact_id'] ?>
                        </th>
                        <td class="py-4 w-10">
                            <?= $data['name'] ?>
                        </td>
                        <td class="py-4 w-40">
                            <?= $data['email'] ?>
                        </td>
                        <td class="py-4 w-10">
                            <?= $data['phone'] ?>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
        <?= $pager->links('contact', 'default_new') ?>
    </div>

</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#keyword').on('keyup', function() {
            // $('#listData').load('/Home?keyword' + $('#keyword').val());
        });
    })
</script>

</html>
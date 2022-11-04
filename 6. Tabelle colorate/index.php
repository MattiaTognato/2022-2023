<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tabelle colorate</title>
</head>
<body>
    <form method="post" class="mt-50 ml-auto mr-auto w-full max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="numrow">Num Righe</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="numrow">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="numcol">Num Collonne</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="numcol">
            </div>
        </div>
        <div class="flex items-center mb-4">
            <input type="checkbox" name="color" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="color" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Colored</label>
        </div>
        <button type="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    <table class="table-fixed border-10 w-full">
        <?php
            function rand_color($colored=true) {
                //ritorna colore random o bianco se colored = false
                return $colored? sprintf('#%06X', mt_rand(0, 0xFFFFFF)) : "#FFFFFF";
            }
            function getTdHTML($nCol, $colored){
                // crea td in base al numero di colone
                // background colorato casualmente
                $td = "";
                foreach (range(0, $nCol) as $i){
                    $color = rand_color($colored);
                    $td .= "<td class=\"h-20 w-30 border-2 border-black-500 bg-[$color]\"></td>";
                }
                return $td;
            }
            //se è stata fatta la richiesta            
            if ($_POST){
                $row = $_POST['numrow'];
                $col = $_POST['numcol'];
                $colored = $_POST['color'];

                foreach (range(1, $row) as $i){
                    $td = getTdHTML($col, $colored);
                    echo "<tr> $td </tr>";
                }
            }
        ?>
    </table>
</body>
</html>
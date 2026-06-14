<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kosmetik</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f8f0f5;
            margin:0;
            padding:20px;
        }

        h1{
            text-align:center;
            color:#d63384;
        }

        .container{
            max-width:900px;
            margin:auto;
        }

        .produk{
            background:white;
            padding:15px;
            margin:10px 0;
            border-radius:10px;
            box-shadow:0 2px 5px rgba(0,0,0,0.1);
        }

        .harga{
            color:green;
            font-weight:bold;
        }

        button{
            background:#d63384;
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#b0256d;
        }

        .hasil{
            background:#fff;
            padding:15px;
            margin-top:20px;
            border-radius:10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>TOKO KOSMETIK CANTIK</h1>

    <?php

    $produk = [
        ["nama"=>"Lipstik Matte", "harga"=>50000],
        ["nama"=>"Bedak Compact", "harga"=>75000],
        ["nama"=>"Foundation", "harga"=>90000],
        ["nama"=>"Mascara", "harga"=>65000],
        ["nama"=>"Blush On", "harga"=>55000]
    ];

    ?>

    <form method="post">

        <?php foreach($produk as $index => $item){ ?>

        <div class="produk">
            <h3><?php echo $item['nama']; ?></h3>
            <p class="harga">
                Rp <?php echo number_format($item['harga'],0,",","."); ?>
            </p>

            <label>Jumlah:</label>
            <input type="number"
                   name="jumlah[<?php echo $index; ?>]"
                   min="0"
                   value="0">
        </div>

        <?php } ?>

        <button type="submit" name="hitung">
            Hitung Total
        </button>

    </form>

    <?php

    if(isset($_POST['hitung'])){

        $total = 0;

        echo "<div class='hasil'>";
        echo "<h2>Struk Pembelian</h2>";

        foreach($produk as $index => $item){

            $jumlah = (int)$_POST['jumlah'][$index];

            if($jumlah > 0){

                $subtotal = $jumlah * $item['harga'];
                $total += $subtotal;

                echo $item['nama']." x ".$jumlah.
                " = Rp ".number_format($subtotal,0,",",".")."<br>";
            }
        }

        echo "<hr>";
        echo "<h3>Total Bayar: Rp ".
             number_format($total,0,",",".").
             "</h3>";

        echo "</div>";
    }

    ?>

</div>

</body>
</html>
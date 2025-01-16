<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Penjualan</title>  
  <style>
    table th {
        background: #0c1c60 !important;
        color: #fff !important;
        border: 1px solid #ddd !important;
        line-height:15px!important;
        text-align:center!important;
        vertical-align:middle!important;
      }
</head>

<body>
  <div class="container">
    <h2><?php echo $title; ?></h2>
    <table border=1 width=100% cellpadding=2 cellspacing=0 style="margin-top: 5px;">
      <thead>
        <tr>
        <th width="15%">Tanggal</th>
        <th width="5%">Night</th>
        <th width="25%">rate</th>
        <th width="25%">Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $lasttipe='';
        $jmldata = count($datapenjualan);
        $total=0;

        for($i=0;$i<$jmldata;$i++)
        {   
            if ($lasttipe=='' || $lasttipe != $datapenjualan[$i]['namatipe'])
            {
                $subtotal=0;
                echo '<tr><td colspan="4"><strong>'.$datapenjualan[$i]['namatipe'].'</strong></td></tr>';
            }
            $lasttipe=$datapenjualan[$i]['namatipe'];
            $subtotal += $datapenjualan[$i]['nominal'];
            $total += $datapenjualan[$i]['nominal'];
            echo '<tr>';                                        
            echo '<td>'.$datapenjualan[$i]['checkin'].'</td>';
            echo '<td>'.$datapenjualan[$i]['duration'].'</td>';
            echo '<td align="right">'.number_format($datapenjualan[$i]['price']).'</td>';
            echo '<td align="right">'.number_format($datapenjualan[$i]['nominal']).'</td>';
            echo '</tr>';
            if ($i<$jmldata-1 && $datapenjualan[$i]['namatipe']!=$datapenjualan[$i+1]['namatipe'])                                        
                echo '<tr><td colspan="3"><strong>Sub Total</strong></td><td align="right"><strong>'.number_format($subtotal).'</strong></td></tr>';                                     
        }
        echo '<tr><td colspan="3"><strong>Sub Total</strong></td><td align="right"><strong>'.number_format($subtotal).'</strong></td></tr>';
        echo '<tr><td colspan=4></td></tr>';
        echo '<tr><td colspan="3"><strong>Total</strong></td><td align="right"><strong>'.number_format($total).'</strong></td></tr>';
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
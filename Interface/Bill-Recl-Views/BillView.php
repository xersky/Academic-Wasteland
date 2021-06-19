<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/Models/Class.Client.php" ;
    $user = unserialize($_SESSION["current"]);
    $bills = $user->Bills();
    $data =  array_filter($bills,
    function($item){
        return (intval($item->Id) == $_GET['idFacture']);
    })[$_GET['idFacture']-1];
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="./Css/invoice.css">

<div id="invoice">

    <div class="toolbar hidden-print">
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <h1 target="_blank">
                            Etron-Legacy
                        </h1>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            </a>
                        </h2>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $user->FullName ;?></h2>
                        <div class="address"><?php echo $user->Adress ;?></div>
                        <div class="email"><a href="mailto:john@example.com"><?php echo $user->Email ;?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE <?php $data->Id?></h1>
                        <div class="date">Date of Invoice: <?php echo date('m-Y', $data->Month);?></div>
                        <div class="date">Due Date: <?php echo date('m-Y', strtotime("+1 months", strtotime($data->Month)));?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left"><span>Mois</span></th>
                            <th class="text-right"><span>Consommation</span></th>
                            <th class="text-right"><span>Prix HT</span></th>
                            <th class="text-right"><span>Prix TTC</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no"><?php echo $data->Id;?></td>
                            <td class="no"><?php echo date('m/Y', $data->Month);?></td>
                            <td class="text-left"><?php echo $data->Consomation."KW";?></td>
                            <td class="unit"><?php echo $data->Amount()."MDH";?></td>
                            <td class="qty"><?php echo $data->Price()."MDH";?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total</td>
                            <td><?php echo $data->Amount();?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 0.14%</td>
                            <td><?php echo $data->Price();?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">this bill should be paid in a windows of 15 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <div></div>
    </div>
</div>
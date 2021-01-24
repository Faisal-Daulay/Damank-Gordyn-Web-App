<div class="row">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-uppercase" href="index.php">Damank Gordyn</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-uppercase">
                    <li>
                        <a href="?page=catalog.php">
                            <span class="glyphicon glyphicon"> Catalog</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=aksesoris.php">
                            <span class="glyphicon glyphicon"> Aksesoris</span>
                        </a>
                    </li>
                </ul>
                <form action="?page=search.php" class="navbar-form navbar-left" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="cari" placeholder="Aku mau belanja...">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span style="border-radius: 50px; text-align:">
                                <?php
                                echo count($_SESSION['item']);
                                ?>
                            </span>
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <div class="col-lg-12" style="width: 500px;">
                                <?php
                                if (empty($_SESSION['item'])) {
                                    echo
                                        "
                                            <h4>Total : 0 Barang</h4>
                                            <p class='text-center'>Belum ada barang di tambahkan</p>
                                        ";
                                } else {
                                    if (is_array($_SESSION['item'])) {
                                        foreach ($_SESSION['item'] as $index => $barang) {
                                            $jumlah1 = $barang['jumlah1'];
                                            $totalbarang += $jumlah1;
                                        }
                                    }
                                ?>
                                    <h4>Total : <?php echo $totalbarang; ?> Barang</h4>
                                    <form action="?page=keranjang.php&keranjang=<?php echo $id; ?>" method="post">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>Hapus</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (is_array($_SESSION['item'])) {
                                                    foreach ($_SESSION['item'] as $index => $barang) {
                                                        $napro = $barang['nama_produk'];
                                                        $id = $barang['id_produk'];
                                                        $harga = $barang['harga'];
                                                        $jumlah1 = $barang['jumlah1'];
                                                        $diskon = $barang['diskon'];

                                                        $diskon1 = (($harga * $diskon) / 100);
                                                        $bayar1 = ($harga - $diskon1);
                                                        $tobay = $jumlah1 * $bayar1;
                                                        $subtotal += $tobay;
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="del[]" value="<?php echo $index; ?>">
                                                            </td>
                                                            <td>
                                                                <?php echo $napro; ?>
                                                                <p><?php echo $jumlah1; ?> Barang</p>
                                                            </td>
                                                            <td>
                                                                <?php echo "Rp. " . number_format($tobay, 0, ',', '.'); ?>
                                                                <p>
                                                                    Diskon :<small style="font-size: 18px;">
                                                                        <?php echo $diskon; ?>%
                                                                    </small>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                                <tr>
                                                    <th colspan="2">Total Keseluruhan</th>
                                                    <th><?php echo "Rp. " . number_format($subtotal, 0, ',', '.'); ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" name="tombol" value="Hapus Item" class="btn btn-warning">
                                        <a href="?page=bayar/bayar.php&member=member" class="btn btn-primary" name="tombol">Selesai Belanja</a>
                                    </form>
                                <?php } ?>
                            </div>
                        </ul>
                    </li>
                    <li><a href="?page=paket/lacak_paket.php" title="Lacak Paket"><i class="fas fa-box-open"></i> Paket</a></li>
                    <li><a href="?page=setting/setting.php"> <span class="glyphicon glyphicon-user"></span> Profil</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
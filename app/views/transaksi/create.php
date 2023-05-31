<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/transaksi/simpanTransaksi" method="POST" enctype="multipart/form-data">

                <div class="card-body">

                    <div class="form-group">

                        <label >Tanggal Transaksi</label>

                        <input type="date" class="form-control" placeholder="masukkan tanggal..." name="tanggal" required>

                    </div>

                    <div class="form-group">

                        <label >Metode Pembayaran</label>

                        <select class="form-control" name="pembayaran_nama">

                            <option value="">Pilih Metode</option>

                            <?php foreach ($data['pembayaran'] as $row) :?>

                                <option value="<?= $row['nama_pembayaran']; ?>"><?= $row['nama_pembayaran']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label >Nama Pengirim</label>

                        <input type="text" class="form-control" placeholder="masukkan nama pengirim..." name="nama_pengirim" required>

                    </div>

                    <div class="form-group">

                        <label >Nama Penerima</label>

                        <input type="text" class="form-control" placeholder="masukkan nama penerima..." name="nama_penerima" required>

                    </div>

                    <div class="form-group">

                        <label >Jumlah Transaksi</label>

                        <input type="number" class="form-control" placeholder="masukkan jumlah..." name="jumlah" required>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>
